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
$type = isset($_GET['type']) ? $_GET['type'] : '0';
$search = mysqli_real_escape_string($conn, $_GET['search']);
if($type=='0') $sql = isset($_GET['search']) ? "SELECT * from questiontable WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY QID DESC " : 'SELECT * from questiontable ORDER BY QID DESC';
else $sql = "SELECT * from questiontable WHERE type LIKE '%{$type}%' ORDER BY QID DESC ";
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
            <a href="index.php"><i class="las la-home">主页</i></a>
            <a href="#" class="active">回答问题</a>
        </div>
    </div>
    <form action="showqs.php" method="get">
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
                <h4 style="max-width:50%; float:left;">回答问题</h4>
                <select name="subdivisions" class="subdivisions_select" onchange='window.location=this.value'>
                <option value="showqs.php" <?php if($type==='0') echo "selected='selected'";?>><?php if($type==0) echo "-点我选择问题分区-"; else echo '所有';?></option>
                <option value="showqs.php?type=1" <?php if($type==1) echo "selected='selected'";?>>学习相关</option>
                <option value="showqs.php?type=2" <?php if($type==2) echo "selected='selected'";?>>生活相关</option>
                <option value="showqs.php?type=3" <?php if($type==3) echo "selected='selected'";?>>娱乐相关</option>
                <option value="showqs.php?type=4" <?php if($type==4) echo "selected='selected'";?>>工作相关</option>
                <option value="showqs.php?type=5" <?php if($type==5) echo "selected='selected'";?>>办手续</option>
                </select>
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
                                        if($qs['nickname']!=='未登录用户' && $qs['anonymous']==0){
                                            echo $qs['time'].'　　'.$qs['nickname'];
                                        }
                                        elseif($qs['nickname']==='未登录用户') echo $qs['time'].'　　'.'未登录用户';
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



