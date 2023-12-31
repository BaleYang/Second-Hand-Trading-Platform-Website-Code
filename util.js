import { unmountComponentAtNode } from 'react-dom';
// import * as React from 'react';

// We only handle element & text node.
const ELEMENT_NODE = 1;
const TEXT_NODE = 3;
const COMMENT_NODE = 8;

let ellipsisContainer;
function jsonToStyle(style){
  let strArr = []
  for(let i in style){
    strArr.push(i+':'+style[i]);
  }
  return strArr.join(';');
}
const wrapperStyle = jsonToStyle({
  padding: 0,
  margin: 0,
  display: 'inline',
  lineHeight: 'inherit',
});

function pxToNumber(value) {
  if (!value) return 0;
  const match = value.match(/^\d*(\.\d*)?/);
  return match ? Number(match[0]) : 0;
}

function styleToString(style) {
  const styleNames = Array.prototype.slice.apply(style);
  return styleNames.map(name => `${name}: ${style.getPropertyValue(name)};`).join('');
}

const measure = ( originEle, rows, content, fixedContent, ellipsisStr ) => {
  if (!ellipsisContainer) {
    ellipsisContainer = document.createElement('div');
    ellipsisContainer.setAttribute('aria-hidden', 'true');
    document.body.appendChild(ellipsisContainer);
  }

  // Get origin style
  const originStyle = window.getComputedStyle(originEle);
  const originCSS = styleToString(originStyle);
  const lineHeight = pxToNumber(originStyle.lineHeight);
  const maxHeight =
    lineHeight * (rows + 1) +
    pxToNumber(originStyle.paddingTop) +
    pxToNumber(originStyle.paddingBottom);

  // Set shadow
  ellipsisContainer.setAttribute('style', originCSS);
  ellipsisContainer.style.position = 'fixed';
  ellipsisContainer.style.left = '0';
  ellipsisContainer.style.height = 'auto';
  ellipsisContainer.style.minHeight = 'auto';
  ellipsisContainer.style.maxHeight = 'auto';
  ellipsisContainer.style.top = '-999999px';
  ellipsisContainer.style.zIndex = '-1000';

  // clean up css overflow
  ellipsisContainer.style.textOverflow = 'clip';
  ellipsisContainer.style.whiteSpace = 'normal';
  ellipsisContainer.style.webkitLineClamp = 'none';

  // Render in the fake container
  const contentList = content;

  ellipsisContainer.innerHTML = `<div style=${wrapperStyle}><span style=${wrapperStyle}>${contentList}</span><span style=${wrapperStyle}>${fixedContent}</span></div>`

  // Check if ellipsis in measure div is height enough for content
  function inRange() {
    return ellipsisContainer.offsetHeight < maxHeight;
  }

  // Skip ellipsis if already match
  if (inRange()) {
    unmountComponentAtNode(ellipsisContainer);
    return { content, text: ellipsisContainer.innerHTML, ellipsis: false };
  }

  // We should clone the childNode since they're controlled by React and we can't reuse it without warning
  const childNodes = Array.prototype.slice
    .apply(ellipsisContainer.childNodes[0].childNodes[0].cloneNode(true).childNodes)
    .filter(({ nodeType }) => nodeType !== COMMENT_NODE);
  const fixedNodes = Array.prototype.slice.apply(
    ellipsisContainer.childNodes[0].childNodes[1].cloneNode(true).childNodes,
  );
  unmountComponentAtNode(ellipsisContainer);
  // ========================= Find match ellipsis content =========================
  const ellipsisChildren = [];
  ellipsisContainer.innerHTML = '';

  // Create origin content holder
  const ellipsisContentHolder = document.createElement('span');
  ellipsisContainer.appendChild(ellipsisContentHolder);
  const ellipsisTextNode = document.createTextNode(ellipsisStr);
  ellipsisContentHolder.appendChild(ellipsisTextNode);

  fixedNodes.forEach(childNode => {
    ellipsisContainer.appendChild(childNode);
  });

  // Append before fixed nodes
  function appendChildNode(node) {
    ellipsisContentHolder.insertBefore(node, ellipsisTextNode);
  }

  // Get maximum text
  function measureText(
    textNode,
    fullText,
    startLoc = 0,
    endLoc = fullText.length,
    lastSuccessLoc = 0,
  ) {
    const midLoc = Math.floor((startLoc + endLoc) / 2);
    const currentText = fullText.slice(0, midLoc);
    textNode.textContent = currentText;

    if (startLoc >= endLoc - 1) {
      // Loop when step is small
      for (let step = endLoc; step >= startLoc; step -= 1) {
        const currentStepText = fullText.slice(0, step);
        textNode.textContent = currentStepText;

        if (inRange()) {
          return step === fullText.length
            ? {
                finished: false,
                reactNode: fullText,
              }
            : {
                finished: true,
                reactNode: currentStepText,
              };
        }
      }
    }

    if (inRange()) {
      return measureText(textNode, fullText, midLoc, endLoc, midLoc);
    }
    return measureText(textNode, fullText, startLoc, midLoc, lastSuccessLoc);
  }

  function measureNode(childNode, index) {
    const type = childNode.nodeType;

    if (type === ELEMENT_NODE) {
      // We don't split element, it will keep if whole element can be displayed.
      appendChildNode(childNode);
      if (inRange()) {
        return {
          finished: false,
          reactNode: contentList[index],
        };
      }

      // Clean up if can not pull in
      ellipsisContentHolder.removeChild(childNode);
      return {
        finished: true,
        reactNode: null,
      };
    }
    if (type === TEXT_NODE) {
      const fullText = childNode.textContent || '';
      const textNode = document.createTextNode(fullText);
      appendChildNode(textNode);
      return measureText(textNode, fullText);
    }

    // Not handle other type of content
    // PS: This code should not be attached after react 16
    return {
      finished: false,
      reactNode: null,
    };
  }

  childNodes.some((childNode, index) => {
    const { finished, reactNode } = measureNode(childNode, index);
    if (reactNode) {
      ellipsisChildren.push(reactNode);
    }
    return finished;
  });

  return {
    content: ellipsisChildren,
    text: ellipsisContainer.innerHTML,
    ellipsis: true,
  };
};

export default measure
