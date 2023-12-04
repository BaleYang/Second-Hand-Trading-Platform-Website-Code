<?php session_start();?>
<!-- Preloader -->
<div class="preloader">
        <img src="assets/images/preloader.gif" alt="preloader">
    </div>
    <!-- top header -->

    <!-- navbar -->
    <nav class="home-2">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.php" class="mobile_logo d-block d-lg-none">
                    <img loading="lazy"  src="assets/images/svg/svg.svg" alt="logo">
                </a>
                <a href="help.php" class=" d-block d-lg-none" style="color:black;text-decoration:underline;">
                    使用指南&免责声明
                </a>
                
                
                <!-- <div class="header_icon d-flex align-items-center">
                    <a href="wish-list.html" class="icon_wrp text-center wishlist ms-0">
                        <span class="icon">
                            <i class="icon-heart"></i>
                        </span>
                        <span class="icon_text">Wish List</span>
                        <span class="pops">6</span>
                    </a>        
                </div> -->
            </div>
        </div>
    </nav>

    <!-- mobile bottom bar -->
    <div class="mobile_bottombar d-block d-lg-none">
        <div class="header_icon">
            <a href="javascript:void(0)" class="icon_wrp text-center open_menu">
                <span class="icon">
                    <i class="las la-bars"></i>
                </span>
                <span class="icon_text">菜单</span>
            </a>
            <a href="javascript:void(0)" class="icon_wrp text-center open_category">
                <span class="icon">
                    <i class="las la-gift"></i>
                </span>
                <span class="icon_text">发布</span>
            </a>
            <!-- <a href="javascript:void(0)" class="icon_wrp text-center" id="src_icon">
                <span class="icon">
                   <i class="icon-search-left"></i>
                </span>
                <span class="icon_text">搜索</span>
            </a> -->

            
            <label for="user_account_input" class="position-relative myacwrap">
                <input type="checkbox" id="user_account_input">
                <div href="javascript:void(0)" class="icon_wrp text-center myacc">
                    <span class="icon">
                       <i class="icon-user-line"></i>
                    </span>
                    <span class="icon_text">账号</span>
                </div>
                
                <div class="myacc_cont">
                    
                    <div class="ac_join">
                        <div class="account_btn d-flex justify-content-between">
                            <?php if(!isset($_SESSION['ID'])){
                            echo '<a href="login.php" class="default_btn">登录</a>';
                            echo '<a href="register.php" class="default_btn second">注册</a>';
                            }
                            else{
                                echo '<a href="#" class="default_btn second">已登录</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="ac_links">
                          <a href="account.php" class="myac">
                            <i class="lar la-id-card"></i>
                            我的账户
                        </a>

                        <a href="login_out.php">
                            <i class="las la-power-off"></i>
                            退出
                        </a>
                    </div>
                </div>

            </label> 
        </div>
    </div>

    <!-- mobile menu -->
    <div class="mobile_menwrap d-lg-none" id="mobile_menwrap">
        <div class="mobile_menu_2">
            <h5 class="mobile_title">
                菜单
                <span class="sidebarclose" id="menuclose">
                    <i class="las la-times"></i>
                </span>
            </h5>
            <ul>
                    <!--<li class="withsub">-->
                        
                        <a href="index.php" class="singlecats">
                            <span class="img_wrp"><i class="las la-shopping-bag"></i></span>
                            <span class="txt"> 购闲置</span>
                        </a>
                        <a href="forfree.php">
                        <span class="img_wrp"><i class="las la-shopping-basket"></i></span>
                        <span class="txt">零元购</span>
                        </a>
                        <!--
                        <div class="submn">
                            <a href="index.php">所有</a>
                            <a href="#">手机平板笔记本</a>
                            <a href="#">家具家电</a>
                            <a href="#">书，复习资料</a>
                            <a href="#">家具</a>
                            <a href="#">其他（大件）</a>
                            <a href="#">其他（小件）</a>
                        </div>
                    </li>
                    -->
                    <a href="showqiuxianzhi.php">
                    <span class="img_wrp"><i class="las la-hands-helping"></i></span>
                    <span class="txt"> 别人的愿望单</span>
                    </a>
                    <a href="showqs.php">
                    <span class="img_wrp"><i class="las la-pen"></i></span>
                    <span class="txt">回答问题</span>
                    </a>

            </ul>
        </div>
    </div>

    <div class="mobile_menwrap d-lg-none" id="mobile_catwrap">
        <div class="sub_categories">
            <h5 class="mobile_title">
                发布
                <span class="sidebarclose" id="catclose">
                    <i class="las la-times"></i>
                </span>
            </h5>

            <a href="push.php" class="singlecats">
                <span class="img_wrp">
                <i class="las la-folder-plus"></i>
                </span>
                <span class="txt">发布新闲置</span>
            </a>
            <a href="want.php" class="singlecats">
                <span class="img_wrp">
                    <i class="las la-handshake"></i>
                </span>
                <span class="txt">求闲置</span>
            </a>      
            <a href="askqs.php" class="singlecats">
                <span class="img_wrp">
                    <i class="las la-question"></i>
                </span>
                <span class="txt">提问题</span>
            </a>                   

        </div>
    </div>

    <!-- mobile searchbar -->
    <div class="mobile_search_bar">
        <div class="mobile_search_text">
            <p>搜索</p>
            <span class="close_mbsearch" id="close_mbsearch">
                <i class="las la-times"></i>
            </span>
        </div>
        <form>
            <input type="text" placeholder="输入关键字...">
            <button>
               <i class="icon-search-left"></i>
            </button>
        </form>


    </div>