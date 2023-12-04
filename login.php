<?php 
session_start();
$error = isset($_GET['error']) ? $_GET['error'] : ''; 
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
            <a href="#" class="active">登录账号</a>
        </div>
    </div>

    <!--Login wrap-->
    <div class="register_wrap section_padding_b">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9">
                    <div class="register_form padding_default shadow_sm">
                        <h4 class="title_2">登录</h4>
                        <form action="login_check.php" method="post">
                            <div class="row" style="margin-top:10px;">
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>邮箱 <span>*</span></label>
                                        <input type="email" name="email" placeholder="请输入您的邮箱" value='<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>' required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>密码<span>*</span></label>
                                        <input type="password" name="psword" placeholder="请输入密码" required>
                                    </div>
                                </div>
                                <?php if($error == 1) echo "<p style='color: red;'>邮箱或密码错误</p>" ;?>
                                            <!-- 记住我的密码，没用删了这个div就行 -->
                                            <div class="col-12 mt-2 d-flex justify-content-between align-items-center">
                                                <div class="custom_check check_2 d-flex align-items-center">
                                                    <input type="checkbox" class="check_inp"  id="save-default">
                                                    <label for="save-default">记住我</label>
                                                </div>
                                            
                                                <a href="forget.php" class="text-color">忘记密码?</a>
                                            </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="default_btn xs_btn rounded px-4 d-block w-100">登录</button>
                                </div>

                            </div>
                        </form>

                        

                        <p class="text-center mt-3 mb-0">没有账号? <a href="register.php" class="text-color">点击注册</a></p>
                        <!--<p class="text-center mt-3 mb-0 float-end"><a href="index.php" class="text-color">先去逛逛→</a></p>-->

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
<?php include 'info.php'; ?>
</html>