<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
include_once 'connectdb.php';
include_once 'mysql.inc.php';
include_once 'page.inc.php';
include 'showimg.php';
include 'limstr.php';
include_once 'urlencode.php';
$ID = isset($_GET['ID']) ? $_GET['ID'] : '';
$ID = is_numeric(authcode($ID,'axiulan',true)) ? authcode($ID,'axiulan',true) : '';
if(empty($ID)){
    header('location:index.php');
    exit;
}
$sql = "SELECT * from pushtable WHERE ID = '{$ID}' ORDER BY PID DESC ";
$res = execute($conn,$sql);
$count = mysqli_num_rows($res);
$sql1 = "SELECT wechatID,nickname from userinfo WHERE ID = '{$ID}'";
$res1 = execute($conn,$sql1);
$res1 = mysqli_fetch_array($res1);
$wechatID = $res1['wechatID'];
?>
<body>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- new arrive -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php" ><i class="las la-home">返回主页</i></a>
            <a href="#" class="active">Ta的闲置</a>
        </div>
    </div>
    <section class="new_arrive section_padding_b">
        <div class="container">
        <p id="wangzhi"><?php echo htmlspecialchars($wechatID);?></p>
        <div style="align-items: center; display: flex; margin-bottom:15px;">
            <button class="default_btn small rounded second border-none list_product_btn la la-copy" id="copy" style="margin-left:auto;margin-right:auto;">复制TA的微信号</button>
        </div>
        <h2 class="section_title_2"><?php echo htmlspecialchars($res1['nickname']);?>的闲置</h2>
            <div class="row gy-4">   
            <?php 
                for($i=0;$i<$count;$i++){
                $push = mysqli_fetch_array($res);
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