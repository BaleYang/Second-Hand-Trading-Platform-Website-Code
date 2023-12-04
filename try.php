<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
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
include_once 'page.inc.php';
$sql = isset($_GET['search']) ? "SELECT * from questiontable WHERE title LIKE '%{$_GET['search']}%' OR content LIKE '%{$_GET['search']}%' ORDER BY QID DESC " : 'SELECT * from questiontable ORDER BY QID DESC';
$res = execute($conn,$sql);
$count = mysqli_num_rows($res);
$data = page($count, 15, 7);
$query = $sql.' '.$data['limit'];
$res1 = execute($conn,$query);

?>
<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- new arrive -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="#"><i class="las la-home">主页</i></a>
        </div>
    </div>
    <form action="index.php" method="get">
    <div class="search_warpper">
            <div class="search d-flex">
                                <div class="search_input">
                                    <input type="text" placeholder="请输入关键字" id="show_suggest" name='search' value='<?php echo isset($_GET['search'])? htmlspecialchars($_GET['search']) : '' ?>'>
                                </div>
                                <div class="search_subimt">
                                    <button type='submit'>
                                        <span class="d-none d-sm-inline-block">
                                            <span class="icon">
                                            <i class="icon-search-left"></i>搜索
                                            </span>
                                        </span>
                                        <span class="d-sm-none d-inline-block"><i class="icon-search-left"></i></span>
                                    </button>
                                </div>
            </div>
        </div>
        </form>

    <!-- account -->
    <div class="my_account_wrap section_padding_b">   
        <div class="container">
            <div class="row">
                <!-- account content -->
                <div class="col-lg-9">
                <h4>提问题</h4>
                <div class="prof_recent_order shadow_sm">
                    <?php for($i=0;$i<15;$i++){
                        $qs = mysqli_fetch_array($res1);
                        if(!isset($qs)) break;
                        ?>
                    <div class="acorder_wrapper">
                        <div class="single_prof_recorder mt-0 mb-4 shadow_sm">
                                <div class="prorder_txt prorder_odnumber">
                                    <h5><?php echo $qs['title'];?></h5>
                                    <p><?php 
                                        if($qs['nickname']!=='未登录' && $qs['anonymous']==0){
                                            echo $qs['time'].'　　'.$qs['nickname'];
                                        }
                                        elseif($qs['nickname']==='未登录') echo $qs['time'].'　　'.'未登录用户';
                                        else echo $qs['time'].'　　'.'匿名用户';
                                        ?></p>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h6><?php 
                                        if(strlen($qs['content'])<=200) echo htmlspecialchars($qs['content']);
                                        else echo htmlspecialchars(mb_substr($qs['content'],0,200,"utf-8").'......');
                                        ?></h6>
                                </div>
                                <div class="prorder_btn">
                                    <a href="answerqs.php?qid=<?php echo $qs['QID'];?>">查看</a>
                                </div>
                        </div>
                    </div>
                    <?php };?>
                    <div class="pagination_wrp d-flex align-items-center justify-content-center">            
                        <?php echo $data['html'];?>
                    </div>
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



