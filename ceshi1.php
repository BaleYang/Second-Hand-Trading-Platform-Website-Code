<!DOCTYPE html>
<html lang="en">

<?php 

include 'head.php'; 

?>

<body>
    <!-- header的html -->
    <?php include 'header.php'; ?>


    <!-- 以下写内容 -->
    
    <!-- breadcrumbs -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home"></i>返回首页</a>
            <a href="#" class="active">我的主页</a>
        </div>
    </div>

    <!-- account -->
    <div class="my_account_wrap section_padding_b">   
        <div class="container">
            <div class="row">
                <!--  account sidebar  -->
                <?php include 'header_account.php';?>
                <!-- account content -->
                <div class="col-lg-12">
                    <div class="account_cont_wrap">
                        <div class="profile_info_wrap">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_prof_info shadow_sm">
                                        <div class="prof_info_title">
                                            <h4>个人信息</h4>
                                            <label for="user-info-change-input" class="position-relative user_info_change">开/关编辑</label>
                                            
                                        </div>
                                        <input type="checkbox" id="user-info-change-input">
                                        <div class="prfo_info_cont">
                                            <p class="text-semibold">用户名: <?php echo $res['nickname']; ?></p>
                                            <p class="text-semibold">微信号: <?php echo $res['wechatID']; ?></p>
                                            <p class="text-semibold">邮箱: <?php echo $res['email']; ?></p>
                                        </div>
                                        <div class="info_change_warpper">
                                            <form action="editinfo.php" method='post'>
                                                <p class="text-semibold">用户名</p>
                                                <input type="text" value="<?php echo $res['nickname'];?>" name='nickname'>
                                                <p class="text-semibold">微信号</p>
                                                <input type="text" value="<?php echo isset($res['wechatID'])?$res['wechatID']:'';?>" name='wechatID'>
                                                <button type="submit"style="margin-top:15px;" class="default_btn xs_btn rounded px-4">更改信息</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="single_prof_info shadow_sm row">
                                        <div class="prof_info_title">
                                            <h4>我的发布</h4>
                                        </div>
                                        <div class="prfo_info_cont col-lg-6">
                                            <p class="text-semibold font-black"><a href="showmypush.php">展示我的发布</a></p>
                                        </div>
                                        <div class="prfo_info_cont col-lg-6 ">
                                        <p id="wangzhi">网址写在这里</p>
                                         <button class="default_btn small rounded second border-none list_product_btn la la-copy float_r" id="copy" style="margin-left:auto;margin-right:auto;">复制网址</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_prof_info shadow_sm">
                                        <div class="prof_info_title">
                                            <h4>管理我的发布</h4>
                                        </div>
                                        <div class="prfo_info_cont">
                                            <p class="text-semibold font-black"><a href="mypush.php">管理我的闲置</a></p>
                                            <p class="text-semibold font-black"><a href="myqs.php">管理我的问题</a></p>
                                            <!--
                                            <p class="text-semibold font-black"><a href="myhuanqian.php">管理我的换钱</a></p>-->
                                            <p class="text-semibold font-black"><a href="myneed.php">管理我的求闲置</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="single_prof_info shadow_sm">
                                        <div class="prof_info_title">
                                            <h4>我的收藏</h4>
                                        </div>
                                        <div class="prfo_info_cont">
                                            <p class="text-semibold font-black"><a href="mymarkedpush.php">收藏的闲置</a></p>
                                            <p class="text-semibold font-black"><a href="mymarkedqs.php">收藏的问题</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="prof_recent_order shadow_sm">
                            <h4>我的收藏</h4>
                            <div class="single_prof_recorder">
                                <div class="prorder_btn">
                                    <a href="account-order-details.html">跳转</a>
                                </div>
                                <div class="prorder_txt prorder_odnumber">
                                    <h5>标题</h5>
                                    <p>运动....1111111111111111111111111111111111111111</p>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h5>发布日期</h5>
                                    <p>2002</p>
                                </div>

                                <div class="prorder_txt prorder_total">
                                    <h5>价格</h5>
                                    <p>￥3000</p>
                                </div>

                            </div>
                            <div class="single_prof_recorder">
                                <div class="prorder_img">
                                    <img loading="lazy"  src="assets/images/laptop-1.png" alt="product">
                                    <img loading="lazy"  src="assets/images/laptop-1.png" alt="product">
                                    <img loading="lazy"  src="assets/images/laptop-1.png" alt="product">
                                </div>
                                <div class="prorder_btn">
                                    <a href="account-order-details.html">View Order</a>
                                </div>
                                <div class="prorder_txt prorder_odnumber">
                                    <h5>Order Number</h5>
                                    <p>23E34RT3</p>
                                </div>
                                <div class="prorder_txt prorder_purchased">
                                    <h5>Purchased</h5>
                                    <p>01 March 2021</p>
                                </div>
                                <div class="prorder_txt prorder_qnty d-none d-sm-block">
                                    <h5>Quantity</h5>
                                    <p>x3</p>
                                </div>
                                <div class="prorder_txt prorder_total">
                                    <h5>Total</h5>
                                    <p>$120</p>
                                </div>
                                <div class="prorder_txt prorder_status">
                                    <h5 class="d-none d-md-block">Status</h5>
                                    <h5 class="d-block d-md-none"><span class="me-2 d-inline-block d-sm-none font-normal text_xs">x3</span> $120</h5>
                                    <p class="text-green">Delivered</p>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->
    <?php include 'alljs.php';?>
    <?php include 'info.php';?>
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
