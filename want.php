<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php'; 
session_start();
if(isset($_SESSION['ID'])){
    $ID = $_SESSION['ID'];
    include_once 'connectdb.php';
    include_once 'mysql.inc.php';
    $sql = "SELECT wechatID from userinfo WHERE ID = {$ID}";
    $res = execute($conn,$sql);
    $push = mysqli_fetch_array($res);
    $wechatID = $push['wechatID'];
}
?>
<link rel="stylesheet" href="assets/css/new.css">
<body>


    <?php include 'header.php'; ?>


    <!-- contact form -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="#">发布</a>
            <a href="#" class="active">求闲置</a>
        </div>
    </div>
    <div class="contact_form section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">求闲置</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-12">
                            <form action="getrequire.php" method="post">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 （例：池袋想收二手1080显卡） <span>*</span></label>
                                    <input type="text" name= "title" id="first_name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="last_name">理想价格（单位日元）</label>
                                    <input type="text" name= "price" id="last_name">
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
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="county_region">描述 （例: 可以接受价格最高3w，能用就行，不需要高配，用的时间长了也无所谓）</label>
                                    <textarea type="text" name= "content" id="county_region"></textarea>
                                </div>
                            </div>
                            <!--
                            <div class="col-12 mt-3">
                                <a href="/ERSHOUreal/push_next.php"><button type="submit" class="default_btn xs_btn rounded px-4 float_l">注册/登录</button></a><a href="/ERSHOUreal/push_next.php"><button type="submit" class="default_btn xs_btn rounded px-4 float_l" style="margin-left:20px">上传二维码</button></a>
                                <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user"/>
                                    <label class="checkbox  anonymous_user_checkbox" for="anonymous_user">匿名提问</label> 
                                </div>
                            </div>
-->
                            <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user"/>
                                    <label class="checkbox  anonymous_user_checkbox" for="anonymous_user">匿名提问</label> 
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="default_btn xs_btn rounded px-4 float_l">发布</button>
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
    <?php include 'alljs.php';?>



</body>

</html>