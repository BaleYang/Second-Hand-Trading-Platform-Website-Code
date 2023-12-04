<?php 
session_start();
$error = isset($_GET['error']) ? $_GET['error'] : '';  
if(isset($_SESSION['codetime'])){
    $resttime = 60 - (time() - $_SESSION['codetime']);
    if($resttime <= 0) $resttime = 0;
}
else $resttime = 0;
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
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="#" class="active">注册</a>
        </div>
    </div>

    <!--register wrapper-->
    <div class="register_wrap section_padding_b">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9">
                    <div class="register_form padding_default shadow_sm">
                        <h4 class="title_2">创建新账户</h4>
                        <p class="mb-4 text_md"></p>
                        <form action="addusers.php" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>用户名 <span>*</span></label>
                                        <input type="text" name="nickname" placeholder="填写用户名（后续可更改）" value='<?php if(!empty($_SESSION['nickname'])) echo $_SESSION['nickname'];?>' required>
                                    </div>
                                </div>
                                <?php if($error == 1) echo "<span style='color: red;'>请填写用户名</span>" ?>
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>邮箱<span>*</span></label>
                                        <input type="email" name="email" placeholder="填写新邮箱" value='<?php if(!empty($_SESSION['email'])) echo $_SESSION['email'];?>' id= 'mail' required>
                                    </div>
                                </div>
                                <?php if($error == 2) echo "<span style='color: red;'>请填写邮箱</span>" ?>
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>密码 <span>*</span></label>
                                        <input type="password" name="psword" placeholder="请输入密码" value='<?php if(!empty($_SESSION['psword'])) echo $_SESSION['psword'];?>' required>
                                    </div>
                                </div>
                                <?php if($error == 3) echo "<span style='color: red;'>请填写密码</span>" ?>
                                <div class="col-12">
                                    <div class="single_billing_inp">
                                        <label>确认密码 <span>*</span></label>
                                        <input type="password" name="repsword" placeholder="输入确认密码" value='<?php if(!empty($_SESSION['repsword'])) echo $_SESSION['repsword'];?>' required>
                                    </div>
                                </div>
                                <?php if($error == 4) echo "<span style='color: red;'>请填写确认密码</span>" ?>
						        <?php if($error == 6) echo "<span style='color: red;'>密码不一致</span>" ?>
                                <!-- <div class="col-12 mt-2">
                                    <div class="custom_check check_2 d-flex align-items-center">
                                        <input type="checkbox" class="check_inp" hidden id="save-default">
                                        <label for="save-default">I have read and agree to the <a href="terms-condition.html"
                                                class="text-color">terms & conditions</a> </label>
                                    </div>
                                </div> -->
                                <div class="col-12 ">
                                    <div class="single_billing_inp">
                                        <label>输入邮箱验证码 <span>*</span></label>
                                        <input type="text" class=" wid50a" name="code" placeholder="输入验证码"><!-- 把这个input变短，在旁边加一个发送邮箱验证码的button，总长度和上下input框一致-->
                                        <button class="default_btn rounded second border-none wid50b" id='123' type='button'><?php if($resttime == 0) echo '发送验证码'; else  echo '稍后重新发送';?></button>
                                </div>
                                    
                                    
                                    <!--<img src="captcha.php"  onclick="this.src='captcha.php?captcha='+Math.random()">
                                    <font color="#ffffff">点击图片刷新验证码</font>-->
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit" class="default_btn xs_btn rounded px-4 d-block w-100">注册</button>
                                </div>


                            </div>
                        </form>

                        

                        <p class="text-center mt-3 mb-0">已经注册过了? <a href="login.php" class="text-color">立即登录</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->

</body>
    <script type="text/javascript"> 
        var countdown=<?php echo $resttime;?>;
        var test=<?php if($resttime > 0) echo 0; else echo 1;?>;
        document.getElementById('123').onclick = function(){
            settime(this);
        }
        function settime(val){
            if(test){
                var mail=document.getElementById("mail").value;
                var ajaxObj = new XMLHttpRequest();
                ajaxObj.open('get', 'sendmail.php?email='+mail);
                ajaxObj.send();
                test = 0;
            }
            if(countdown == 0){
                val.disabled = false;
                val.innerHTML='发送验证码';
                countdown = 60;
                test=1;
            }
            else{
                val.disabled=true;
                val.innerHTML = countdown + "秒后可以重新发送";
                countdown -= 1;
                setTimeout(function(){
                    settime(val)
                },1000)
            }
        }
	</script>
	<?php include 'alljs.php';?>
	<?php include 'info.php';?>
</html>
