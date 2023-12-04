<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;}
include 'head.php'; 
$ID = $_SESSION['ID'];
$servername = 'localhost';
$username = 'bale2002_0309';
$password = 'axiulan14';

// 创建连接
$conn = mysqli_connect($servername, $username, $password, 'bale2002_question', 3306);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
include_once 'mysql.inc.php';
$sql = "SELECT QID,title,time from questiontable WHERE ID = {$ID} ORDER BY QID DESC";
$res = execute($conn,$sql);
$count = mysqli_num_rows($res);
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
            <a href="#" class="active">我的问题</a>
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
                    <h4>我的问题</h4>
                    <?php for($i=0;$i<$count;$i++){
                    $myqs = mysqli_fetch_array($res);
                    if(!isset($myqs)) break;
                    ?>
                    <div class="acorder_wrapper">
                        <div class="single_prof_recorder mt-0 mb-4 shadow_sm">
                                <div class="prorder_txt prorder_odnumber">
                                    <h5>标题</h5>
                                    <p><?php echo htmlspecialchars($myqs['title']);?></p>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h5>发布日期</h5>
                                    <p><?php echo $myqs['time'];?></p>
                                </div>
                                <div class="prorder_btn">
                                    <a href="reaskqs.php?QID=<?php echo $myqs['QID'];?>">编辑</a>
                                    <a href="delete.php?method=2&&QID=<?php echo $myqs['QID'];?>" onclick="javascript:return del()">删除</a>
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
    <?php include 'info.php';?>
</body>

</html>