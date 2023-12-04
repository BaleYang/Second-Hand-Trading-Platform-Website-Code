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
            <a href="#" class="active">换钱</a>
        </div>
    </div>
    <div class="contact_form section_padding_b">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">换钱</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-lg-6">
                            <form action="getcoin.php" method="post">
                                <div class="single_billing_inp">
                                    <label for="first_name" >地点<span>*</span></label>
                                    <input type="text" name="place" id="first_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label for="subdivisions">分区<span>*</span></label>
                                        <div class="search_category">
                                            <select class="nice_select" name="type" required>
                                                <option value="1">用人民币换日元</option>
                                                <option value="2">用日元换人民币</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_billing_inp">
                                    <label for="first_name1" >金额（此金额为您想使用的金额，例：15万日元）<span>*</span></label>
                                    <input type="text" name="price" id="first_name1" required>
                            </div>
                            <div class="col-xl-12 ">
                                <div class="single_billing_inp">
                                    <label for="county_region">交易方式（例：支付宝汇率）<span>*</span></label>
                                    <input type="text" name="method" id="county_region" required>
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
                            <div class="col-12 mt-3">
                                <button type="submit" class="default_btn xs_btn rounded px-4 float_l">发布</button>
                            </div>
                            </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>


    <!-- all js -->
    <?php include 'alljs.php';?>
</body>

</html>