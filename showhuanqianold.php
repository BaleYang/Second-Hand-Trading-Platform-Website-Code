<!DOCTYPE html>
<html lang="en">
    
<?php 
include 'head.php';

?>

<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="assets/css/huanqian.css">

    <!-- 以下写内容 -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">主页</i></a>
            <a href="#"  class="active"></a>
        </div>
    </div>
    <!-- product view -->
    <form action="showhuanqian.php" method="get">
    <div class="search_warpper">
            <div class="search d-flex">
                                <div class="search_input">
                                    <input type="text" placeholder="请输入关键字" id="show_suggest" name='search' value=''>
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
        <div class="container">
            <div class="d-flex align-items-start justify-content-between">
                    <h2 class="section_title_2">换日元</h2>
                    <form>
                    <select name="subdivisions" class="subdivisions_select">
                    <option value="Subdivisions"selected="selected">-请选择分区-</option>
                    <option value="cn_to_jp">用人民币换日元</option>
                    <option value="jp_to_cn">用日元换人民币</option>
                    </select>
                    </form>
            </div>
            <div class="row single_list_product" >

                        <div class="col-xl-8 col-lg-10">
                            
                            <div class="shop_products border_heavy_top">
                                <div class="list_view_products">

                            

                                    <div class=" border_bottom">
                                        <div class="row">
                                            
                                            <div class="col-md-9">
                                                <div class="product_content">
                                                    <div class="title">
                                                    <div class="title_singlewarpper"><p class="huanqian_position"style="font-size:10px;float:left;"></p></div>
                                                    <div class="title_singlewarpper"><p class="huanqian_position"style="font-size:10px;float:left;">换钱地点：</p><p class=" "style="font-size:15px;"></p></div>
                                                    <div class="title_singlewarpper"><p style="font-size:10px;float:left;">金额：</p><p class=" org_price" style="font-size:18px;">￥</div>
                                                    <div class="title_singlewarpper"><p style="font-size:10px;float:left;">补充说明：</p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prorder_btn">
                                                <button type="submit">查看</button>
                                            </div>
                                        </div>
                                    </div>

                                <!--
                                    <div class=" border_bottom">
                                        <div class="row">
                                            
                                            <div class="col-md-9">
                                                <div class="product_content">
                                                    <a href="product-view.html">
                                                    <div class="user">
                                                        <div class="user-name">易燃物</div><p class="org_price"style = "font-size:10px;margin-left:8px;    float: left;">用日元换人民币</p><p class="pushtime"style="font-size:10px;">2002/11/05 11:13</p>
                                                    </div>
                                                    
                                                    <div class="title">

                                                    <p class="huanqian_position"style="font-size:10px;float:left;">换钱地点：</p><p class="huanqian_position_real org_price "style="font-size:15px;">池袋</p>
                                                    <div><p style="font-size:10px;float:left;">金额：</p><p class="huanqian_amount org_price">￥100000</p></div>
                                                        
                                                    </div>
                                                        
                                                    </a>
                                                    <p class="product_list_desc">
                                                        <p style="font-size:10px;float:left;">补充说明：</p>
                                                        啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-2 mid">
                                                       <a href="/ershoureal/answerqs#.php"> <button class="list_product_btn"><span class="icon"><i class="las la-pen"></i></span>联系卖家</button></a>
                                                       <a href="/ershoureal/answerqs#.php"> <button class="list_product_btn"><span class="icon"><i class="las la-pen"></i></span>卖家微信</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" border_bottom">
                                        <div class="row">
                                            
                                            <div class="col-md-9">
                                                <div class="product_content">
                                                    <a href="product-view.html">
                                                    <div class="user">
                                                        <div class="user-name">易燃物</div><p class="org_price"style = "font-size:10px;margin-left:8px;    float: left;">用日元换人民币</p><p class="pushtime"style="font-size:10px;">2002/11/05 11:13</p>
                                                    </div>
                                                    
                                                    <div class="title">

                                                    <p class="huanqian_position"style="font-size:10px;float:left;">换钱地点：</p><p class="huanqian_position_real org_price "style="font-size:15px;">池袋</p>
                                                    <div><p style="font-size:10px;float:left;">金额：</p><p class="huanqian_amount org_price">￥100000</p></div>
                                                        
                                                    </div>
                                                        
                                                    </a>
                                                    <p class="product_list_desc">
                                                        <p style="font-size:10px;float:left;">补充说明：</p>
                                                        啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-2 mid">
                                                       <a href="/ershoureal/answerqs#.php"> <button class="list_product_btn"><span class="icon"><i class="las la-pen"></i></span>联系卖家</button></a>
                                                       <a href="/ershoureal/answerqs#.php"> <button class="list_product_btn"><span class="icon"><i class="las la-pen"></i></span>卖家微信</button></a>
                                            </div>
                                        </div>
                                    </div>
                                -->
                                </div>
                            </div>
                            <div class="pagination_wrp d-flex align-items-center justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->
    <?php include 'alljs.php';?>
</body>


</html>

