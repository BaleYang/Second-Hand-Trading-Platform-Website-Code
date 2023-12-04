<?php
function showimg($ID, $pushtimes, $way){
    $filenames = scandir("./uploads/{$ID}/{$pushtimes}/");
    $len = count($filenames);
    if($way == 1){
        if($len == 2) return 'assets/images/noimg.png';
        $img = $filenames[$len-1];
        return "./uploads/{$ID}/{$pushtimes}/{$img}";
    }
    else if($way == 2){
        if($len == 2){
            $html = '<div class="product_view_slider">
                        <div class="single_viewslider">
                            <img loading="lazy"  src="assets/images/noimg.png" alt="product">
                        </div>
                    </div>';
            return $html;
        }
        if($len == 3){
            $img = $filenames[2];
            $html = "<div class='product_view_slider'>
                        <div class='single_viewslider'>
                            <img loading='lazy'  src='./uploads/{$ID}/{$pushtimes}/{$img}' alt='product'>
                        </div>
                    </div>";
            return $html;
        }
        $html = '<div class="product_view_slider">';
        for($i=1;$i<$len-1;$i++){
            $img = $filenames[$len-$i];
            $html .= "<div class='single_viewslider'><img loading='lazy'  src='./uploads/{$ID}/{$pushtimes}/{$img}' alt='product'></div>";
        }
        $html .= "</div>";
        $html .= '<div class="product_viewslid_nav">';
        for($i=1;$i<$len-1;$i++){
            $img = $filenames[$len-$i];
            $html .= "<div class='single_viewslid_nav'><img loading='lazy'  src='./uploads/{$ID}/{$pushtimes}/{$img}' alt='product'></div>";
        }
        $html .= "</div>";

        return $html;
    }
}

/*
<div class="product_view_slider">
    <div class="single_viewslider">
        <img loading="lazy"  src="assets/images/slider-1.png" alt="product">
    </div>
    <div class="single_viewslider">
        <img loading="lazy"  src="assets/images/slider-2.png" alt="product">
    </div>
    <div class="single_viewslider">
        <img loading="lazy"  src="assets/images/slider-3.png" alt="product">
    </div>
    <div class="single_viewslider">
        <img loading="lazy"  src="assets/images/slider-4.png" alt="product">
    </div>
    <div class="single_viewslider">
        <img loading="lazy"  src="assets/images/slider-5.png" alt="product">
    </div>
    <div class="single_viewslider">
        <img loading="lazy"  src="assets/images/slider-1.png" alt="product">
    </div>
</div>
<div class="product_viewslid_nav">
    <div class="single_viewslid_nav">
        <img loading="lazy"  src="assets/images/slider-1.png" alt="product">
    </div>
    <div class="single_viewslid_nav">
        <img loading="lazy"  src="assets/images/slider-2.png" alt="product">
    </div>
    <div class="single_viewslid_nav">
        <img loading="lazy"  src="assets/images/slider-3.png" alt="product">
    </div>
    <div class="single_viewslid_nav">
        <img loading="lazy"  src="assets/images/slider-4.png" alt="product">
    </div>
    <div class="single_viewslid_nav">
        <img loading="lazy"  src="assets/images/slider-5.png" alt="product">
    </div>
    <div class="single_viewslid_nav">
        <img loading="lazy"  src="assets/images/slider-1.png" alt="product">
    </div>
</div>
*/