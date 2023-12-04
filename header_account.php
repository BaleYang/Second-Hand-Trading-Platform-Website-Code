<div class="col-lg-3">
<div class="account_sidebar">
    <div class="account_profile position-relative shadow_sm">
        <div class="acprof_img">
                <img loading="lazy"  src="assets/images/svg/logo.ico" alt="user">
        </div>
        <div class="acprof_cont">
            <p>欢迎回来,</p>
            <h4><?php echo htmlspecialchars($_SESSION['nickname']); ?></h4>
        </div>
        <div class="profile_hambarg d-lg-none d-block">
            <i class="las la-bars"></i>
        </div>
    </div>
    <div class="acprof_wrap shadow_sm">
        <div class="acprof_links">
            <a href="push.php">
                <h4 class="acprof_link_title">
                   <i class="las la-gift"></i>
                    发布闲置
                </h4>
            </a>
        </div>
        <div class="acprof_links">
            <a href="newpassword.php">
                <h4 class="acprof_link_title">
                   <i class="las la-gift"></i>
                    更改密码
                </h4>
            </a>
        </div>
        <div class="acprof_links border-0">
            <a href="login_out.php">
                <h4 class="acprof_link_title">
                     <i class="las la-power-off"></i>
                    退出登录
                </h4>
            </a>
        </div>
    </div>
</div>
</div>