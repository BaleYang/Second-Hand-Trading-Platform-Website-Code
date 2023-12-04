<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';

?>
<body>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- new arrive -->
    <div class="container row">
        <div class="breadcrumbs col-lg-6">
            <a href="/index.php" ><i class="las la-home">返回主页</i></a>
            <a href="#" class="active">XXX的闲置</a>
        </div>
        <p id="wangzhi">网址写在这里</p>
        <div style="align-items: center; display: flex; margin-bottom:15px;" class="col-lg-6">
        <button class="default_btn small rounded second border-none list_product_btn la la-copy" id="copy" style="margin-left:auto;margin-right:auto;">复制网址</button>
        </div>
    </div>

    <section class="new_arrive section_padding_b">
        <div class="container">


            <div class="row gy-4">   
            <?php 
                for($i=0;$i<30;$i++){
                $push = mysqli_fetch_array($res1);
                if(!isset($push)) break;?>
                <div class="col-lg-3 col-sm-6">

                    <div class="single_new_arrive">
                    <a href="show.php?PID=<?php echo $push['PID'];?>">
                        <div class="sna_img">
                            <img loading="lazy"  class="prd_img" src="<?php echo showimg($push['ID'], $push['pushtimes'], 1);?>" alt="product">
                        </div>
                            <div class="sna_content">
                    
                                <h4><?php echo htmlspecialchars(limstr($push['title'], 13));?></h4>
                            </a>
                                <div class="ratprice">
                                    <div class="price">
                                        <span class="org_price">¥<?php echo htmlspecialchars($push['price']);?></span>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
                <?php };?>

            </div>
        </div>
        <div class="pagination_wrp d-flex align-items-center justify-content-center">            
        <?php echo $data['html'];?>
    </div>
    </section>

    <?php include 'footer.php'; ?>

    <!-- all js -->
    <?php include 'alljs.php';?>
    <?php include 'info.php';?>
</body>
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
</html>