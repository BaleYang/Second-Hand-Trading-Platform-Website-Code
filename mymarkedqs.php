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
$sql = "SELECT mQID from userinfo WHERE ID = {$ID}";
$QID = mysqli_fetch_array(execute($conn,$sql))['mQID'];
$QIDarray = explode('|',$QID);
$count = count($QIDarray);
close($conn);
$servername = 'localhost';
$username = 'bale2002_0309';
$password = 'axiulan14';
$conn = mysqli_connect($servername, $username, $password, 'bale2002_question', 3306);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<body>
    <!-- header的html -->
    <?php //include 'header.php'; ?>
    <link rel="stylesheet" href="assets/css/mypush.css">

    <!-- 以下写内容 -->
    
    <!-- breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="account.php">返回我的主页</a>
            <a href="#" class="active">我的收藏</a>
        </div>
    </div>

    <!-- account -->
    <div class="my_account_wrap section_padding_b">   
        <div class="container">
            <div class="row">
                <!--  account sidebar  -->
                <?php include 'header_account.php';?>
                <!-- account content -->
                <div class="col-lg-9">
                <div class="prof_recent_order shadow_sm">
                    <h4>我收藏的问题</h4>
                    <?php for($i=$count-2;$i>=1;$i--){
                        $QID = $QIDarray[$i];
                        $sql = "SELECT title,time from questiontable WHERE QID = {$QID}";
                        $markedqs = mysqli_fetch_array(execute($conn,$sql));
                        if(!isset($markedqs)) continue;
                    ?>
                    <div class="acorder_wrapper">
                        <div class="single_prof_recorder mt-0 mb-4 shadow_sm">
                                <div class="prorder_txt prorder_odnumber">
                                    <h5>标题</h5>
                                    <p><?php echo htmlspecialchars($markedqs['title']);?></p>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h5>发布日期</h5>
                                    <p><?php echo $markedqs['time'];?></p>
                                </div>
                                <div class="prorder_btn">
                                    <a href="answerqs.php?qid=<?php echo $QID;?>">跳转</a>
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
    <?php include 'info.php';?>
</body>

</html>



