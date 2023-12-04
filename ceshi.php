<!DOCTYPE html>
<html lang="en">
    
<?php 
include 'head.php'; 
?>

<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>


    <!-- 以下写内容 -->
    
 <!-- new arrive -->

    <!-- breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="index.php">购闲置</a>
            <a href="#" class="active">购买页面</a>
        </div>
    </div>

    <!-- product view -->
    
    <div class="product_view_wrap section_padding_b">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  
                </div>
                <div class="col-lg-6">
                    <div class="product_info_wrapper">
                        <div class="product_base_info">
                            <h1></h1>
                            
                            <div class="product_other_info">
                                <p><span>发布人:</span></p>
                                <p><span>发布日期:</span></p>
                                <p><span>交易地点/要求:</span></p>
                            </div>
                            <div class="price mt-3 mb-3 d-flex align-items-center">
                           
                            </div>
                            <div class="pd_dtails">
                                
                            </div>
                        </div>
                        <div class="product_buttons">
                            <form action="userpage.php" method="post">

                                    <button href="#" class="default_btn small rounded me-sm-3 me-2 px-4"><i class="icon-cart me-2"></i> 联系卖家</button>
                                    <!-- 下面放在和联系卖家button同样的位置（只要别放出这个div就行） -->
                                    <p id="wangzhi">网址写在这里</p>
                                    <button class="default_btn small rounded second border-none la la-copy" id="copy" style="margin-left:auto;margin-right:auto;">复制网址</button>
                                  
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->
    <?php include 'alljs.php';?>

    <script>
    function copyArticle(event){
        const range = document.createRange();
        range.selectNode(document.getElementById('wangzhi'));

        const selection = window.getSelection();
        if(selection.rangeCount > 0) selection.removeAllRanges();
        selection.addRange(range);
        
        document.execCommand('copy');
    }

    document.getElementById('copy').addEventListener('click', copyArticle, false);
    </script>
</body>


</html>




