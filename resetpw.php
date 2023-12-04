<?php 
session_start();
$error = isset($_GET['error']) ? $_GET['error'] : ''; 
if($_SESSION['setpw'] != 1){
    session_destroy();
    header('location:forget.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include 'head.php'; ?>

<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>
    

    <!-- 以下写内容 -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="/index.php"><i class="las la-home"></i>返回首页</a>
            <a href="#" class="active">设置密码</a>
        </div>
    </div>

    <!--Login wrap-->
    <div class="register_wrap section_padding_b">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9">
                    <div class="register_form padding_default shadow_sm">
                        <h4 class="title_2">设置密码</h4>
                        <form action="getresetpw.php" method="post">
                            <div class="row" style="margin-top:10px;">
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>新密码 <span>*</span></label>
                                        <input type="password" placeholder="请输入密码" name='psword' value='<?php if($error == 1) echo $_SESSION['psword'];?>' required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>确认密码<span>*</span></label>
                                        <input type="password" placeholder="确认密码" name='repsword' required>
                                    </div>
                                </div>      
                                <?php if($error == 3) echo "<p style='color: red;'>填写信息不能为空</p>" ;?>
                                <?php if($error == 1) echo "<p style='color: red;'>密码不一致</p>" ;?>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="default_btn xs_btn rounded px-4 d-block w-100">重设密码</button>
                                </div>

                            </div>

                        </form>

                        



                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->

</body>
<?php include 'alljs.php';?>
</html>

