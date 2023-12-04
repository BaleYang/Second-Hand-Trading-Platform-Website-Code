<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;
}
if(!isset($_GET['QID'])){
    header('location:myqs.php');
    exit;
}
$QID = $_GET['QID'];
if(!is_numeric($QID)) header('location:index.php');
include 'head.php'; 
$ID = $_SESSION['ID'];
$servername = 'localhost';
$username = 'bale2002_0309';
$password = 'axiulan14';

// 创建连接
$conn = mysqli_connect($servername, $username, $password, 'bale2002_question', 3306);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include_once 'mysql.inc.php';
$sql = "SELECT * from questiontable WHERE QID = {$QID} AND ID = {$ID}";
$res = execute($conn,$sql);
$qs = mysqli_fetch_array($res);
$type = isset($qs['type'])? $qs['type'] : '';
?>
<link rel="stylesheet" href="assets/css/new.css">
<body>


    <?php include 'header.php'; ?>
    


    <!-- contact form -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="#">发布</a>
            <a href="#" class="active">问问题</a>
        </div>
    </div>
    <div class="contact_form section_padding_b">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">问问题</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-12">
                            <form action="regetqs.php?QID=<?php echo $QID;?>" method="post">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 （例：想去xx演唱会有没有一起团票的） <span>*</span></label>
                                    <input type="text" name="title" id="first_name" value = '<?php if(isset($qs['title'])) echo $qs['title'];?>' required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="subdivisions">分区<span>*</span></label>
                                    <div>
                                        <input name="type[]" type="checkbox" value="1" id="subdivisions_checkbox_lable1" <?php if((strpos($type, '1') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="2" id="subdivisions_checkbox_lable2" <?php if((strpos($type, '2') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="3" id="subdivisions_checkbox_lable3" <?php if((strpos($type, '3') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="4" id="subdivisions_checkbox_lable4" <?php if((strpos($type, '4') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="5" id="subdivisions_checkbox_lable5" <?php if((strpos($type, '5') !== false)) echo "checked='checked'";?>/>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable1">学习 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable2">生活 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable3">娱乐 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable4">工作 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable5">办手续 </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                          
                            <div class="col-xl-12 ">
                                <div class="single_billing_inp">
                                    <label for="county_region">内容 <span>*</span></label>
                                    <textarea type="text" name="content" id="county_region"><?php if(isset($qs['content'])) echo $qs['content'];?></textarea>
                                </div>
                            </div>

                            
                                <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user" <?php if((strpos($qs['anonymous'], '1') !== false)) echo "checked='checked'";?>/>
                                    <label class="checkbox  anonymous_user_checkbox" for="anonymous_user" >匿名提问</label> 
                                </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="default_btn xs_btn rounded px-4 float_l">下一步</button>
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