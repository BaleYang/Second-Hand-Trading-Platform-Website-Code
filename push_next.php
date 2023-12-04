<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>


    <?php include 'header.php'; ?>
    


    <!-- contact form -->
    <div class="contact_form section_padding">
        <div class="container">
        <div class="col-12 mt-4 ylable_padding">
            <a href="/ERSHOUreal/push_next.php"><button type="submit" class="default_btn xs_btn rounded px-4">返回首页</button></a>
        </div>
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">检查</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 <span>*</span></label>
                                    <p>半新ipad air3， 全套N1单词</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_billing_inp">
                                    <label for="last_name">价格（单位日元） <span>*</span></label>
                                    <p>25000 </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="email_addr">交易要求 <span>*</span></label>
                                   <p>周一到周五早8点半左右，山手线全线</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="subdivisions">分区<span>*</span></label>
                                    <p>书</p>
                                        
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bcc-upload-wrapper">
                                    <div class="cover-cut-content-upload-box">
                                        <img src="assets/images/banner-1.jpg" alt="" class="upload-icon-cloud" style="width: 105px; height: 77px; margin-top: 55px;">
                                       

                                        </div>
                                    </div>
                                    <input accept="image/png, image/jpeg" type="file" style="display: none;">
                                        
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="county_region">描述 <span>*</span></label>
                                    <textarea type="text" id="county_region">无敌</textarea>
                                </div>
                            </div>
                            <div class="col-12" style="display:none">
                                <div class="bcc-upload-wrapper">
                                    <div class="cover-cut-content-upload-box ">
                                        <img src="assets/images/banner-1.jpg" alt="" class="upload-icon-cloud" style="width: 105px; height: 77px; margin-top: 55px;">
                                        <div class="upload-text-main">上传二维码
                                        </div>
                                        <div class="upload-text-sub">

                                        </div>
                                    </div>
                                    <input accept="image/png, image/jpeg" type="file" style="display: none;">
                                        
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="default_btn xs_btn rounded px-4">发布</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script>

$(document).ready(function(){

//Example 2
$("#filer_input2").filer({
    limit: null,
    maxSize: null,
    extensions: null,
    changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>拖拽上传</h3> <span style="display:inline-block; margin: 15px 0">或者</span></div><a class="jFiler-input-choose-btn blue">点击选择文件</a></div></div>',
    showThumbs: true,
    theme: "dragdropbox",
    templates: {
        box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
        item: '<li class="jFiler-item">\
                    <div class="jFiler-item-container">\
                        <div class="jFiler-item-inner">\
                            <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-thumb-overlay">\
                                    <div class="jFiler-item-info">\
                                        <div style="display:table-cell;vertical-align: middle;">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                            <span class="jFiler-item-others">{{fi-size2}}</span>\
                                        </div>\
                                    </div>\
                                </div>\
                                {{fi-image}}\
                            </div>\
                            <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left">\
                                    <li>{{fi-progressBar}}</li>\
                                </ul>\
                                <ul class="list-inline pull-right">\
                                    <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                </ul>\
                            </div>\
                        </div>\
                    </div>\
                </li>',
        itemAppend: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-thumb-overlay">\
                                        <div class="jFiler-item-info">\
                                            <div style="display:table-cell;vertical-align: middle;">\
                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                <span class="jFiler-item-others">{{fi-size2}}</span>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
        progressBar: '<div class="bar"></div>',
        itemAppendToEnd: false,
        canvasImage: true,
        removeConfirmation: true,
        _selectors: {
            list: '.jFiler-items-list',
            item: '.jFiler-item',
            progressBar: '.bar',
            remove: '.jFiler-item-trash-action'
        }
    },
    dragDrop: {
        dragEnter: null,
        dragLeave: null,
        drop: null,
        dragContainer: null,
    },
    uploadFile: {
        url: "ajax_upload_file.php",
        data: null,
        type: 'POST',
        enctype: 'multipart/form-data',
        synchron: true,
        beforeSend: function(){},
        success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){
           
            var parent = itemEl.find(".jFiler-jProgressBar").parent(),
                new_file_name = JSON.parse(data),
                filerKit = inputEl.prop("jFiler");
                filerKit.files_list[id].name = new_file_name;
                //这里存储的是图片的列表，上传之前获取一下
                console.log(filerKit.files_list);
            itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> 上传成功</div>").hide().appendTo(parent).fadeIn("slow");
            });
        },
        error: function(el){
            var parent = el.find(".jFiler-jProgressBar").parent();
            el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> 上传失败</div>").hide().appendTo(parent).fadeIn("slow");
            });
        },
        statusCode: null,
        onProgress: null,
        onComplete: null
    },
    files: null,
    addMore: false,
    allowDuplicates: true,
    clipBoardPaste: true,
    excludeName: null,
    beforeRender: null,
    afterRender: null,
    beforeShow: null,
    beforeSelect: null,
    onSelect: null,
    afterShow: null,
    onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
        var filerKit = inputEl.prop("jFiler"),
            file_name = filerKit.files_list[id].name;

        $.post('./ajax_remove_file.php', {file: file_name});
    },
    onEmpty: null,
    options: null,
    dialogs: {
        alert: function(text) {
            return alert(text);
        },
        confirm: function (text, callback) {
            confirm(text) ? callback() : null;
        }
    },
    captions: {
        button: "选择文件",
        feedback: "Choose files To Upload",
        feedback2: "files were chosen",
        drop: "Drop file here to Upload",
        removeConfirmation: "Are you sure you want to remove this file?",
        errors: {
            filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
            filesType: "Only Images are allowed to be uploaded.",
            filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
            filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
        }
    }
});
})

    </script>

    <!-- all js -->
    <?php include 'alljs.php';?>
</body>

</html>