<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
include 'connectdb.php';
include_once 'mysql.inc.php';
include_once 'page.inc.php';
$search = mysqli_real_escape_string($conn, $_GET['search']);
$type = isset($_GET['type']) ? $_GET['type'] : '0';
if($type=='0') $sql = isset($_GET['search']) ? "SELECT * from needtable WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' ORDER BY NID DESC " : "SELECT * from needtable ORDER BY NID DESC";
else $sql = "SELECT * from needtable WHERE type LIKE '%{$type}%' ORDER BY NID DESC ";
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
            <a href="#" class="active">卖闲置</a>
        </div>
    </div>
    <form action="showqiuxianzhi.php" method="get">
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
                <h4 style="max-width:50%; float:left;">卖闲置</h4>
                <select name="subdivisions" class="subdivisions_select" onchange='window.location=this.value'>
                <option value="showqiuxianzhi.php" <?php if($type==='0') echo "selected='selected'";?>><?php if($type==0) echo "-点我选择物品分区-"; else echo '所有';?></option>
                <option value="showqiuxianzhi.php?type=1" <?php if($type==1) echo "selected='selected'";?>>电子产品</option>
                <option value="showqiuxianzhi.php?type=2" <?php if($type==2) echo "selected='selected'";?>>服饰装扮</option>
                <option value="showqiuxianzhi.php?type=3" <?php if($type==3) echo "selected='selected'";?>>书籍资料</option>
                <option value="showqiuxianzhi.php?type=4" <?php if($type==4) echo "selected='selected'";?>>家具家电</option>
                <option value="showqiuxianzhi.php?type=5" <?php if($type==5) echo "selected='selected'";?>>生活用品</option>
                <option value="showqiuxianzhi.php?type=6" <?php if($type==6) echo "selected='selected'";?>>实用工具</option>
                <option value="showqiuxianzhi.php?type=7" <?php if($type==7) echo "selected='selected'";?>>游戏相关</option>
                <option value="showqiuxianzhi.php?type=8" <?php if($type==8) echo "selected='selected'";?>>娱乐相关</option>
                <option value="showqiuxianzhi.php?type=9" <?php if($type==9) echo "selected='selected'";?>>生活相关</option>
                <option value="showqiuxianzhi.php?type=a" <?php if($type==='a') echo "selected='selected'";?>>学习相关</option>
                </select>
                <div class="prof_recent_order shadow_sm">
                    <?php for($i=0;$i<15;$i++){
                        $need = mysqli_fetch_array($res1);
                        if(!isset($need)) break;
                        ?>
                    <div class="acorder_wrapper">
                        <div class="single_prof_recorder mt-0 mb-4 shadow_sm">
                                <div class="prorder_txt prorder_odnumber">
                                    <h5><?php echo $need['title'];?></h5>
                                    <p><?php 
                                        if($need['nickname']!=='未登录用户' && $need['anonymous']==0){
                                            echo $need['time'].'　　'.$need['nickname'];
                                        }
                                        elseif($need['nickname']==='未登录用户') echo $need['time'].'　　'.'未登录用户';
                                        else echo $need['time'].'　　'.'匿名用户';
                                        ?></p>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h6><?php 
                                        if(strlen($need['content'])<=1000) echo htmlspecialchars($need['content']);
                                        else echo htmlspecialchars(mb_substr($need['content'],0,1000,"utf-8").'......');
                                        ?></h6>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                <?php echo "<h6><span style='font-size:15px;'>理想金额：</span><span style='color: #fd3d57;'>￥".htmlspecialchars($need['price']);?></span></h6>
                                </div>
                                <div class="prorder_btn">
                                <form action="userpage.php" method="post">
                                    <input type="hidden" name='seller' value ='<?php echo $need['ID'];?>'>
                                    <input type="hidden" name='title' value ='<?php echo $need['title'];?>'>
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



