<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<link rel="stylesheet" href="assets/css/new.css">
<body>


    <?php include 'header.php'; ?>
    


    <!-- contact form -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="#">发布</a>
            <a href="#" class="active">问问题</a>
        </div>
    </div>
    <div class="contact_form section_padding_b">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">问问题</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-12">
                            <form action="getqsnext.php" method="post">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 （例：想去xx演唱会有没有一起团票的） <span>*</span></label>
                                    <input type="text" name="title" id="first_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="subdivisions">分区<span>*</span></label>
                                    <div>
                                        <input name="type[]" type="checkbox" value="1" id="subdivisions_checkbox_lable1"/>
                                        <input name="type[]" type="checkbox" value="2" id="subdivisions_checkbox_lable2"/>
                                        <input name="type[]" type="checkbox" value="3" id="subdivisions_checkbox_lable3"/>
                                        <input name="type[]" type="checkbox" value="4" id="subdivisions_checkbox_lable4"/>
                                        <input name="type[]" type="checkbox" value="5" id="subdivisions_checkbox_lable5"/>
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable1">学习相关 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable2">生活相关 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable3">娱乐相关 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable4">工作相关 </label> 
                                        <label class="checkbox col-2" for="subdivisions_checkbox_lable5">办手续 </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                          
                            <div class="col-xl-12 ">
                                <div class="single_billing_inp">
                                    <label for="county_region">内容 </label>
                                    <textarea type="text" name="content" id="county_region"></textarea>
                                </div>
                            </div>

                            
                                <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user"/>
                                    <label class="checkbox  anonymous_user_checkbox" for="anonymous_user">匿名提问</label> 
                                </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="default_btn xs_btn rounded px-4 float_l">发布</button>
                            </div>
                            </form>
                    </div>
                </div>
                <!-- <div class="col-lg-5 col-xl-4 col-12 mt-4 mt-lg-0">
                    <div class="padding_default border-0 shadow_sm">
                        <h4 class="title_4">our store</h4>
                        <div class="footer_contact">
                            <p>
                                <span class="icn"><i class="las la-map-marker-alt"></i></span>
                                7895 Dr New Albuquerue, NM 19800, nited
                                States Of America
                            </p>
                            <p class="phn">
                                <span class="icn"><i class="las la-phone"></i></span>
                                +566 477 256, +566 254 575
                            </p>
                            <p class="eml">
                                <span class="icn"><i class="lar la-envelope"></i></span>
                                info@domain.com
                            </p>
                        </div>

                        <h4 class="title_4 mt-4">Hours of operation</h4>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Saturday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Sunday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Monday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Tuesday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Wednesday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between">
                            <p class="">Thursday</p>
                            <p class="">12:00 PM</p>
                        </div>
                        <div class="cartsum_text d-flex justify-content-between mb-0">
                            <p class=" mb-0">Friday</p>
                            <p class=" mb-0">12:00 PM</p>
                        </div>

                        <h4 class="title_4 mt-4">Careers</h4>
                        <p class="text_md mb-0">If you are interesting in emplyment opportunities at RAFCARTs. Please
                            email us : <a href="#" class="text-color">contact@familiar.com</a>
                        </p>
                       
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>


    <!-- all js -->
    <?php include 'alljs.php';?>
</body>

</html>