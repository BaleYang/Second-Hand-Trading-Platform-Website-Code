<?php 
$title = isset($_GET['title']) ? $_GET['title'] : '';  
$type = isset($_GET['type']) ? $_GET['type'] : ''; 
$content = isset($_GET['content']) ? $_GET['content'] : ''; 
$anonymous = $_GET['anonymous'];
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>


    <?php include 'header.php'; ?>
    


    <!-- contact form -->
    <div class="contact_form section_padding_b">
        <div class="container">
        <div class="col-12 ylable_padding">
            <a href="askqs.php"><button type="submit" class="default_btn xs_btn rounded px-4">返回</button></a>
        </div>
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">确认</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 <span>*</span></label>
                                    <p><?php echo $title;?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single_billing_inp">
                                    <label for="last_name">分区<span>*</span></label>
                                    <p>
                                    <?php if(strpos($type, '1') !== false) echo '学习&#8195;'; ?>  
                                    <?php if(strpos($type, '2') !== false) echo '生活&#8195;';?>  
                                    <?php if(strpos($type, '3') !== false) echo '娱乐组队&#8195;';?>  
                                    <?php if(strpos($type, '4') !== false) echo '工作&#8195;';?>  
                                    <?php if(strpos($type, '5') !== false) echo '办手续&#8195;';?>  
                                </p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="email_addr">内容<span>*</span></label>
                                   <p><?php echo $content;?></p>
                                </div>
                            </div>
                            <p><?php if($anonymous == 1) echo '匿名发布'; 
                                    else echo '公开发布';?>
                            <div class="col-12 mt-4">
                                <form action="getqsnext.php" method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title;?>">
                                    <input type="hidden" name="type" value="<?php echo $type;?>">
                                    <input type="hidden" name="content" value="<?php echo $content;?>">
                                    <input type="hidden" name="anonymous" value="<?php echo $anonymous;?>">
                                    <button type="submit" class="default_btn xs_btn rounded px-4">发布</button>
                                </form>
                            </div>

                        </div>
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