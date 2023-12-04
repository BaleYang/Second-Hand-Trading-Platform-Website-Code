<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;}
include 'head.php'; 
$ID = $_SESSION['ID'];
include_once 'connectdb.php';
include_once 'mysql.inc.php';
include_once 'urlencode.php';
$sql = "SELECT PID,title,time from pushtable WHERE ID = {$ID} ORDER BY PID DESC";
$res = execute($conn,$sql);
$count = mysqli_num_rows($res);
$encode = authcode($ID,'axiulan');
while(strpos($encode, '+') !== false){
    $encode = authcode($ID,'axiulan');
}
?>
<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="assets/css/mypush.css">

    <!-- 以下写内容 -->
    
    <!-- breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="account.php">返回我的主页</a>
            <a href="#" class="active">我的闲置</a>
        </div>
    </div>

    <!-- account -->
    <div class="my_account_wrap section_padding_b">   
        <div class="container">
            <div class="row">
                <!--  account sidebar  -->
                <?php include 'header_account.php';?>

                <p id="wangzhi"><?php echo 'www.ershou-jp.com/showgoods.php?ID='.$encode;?></p>
                <div style="align-items: center; display: flex; margin-bottom:15px;">
                    <button class="default_btn small rounded second border-none list_product_btn la la-copy" id="copy" style="margin-left:auto;margin-right:auto;">复制我的闲置网址</button>
                </div>
                <!-- account content -->
                <div class="col-lg-9">
                    <div class="prof_recent_order shadow_sm">
                        <h4>我的闲置</h4>
                        <?php for($i=0;$i<$count;$i++){
                        $mypush = mysqli_fetch_array($res);
                        if(!isset($mypush)) break;
                        ?>
                        <div class="acorder_wrapper">
                            <div class="single_prof_recorder mt-0 mb-4 shadow_sm">
                                    <div class="prorder_txt prorder_odnumber">
                                        <h5>标题</h5>
                                        <p><?php echo htmlspecialchars($mypush['title']);?></p>
                                    </div>
                                    <div class="prorder_txt prorder_purchased">
                                        <h5>发布日期</h5>
                                        <p><?php echo $mypush['time'];?></p>
                                    </div>
                                    <div class="prorder_btn">
                                        <a href="repush.php?PID=<?php echo $mypush['PID'];?>">编辑</a>
                                        <a href="delete.php?method=1&&PID=<?php echo $mypush['PID'];?>" onclick="javascript:return del()">删除</a>
                                    </div>
                            </div>
                        </div>
                        <?php };?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <?php include 'alljs.php';?>
    <script LANGUAGE=javascript> 
    function del(){
        var msg = '您真的确定要删除吗？';
        if(confirm(msg) == true){
            return true;
        }else{
            return false;
        }
    }
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
    <?php include 'info.php';?>
</body>

</html>



