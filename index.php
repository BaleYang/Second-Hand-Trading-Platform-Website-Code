<!DOCTYPE html>
<html lang="en">

<?php 
include 'head.php';
include_once 'connectdb.php';
include_once 'mysql.inc.php';
include_once 'page.inc.php';
include 'showimg.php';
include 'limstr.php';
$type = isset($_GET['type']) ? $_GET['type'] : '0';
$search = mysqli_real_escape_string($conn, $_GET['search']);
if($type=='0') $sql = isset($_GET['search']) ? "SELECT * from pushtable WHERE title LIKE '%{$search}%' OR content LIKE '%{$search}%' OR method LIKE '%{$search}%' ORDER BY PID DESC " : 'SELECT * from pushtable ORDER BY PID DESC';
else $sql = "SELECT * from pushtable WHERE type LIKE '%{$type}%' ORDER BY PID DESC ";
$res = execute($conn,$sql);
$count = mysqli_num_rows($res);
$data = page($count, 30, 7);
$query = $sql.' '.$data['limit'];
$res1 = execute($conn,$query);
?>
<body>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- new arrive -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="#" ><i class="las la-home">主页</i></a>
            <a href="#" class="active">购闲置</a>
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
    <section class="new_arrive section_padding_b">
        <div class="container">
            <div class="d-flex align-items-start justify-content-between">
                <h2 class="section_title_2">购闲置</h2>
                <form>
                <select name="subdivisions" class="subdivisions_select" onchange='window.location=this.value'>
                <option value="index.php" <?php if($type==='0') echo "selected='selected'";?>><?php if($type==0) echo "-点我选择物品分区-"; else echo '所有';?></option>
                <option value="index.php?type=1" <?php if($type==1) echo "selected='selected'";?>>电子产品</option>
                <option value="index.php?type=2" <?php if($type==2) echo "selected='selected'";?>>服饰装扮</option>
                <option value="index.php?type=3" <?php if($type==3) echo "selected='selected'";?>>书籍资料</option>
                <option value="index.php?type=4" <?php if($type==4) echo "selected='selected'";?>>家具家电</option>
                <option value="index.php?type=5" <?php if($type==5) echo "selected='selected'";?>>生活用品</option>
                <option value="index.php?type=6" <?php if($type==6) echo "selected='selected'";?>>实用工具</option>
                <option value="index.php?type=7" <?php if($type==7) echo "selected='selected'";?>>游戏相关</option>
                <option value="index.php?type=8" <?php if($type==8) echo "selected='selected'";?>>生活相关</option>
                <option value="index.php?type=9" <?php if($type==9) echo "selected='selected'";?>>娱乐相关</option>
                <option value="index.php?type=a" <?php if($type==='a') echo "selected='selected'";?>>学习相关</option>
                </select>
                </form>

            </div>

            <div class="row gy-4">   
            <?php 
                for($i=0;$i<30;$i++){
                $push = mysqli_fetch_array($res1);
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
                <!--  
                <div class="col-lg-3 col-sm-6">
                    <div class="single_new_arrive">
                        <div class="sna_img">
                            <img loading="lazy"  class="prd_img" src="assets/images/lsq.jpeg" alt="product">
                            <div class="prodcut_hovcont">
                                <a href="javascript:void(0)" class="icon open_quickview" tabindex="0">
                                   <i class="icon-search-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="sna_content">
                            <a href="product-view.html">
                                <h4>SAMSUNG 27" Class Curved</h4>
                            </a>
                            <div class="ratprice">
                                <div class="price">
                                    <span class="org_price">$45.00</span>
                                </div>
                            </div>
                            <div class="product_adcart">
                                <button class="default_btn">查看详情</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_new_arrive">
                        <div class="sna_img">
                            <img loading="lazy"  class="prd_img" src="assets/images/IMG_2602.PNG" alt="product">
                            <div class="prodcut_hovcont">
                                <a href="javascript:void(0)" class="icon open_quickview" tabindex="0">
                                   <i class="icon-search-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="sna_content">
                            <a href="product-view.html">
                                <h4>COWIN E7 Active</h4>
                            </a>
                            <div class="ratprice">
                                <div class="price">
                                    <span class="org_price">$45.00</span>
                                    <span class="prev_price">$55.45</span>
                                </div>
                                <div class="rating">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rating_star">
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                        </div>
                                        <p class="rating_count">(150)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product_adcart">
                                <button class="default_btn">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_new_arrive">
                        <div class="sna_img">
                            <img loading="lazy"  class="prd_img" src="assets/images/phone-1.png" alt="product">
                            <div class="prodcut_hovcont">
                                <a href="javascript:void(0)" class="icon open_quickview" tabindex="0">
                                   <i class="icon-search-left"></i>
                                </a>
                                <a href="#" class="icon" tabindex="0">
                                    <i class="icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="sna_content">
                            <a href="product-view.html">
                                <h4>Xiaomi Note 7 Pro</h4>
                            </a>
                            <div class="ratprice">
                                <div class="price">
                                    <span class="org_price">$45.00</span>
                                    <span class="prev_price">$55.45</span>
                                </div>
                                <div class="rating">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rating_star">
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                            <span><i class="las la-star"></i></span>
                                        </div>
                                        <p class="rating_count">(150)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product_adcart">
                                <button class="default_btn">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
        <div class="pagination_wrp d-flex align-items-center justify-content-center">            
        <?php echo $data['html'];?>
    </div>
    </section>

    <?php include 'footer.php'; ?>

    <!-- all js -->
    <?php include 'alljs.php';?>
    <?php include 'info.php';?>
</body>

</html>