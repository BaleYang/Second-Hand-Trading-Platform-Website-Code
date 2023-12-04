<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;
}
if(!isset($_GET['PID'])){
    header('location:myqs.php');
    exit;
}
include 'head.php';
include_once 'connectdb.php';
include_once 'mysql.inc.php';
$ID = $_SESSION['ID'];
$PID = $_GET['PID'];
if($_SESSION['test'] == 1){
    include_once 'removeimg.php';
    $sql = "SELECT pushtimes from pushtable WHERE ID = {$ID} AND PID = {$PID}";
    $res = execute($conn,$sql);
    $count = mysqli_fetch_array($res)['pushtimes'];
    deleteDir("./uploads/{$ID}/{$count}");
    @mkdir("./uploads/{$ID}/{$count}");
}
$sql = "SELECT * from pushtable WHERE PID = {$PID} AND ID = {$ID}";
$res = execute($conn,$sql);
$push = mysqli_fetch_array($res);
$type = isset($push['type'])? $push['type'] : '';
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
                        <form action="regetpush.php?PID=<?php echo $PID;?>" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 （例：半新ipad air3， 全套N1单词） <span>*</span></label>
                                    <input type="text" id="first_name" name='title' value = '<?php if(isset($push['title'])) echo $push['title'];?>' required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label class="col-lg-3 col-sm-6 float-start"for="last_name">价格（单位日元） <span>*</span></label><input type="checkbox" id="forfree" name='free'class="float-start"style="max-width:20px;margin-top:6px;" value='1' <?php if((strpos($push['free'], '1') !== false)) echo "checked='checked'";?>><label class="col-lg-3 col-sm-4 float-start"for="forfree" >送闲置</label>
                                    <input type="text" id="last_name" name='price'  value = '<?php if(isset($push['price'])) echo $push['price'];?>'>
                                   <!--<p style=""class="float-start">勾选送闲置代表您想把闲置免费送人</p>-->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="email_addr">交易地点/要求（例：周一到周五早8点半左右，山手线全线） <span>*</span></label>
                                    <input type="text" id="email_addr" name='method' value = '<?php if(isset($push['method'])) echo $push['method'];?>'>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="subdivisions">分区<span>*</span></label>
                                         <div class="push_tag">
                                        <input name="type[]" type="checkbox" value="1" id="subdivisions_checkbox_lable1" <?php if((strpos($type, '1') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="2" id="subdivisions_checkbox_lable2" <?php if((strpos($type, '2') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="3" id="subdivisions_checkbox_lable3" <?php if((strpos($type, '3') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="4" id="subdivisions_checkbox_lable4" <?php if((strpos($type, '4') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="5" id="subdivisions_checkbox_lable5" <?php if((strpos($type, '5') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="6" id="subdivisions_checkbox_lable6" <?php if((strpos($type, '6') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="7" id="subdivisions_checkbox_lable7" <?php if((strpos($type, '7') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="8" id="subdivisions_checkbox_lable8" <?php if((strpos($type, '8') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="9" id="subdivisions_checkbox_lable9" <?php if((strpos($type, '9') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="a" id="subdivisions_checkbox_lable10" <?php if((strpos($type, 'a') !== false)) echo "checked='checked'";?>/>
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
                            <div class="col-12">
                                 <input type="file" name="images[]" id="filer_input2" multiple="multiple">
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="county_region">描述 <span>*</span></label>
                                    <textarea type="text" id="county_region" name='content'><?php if(isset($push['content'])) echo $push['content'];?></textarea>
                                </div>
                            </div>
                            <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user" <?php if((strpos($push['anonymous'], '1') !== false)) echo "checked='checked'";?>/>
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
                <!-- <div class="col-lg-5 col-xl-4 col-12 mt-4 mt-lg-0">
                    <div class="padding_default border-0 shadow_sm">
                        <h4 class="title_4">our store</h4>
                        <div class="footer_contact">
                            <p>
                                <span class="icn"><i class="las la-map-marker-alt"></i></span>
                                7895 Dr New Albuquerue, NM 19800, nited
                                States Of America
                            </p>
                            <p class="phn">
                                <span class="icn"><i class="las la-phone"></i></span>
                                +566 477 256, +566 254 575
                            </p>
                            <p class="eml">
                                <span class="icn"><i class="lar la-envelope"></i></span>
                                info@domain.com
                            </p>
                        </div>

                        <h4 class="title_4 mt-4">Hours of operation</h4>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Saturday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Sunday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Monday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Tuesday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Wednesday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Thursday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between mb-0">
                            <p class=" mb-0">Friday</p>
                            <p class=" mb-0">12:00 PM</p>
                        </div>

                        <h4 class="title_4 mt-4">Careers</h4>
                        <p class="text_md mb-0">If you are interesting in emplyment opportunities at RAFCARTs. Please
                            email us : <a href="#" class="text-color">contact@familiar.com</a>
                        </p>
                       
                    </div>
                </div> -->
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
        url: "reuploadimg.php?PID=<?php echo $PID;?>",
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