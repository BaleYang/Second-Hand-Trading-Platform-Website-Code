<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<body>
<?php $error = isset($_GET['error']) ? $_GET['error'] : '';?>

    <!-- order complete -->
    <div class="meiyouyiyidezhanweifu"> </div>
    <div class="cart_area section_padding_b">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="order_complete">
                                <div class="complete_icon">
                                    <img loading="lazy"  src="images/failed.jpg" alt="failed">
                                </div>
                                <div class="order_complete_content">
                                    <h4>发布失败</h4>
                                    <?php if($error==1) echo '<p>不能在一分钟之内进行多次发布哦～</p>';
                                    else echo '<p>发生未知错误，请稍后重试</p>';?>
                                        <div class="order_complete_btn">
                                            <a href="index.php" class="default_btn rounded">返回</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

   

    <!-- all js -->
    <?php include 'alljs.php';?>
</body>

</html>