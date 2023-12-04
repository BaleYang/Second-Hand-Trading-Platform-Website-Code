<?php 
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
            <a href="#" class="active">更改密码</a>
        </div>
    </div>

    <!--Login wrap-->
    <div class="register_wrap section_padding_b">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9">
                    <div class="register_form padding_default shadow_sm">
                        <h4 class="title_2">更改密码</h4>
                        <form action="changepw.php" method='post'>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>旧密码 <span>*</span></label>
                                        <input type="password" placeholder="请输入旧密码" name='psword' required>
                                    </div>
                                </div>
                                <?php if($error == 1) echo "<p style='color: red;'>旧密码输入错误</p>" ;?>
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>新密码<span>*</span></label>
                                        <input type="password" placeholder="请输入新密码" name='newpsword' required>
                                    </div>
                                </div>      
                                <div class="col-12 mt-3">
                                    <button type="submit" class="default_btn xs_btn rounded px-4 d-block w-100">确认更改</button>
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
<?php include 'info.php';?>
</html>

