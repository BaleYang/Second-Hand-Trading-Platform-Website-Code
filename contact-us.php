<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>

 
    <!-- contact form -->
    <div class="contact_form section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">意见箱/联系我们</h4>
                        <p class="mb-4 text_md">使用邮箱以便更方便的交流</p>
                        <div class="row">
                        <form action="getcontact.php" method="post">
                            <div class="col-lg-6">
                                <div class="single_billing_inp">
                                    <label for="first_name">姓名/称呼 <span>*</span></label>
                                    <input type="text" id="first_name" name='name' required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="email_addr">邮箱 <span>*</span></label>
                                    <input type="email" id="email_addr" name='email' required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="company_name">公司（可选）</label>
                                    <input type="text" id="company_name" name='company'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="county_region">内容 <span>*</span></label>
                                    <textarea type="text" id="county_region" name='content' required></textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="default_btn xs_btn rounded px-4">发送</button>
                            </div>
                        </form>
                        </div>
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