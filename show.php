<!DOCTYPE html>
<html lang="en">
    
<?php 
session_start();
include 'head.php'; 
include 'showimg.php';
include_once 'connectdb.php';
include_once 'mysql.inc.php';
include_once 'page.inc.php';
$PID = isset($_GET['PID']) ? $_GET['PID'] : '';
if(empty($PID)) header('location:index.php');
if(!is_numeric($PID)) header('location:index.php');
$sql = "SELECT * from pushtable WHERE PID = {$PID}";
$res = execute($conn,$sql);
$push = mysqli_fetch_array($res);
if(isset($_SESSION['ID'])){
    $ID = $_SESSION['ID'];
    $sql = "SELECT mPID from userinfo WHERE ID = {$ID}";
    $res = execute($conn,$sql);
    $mPID = mysqli_fetch_array($res)['mPID'];
}
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
                    <?php echo showimg($push['ID'], $push['pushtimes'], 2);?>
                </div>
                <div class="col-lg-6">
                    <div class="product_info_wrapper">
                        <div class="product_base_info">
                            <h1><?php echo htmlspecialchars($push['title']);?></h1>
                            
                            <div class="product_other_info">
                                <p><span>发布人:</span><?php echo htmlspecialchars($push['nickname']);?></p>
                                <p><span>发布日期:</span><?php echo $push['time'];?></p>
                                <p><span>交易地点/要求:</span><?php echo htmlspecialchars($push['method']);?></p>
                            </div>
                            <div class="price mt-3 mb-3 d-flex align-items-center">
                                <span class="org_price ms-2">¥<?php echo htmlspecialchars($push['price']);?></span>
                            </div>
                            <div class="pd_dtails">
                                <p><?php echo htmlspecialchars($push['content']);?></p>
                            </div>
                        </div>
                        <div class="product_buttons">
                            <form action="userpage.php" method="post">
                                    <input type="hidden" name='title' value ='<?php echo $push['title'];?>'>
                                    <input type="hidden" name='seller' value ='<?php echo $push['ID'];?>'>
                                    <button href="#" class="default_btn small rounded me-sm-3 me-2 px-4"><i class="icon-cart me-2"></i> 联系卖家</button>
                            <?php 
                            if(isset($_SESSION['ID'])){
                                if(strpos($mPID, '|'.$PID.'|') !== false){
                                    echo "<a class='default_btn small rounded second border-none loved me-sm-3 me-2 px-4' id='loved_btn'><i class='icon-heart me-2'></i> 已收藏</a>";
                                }
                                else{
                                    echo "<a class='default_btn small rounded second border-none me-sm-3 me-2 px-4' id='loved_btn'><i class='icon-heart me-2'></i> 收藏</a>";
                                }
                            };?>
                            <!-- 下面放在和联系卖家button同样的位置（只要别放出这个div就行） -->
                            <p id="wangzhi"><?php echo 'www.ershou-jp.com/show.php?PID='.$PID;?></p>
                            <button class="default_btn small rounded second border-none la la-copy" id="copy" style="margin-left:auto;margin-right:auto;" type='button'>复制网址</button>
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
    <script type="text/javascript">
    document.getElementById('loved_btn').onclick = function(){
        mark();
    }
    function mark(){
      var test = document.getElementById("loved_btn");
      if(test.classList.contains('loved')){
        document.getElementById('loved_btn').innerHTML="<i class='icon-heart me-2'></i>已收藏";
        var ajaxObj = new XMLHttpRequest();
        ajaxObj.open('get', 'markpush.php?mark=1&&PID=<?php echo $PID;?>');
        ajaxObj.send();
      }
      else{
        document.getElementById('loved_btn').innerHTML="<i class='icon-heart me-2'></i>收藏";
        var ajaxObj = new XMLHttpRequest();
        ajaxObj.open('get', 'markpush.php?mark=0&&PID=<?php echo $PID;?>');
        ajaxObj.send();
      }
    }
  </script>

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

