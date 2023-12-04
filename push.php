<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
session_start();
if(isset($_SESSION['ID'])){
    $ID = $_SESSION['ID'];
    include_once 'connectdb.php';
    include_once 'mysql.inc.php';
    include_once 'removeimg.php';
    $sql = "SELECT pushtimes,wechatID from userinfo WHERE ID = {$ID}";
    $res = execute($conn,$sql);
    $push = mysqli_fetch_array($res);
    $count = $push['pushtimes'] + 1;
    $wechatID = $push['wechatID'];
    deleteDir("./uploads/{$ID}/{$count}");
}
include_once 'connectdb.php';
include_once 'mysql.inc.php';

?>
<body>


    <?php include 'header.php'; ?>
    
    <style>

.jFiler-input-dragDrop{
    margin:50px 0;
    
}
.icon-jfi-trash:before{
    font-family: "jquery-filer";
}
    </style>

    <!-- contact form -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="#">发布</a>
            <a href="#" class="active">发布闲置</a>
        </div>
    </div>
    <div class="contact_form section_padding">
    
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">出闲置</h4>
                        <form action="getpush.php" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 （例：半新ipad air3， 全套N1单词） <span>*</span></label>
                                    <input type="text" id="first_name" name='title' required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label class="col-lg-3 col-sm-6 float-start"for="last_name">价格（单位日元）</label><input type="checkbox" id="forfree" name='free'class="float-start"style="max-width:20px;margin-top:6px;" value='1'><label class="col-lg-3 col-sm-4 float-start"for="forfree">送闲置</label>
                                    <input type="text" id="last_name" name='price'>
                                   <!--<p style=""class="float-start">勾选送闲置代表您想把闲置免费送人</p>-->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="email_addr">交易地点/要求（例：周一到周五早8点半左右，山手线全线）</label>
                                    <input type="text" id="email_addr" name='method'>
                                </div>
                            </div>
                            <?php if(empty($wechatID) && isset($_SESSION['ID'])) echo "
                            <div class='col-12'>
                                <div class='single_billing_inp'>
                                    <label for='weixin'>微信号<span>*</span></label>
                                    <input type='text' id='weixin' name='wechatID' required>
                                </div>
                                <p>*填写微信号是为了让买家更方便的联系到您。在登录状态下，您可以在任何时候删除保存的微信号。</p>
                            </div>
                            ";?>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="subdivisions">分区<span>*</span></label>
                                         <div class="push_tag">
                                        <input name="type[]" type="checkbox" value="1" id="subdivisions_checkbox_lable1"/>
                                        <input name="type[]" type="checkbox" value="2" id="subdivisions_checkbox_lable2"/>
                                        <input name="type[]" type="checkbox" value="3" id="subdivisions_checkbox_lable3"/>
                                        <input name="type[]" type="checkbox" value="4" id="subdivisions_checkbox_lable4"/>
                                        <input name="type[]" type="checkbox" value="5" id="subdivisions_checkbox_lable5"/>
                                        <input name="type[]" type="checkbox" value="6" id="subdivisions_checkbox_lable6"/>
                                        <input name="type[]" type="checkbox" value="7" id="subdivisions_checkbox_lable7"/>
                                        <input name="type[]" type="checkbox" value="8" id="subdivisions_checkbox_lable8"/>
                                        <input name="type[]" type="checkbox" value="9" id="subdivisions_checkbox_lable9"/>
                                        <input name="type[]" type="checkbox" value="a" id="subdivisions_checkbox_lable10"/>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable1">电子产品 </label>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable2">服饰装扮 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable3">书籍资料 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable4">家具家电 </label>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable5">生活用品 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable6">实用工具 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable7">游戏账号 </label>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable8">生活相关 </label>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable9">娱乐相关 </label>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable10">学习相关 </label>
                                        </div>
                                </div>
                            </div>
                            <div class='col-12'>
                                <p>图片(可不添加)</p>
                                 <input type='file' name='images[]' id='filer_input2' multiple="multiple">
                                 
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="county_region">描述 </label>
                                    <textarea type="text" id="county_region" name='content'></textarea>
                                </div>
                            </div>
                            <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user"/>
                                    <label class="checkbox  anonymous_user_checkbox" for="anonymous_user">匿名提问</label> 
                            </div>
                            <div class="col-12 mt-4">
                                <input type="hidden" id="img_list" name="img_list" value="" />
                                <button type="submit" class="default_btn xs_btn rounded px-4">发布</button><!--<a href="/ERSHOUreal/push_next.php"><button type="submit" class="default_btn xs_btn rounded px-4" style="margin-left:20px">上传二维码</button></a>-->
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>


    <!-- all js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/libs/jquery.filer-1.3.0/js/jquery.filer.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
    
    //上传之前的处理
    function doSubmit(){
        let inputEl = $("#filer_input2")
        let filerKit = inputEl.prop("jFiler"); 
        let image_list = [];
        filerKit.files_list.forEach(element =>{
            image_list.push(element.name)
        });
        image_list = image_list.join(',')
        $("#img_list").val(image_list);
    }
$(document).ready(function(){

    
//Example 2
$("#filer_input2").filer({
    limit: 9,           //上传五张
    maxSize: 20,       //20MB
    extensions: ["jpg", "jpeg","png", "gif"],
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
        removeConfirmation: "确定要删除这个文件吗?",
        errors: {
            filesLimit: "最多上传 {{fi-limit}}张图片.",
            filesType: "只能上传图片文件.",
            filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
            filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
        }
    }
});
})

    </script>
</body>

</html>