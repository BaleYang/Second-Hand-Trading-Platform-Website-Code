<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php'; 
?>

<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>


    <!-- 以下写内容 -->
    
    <!-- breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home"></i>返回首页</a>
            <a href="#" class="active">用户主页</a>
        </div>
    </div>

    <!-- account -->
    <div class="my_account_wrap section_padding_b">   
        <div class="container">
            <div class="row">
                <!--  account sidebar  -->

                <!-- account content -->
                <div class="col-lg-9">
                    <div class="account_cont_wrap">
                        <div class="profile_info_wrap">
                            <div class="row">



                                <div class="col-lg-4">

                                    <div class="single_prof_info shadow_sm">
                                        <div class="prof_info_title">
                                            <h4>创始人微信二维码</h4>
                                        </div>
                                        <div class="prfo_info_cont">
                                        <p>欢迎来唠嗑，闲聊～</p>
                                        <p>也诚挚地邀请对编程感兴趣的小伙伴加入我们哦～</p>
                                            <div class="user_erweima_warpper">
                                                <img src="assets/images/WechatQR.jpeg" alt="user_erweima">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="single_prof_info shadow_sm">
                                        <div class="prof_info_title">
                                            <h4>创始人微信二维码2</h4>
                                        </div>
                                        <div class="prfo_info_cont">

                                            <div class="user_erweima_warpper">
                                                <img src="assets/images/wechatQR2.png" alt="user_erweima">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/app.js"></script>


    <script>
    function copyArticle(event){
        const range = document.createRange();
        range.selectNode(document.getElementById('weixinhao'));

        const selection = window.getSelection();
        if(selection.rangeCount > 0) selection.removeAllRanges();
        selection.addRange(range);
        
        document.execCommand('copy');
    }

    document.getElementById('copy').addEventListener('click', copyArticle, false);
    </script>
</body>

</html>
