<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
include 'connectdb.php';
include_once 'mysql.inc.php';
include_once 'page.inc.php';
$coin = isset($_GET['coin']) ? $_GET['coin'] : '';
if($coin != 2) $coin = 1;
if($coin == 1) $type = 2;
else $type = 1;
$search = mysqli_real_escape_string($conn, $_GET['search']);
$sql = isset($_GET['search']) ? "SELECT * from moneytable WHERE place LIKE '%{$search}%' AND type = {$type} ORDER BY MID DESC " : "SELECT * from moneytable WHERE type = {$type} ORDER BY MID DESC";
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
            <a href="#" class="active">换钱</a>
        </div>
    </div>
    <form action="showhuanqian.php" method="get">
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
                <h4><?php if($coin==1) echo '用人民币换日元';else echo '用日元换人民币'; ?></h4>
                <div class="prof_recent_order shadow_sm">
                    <?php for($i=0;$i<15;$i++){
                        $money = mysqli_fetch_array($res1);
                        $place = $money['place'];
                        if(!isset($money)) break;
                        ?>
                    <div class="acorder_wrapper">
                        <div class="single_prof_recorder mt-0 mb-4 shadow_sm">
                                <div class="prorder_txt prorder_odnumber">
                                    <h6><span style="font-size:15px;"><?php echo htmlspecialchars($money['nickname'].'　');?></span><?php if($coin==1) echo '在出日元';else echo '在出人民币'; ?></h6>
                                <div class="prorder_txt prorder_odnumber">
                                    <h6><span style="font-size:15px;">换钱地点：</span><?php echo htmlspecialchars($place);?></h6>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h6><span style="font-size:15px;">金额：</span><span style="color: #fd3d57;">￥<?php echo htmlspecialchars($money['price']);?></span></h6>
                                </div>
                                <div class="prorder_txt prorder_odnumber">
                                    <h6><span style="font-size:15px;">补充说明：</span><?php echo htmlspecialchars($money['method']);?></h6>
                                </div>
                                <div class="prorder_btn">
                                <form action="userpage.php" method="post">
                                    <input type="hidden" name='place' value ='<?php echo htmlspecialchars($place);?>'>
                                    <input type="hidden" name='seller' value ='<?php echo $money['ID'];?>'>
                                    <button type="submit">联系TA</button>
                                </form>
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



