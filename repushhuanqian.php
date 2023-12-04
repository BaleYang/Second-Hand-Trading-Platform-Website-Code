<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php'; 
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;
}
if(!isset($_GET['MID'])){
    header('location:myhuanqian.php');
    exit;
}
include 'head.php';
include_once 'connectdb.php';
include_once 'mysql.inc.php';
$ID = $_SESSION['ID'];
$MID = $_GET['MID'];
$sql = "SELECT * from moneytable WHERE MID = {$MID} AND ID = {$ID}";
$res = execute($conn,$sql);
$money = mysqli_fetch_array($res);
$type = isset($money['type'])? $money['type'] : '';
?>
<link rel="stylesheet" href="assets/css/new.css">
<body>


    <?php include 'header.php'; ?>
    <!-- contact form -->
    <div class="contact_form section_padding_b">
        <div class="container">
        <div class="col-12 ylable_padding">
            <a href="index.php"><button type="submit" class="default_btn xs_btn rounded px-4">返回首页</button></a>
        </div>
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">换钱</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-lg-6">
                            <form action="regetcoin.php?MID=<?php echo $MID;?>" method="post">
                                <div class="single_billing_inp">
                                    <label for="first_name" >地点<span>*</span></label>
                                    <input type="text" name="place" id="first_name" value = '<?php if(isset($money['place'])) echo $money['place'];?>' required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label for="subdivisions">分区<span>*</span></label>
                                        <div class="search_category">
                                            <select class="nice_select" name="type" required>
                                                <option value="1" <?php if($type==1) echo "selected='selected'";?>>用人民币换日元</option>
                                                <option value="2" <?php if($type==2) echo "selected='selected'";?>>用日元换人民币</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_billing_inp">
                                    <label for="first_name1" >金额（此金额为您想使用的金额，例：15万日元）<span>*</span></label>
                                    <input type="text" name="price" id="first_name1" value = '<?php if(isset($money['price'])) echo $money['price'];?>' required>
                            </div>
                            <div class="col-xl-12 ">
                                <div class="single_billing_inp">
                                    <label for="county_region">交易方式（例：支付宝汇率）<span>*</span></label>
                                    <input type="text" name="method" id="county_region" value = '<?php if(isset($money['method'])) echo $money['method'];?>' required>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="default_btn xs_btn rounded px-4 float_l">确认修改</button>
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