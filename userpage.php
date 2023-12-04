<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php'; 
include_once 'mysql.inc.php';
//下面是入库，你嫌麻烦可以注释掉
include 'connectdb.php';

if(!isset($_POST['seller'])){
    header('location:index.php');
    exit;
}
$title = isset($_POST['title'])? $_POST['title'] : '';
$place = isset($_POST['place'])? $_POST['place'] : '';
$sellerID = $_POST['seller'];
$sql = "SELECT wechatID from userinfo WHERE ID = {$sellerID}";
$wechatID = mysqli_fetch_array(execute($conn,$sql))['wechatID'];
//到这里
?>

<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>


    <!-- 以下写内容 -->
    
    <!-- breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home"></i>返回首页</a>
            <a href="#" class="active">联系方式</a>
        </div>
    </div>

    <!-- account -->
    <div class="my_account_wrap section_padding_b">   
        <div class="container">
            <div class="row">
                <!--  account sidebar  -->

                <!-- account content -->
                <div class="col-lg-12">
                    <div class="account_cont_wrap">
                        <div class="profile_info_wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                <?php if(!empty($title)){?>
                                    <h4><?php echo '标题：'.htmlspecialchars($title)?></h4>
                                <?php }?>
                                <?php if(!empty($place)){?>
                                    <h4><?php echo '换钱地点：'.htmlspecialchars($place)?></h4>
                                <?php }?>
                                    <div class="single_prof_info shadow_sm">
                                            <p id="weixinhao"><?php echo htmlspecialchars($wechatID);?></p>
                                            <div style="align-items: center; display: flex; margin-bottom:15px;">
                                            <!-- 当你改完后，记住p标签里把这个idweixinhao挂上，不然不行，另外如果你不想把微信号显示出来我可以把透明度调成0，明面上让人看不见（不过f12想找肯定能找到） -->
                                            <button class="default_btn small rounded second border-none list_product_btn la la-copy" id="copy" style="margin-left:auto;margin-right:auto;">复制TA的微信号</button>
                                            </div>
                                        <div class="prfo_info_cont">
                                            <div class="user_erweima_warpper">
                                                <img src="assets/images/warning.png" alt="user_erweima">
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
