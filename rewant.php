<!DOCTYPE html>
<html lang="en">
<?php 
include 'head.php'; 
session_start();
if(!isset($_SESSION['ID'])){
    header('location:login.php');
    exit;
}
if(!isset($_GET['NID'])){
    header('location:myneed.php');
    exit;
}
include 'head.php';
include_once 'connectdb.php';
include_once 'mysql.inc.php';
$ID = $_SESSION['ID'];
$NID = $_GET['NID'];
$sql = "SELECT * from needtable WHERE NID = {$NID} AND ID = {$ID}";
$res = execute($conn,$sql);
$need = mysqli_fetch_array($res);
$type = isset($need['type'])? $need['type'] : '';
?>

<link rel="stylesheet" href="assets/css/new.css">
<body>


    <?php include 'header.php'; ?>
    

    <style>

.jFiler-input-dragDrop{
    margin:50px 0;
}
    </style>

    <!-- contact form -->
    <div class="contact_form section_padding">
    
        <div class="container">
        <div class="col-12 mt-4 ylable_padding">
            <a href="index.php"><button type="submit" class="default_btn xs_btn rounded px-4">返回首页</button></a>
        </div>
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-12">
                    <div class="billing_form padding_default shadow_sm">
                        <h4 class="title_2">求闲置</h4>
                        <p class="mb-4 text_md"></p>
                        <div class="row">
                            <div class="col-12">
                            <form action="regetrequire.php?NID=<?php echo $NID;?>" method="post">
                                <div class="single_billing_inp">
                                    <label for="first_name" >标题 （例：池袋想收二手1080显卡） <span>*</span></label>
                                    <input type="text" name= "title" id="first_name" value = '<?php if(isset($need['title'])) echo $need['title'];?>'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="last_name">理想价格（单位日元） <span>*</span></label>
                                    <input type="text" name= "price" id="last_name" value = '<?php if(isset($need['price'])) echo $need['price'];?>'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="subdivisions">分区<span>*</span></label>

                                        <div>
                                        <input name="type[]" type="checkbox" value="1" id="subdivisions_checkbox_lable1" <?php if((strpos($type, '1') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="2" id="subdivisions_checkbox_lable2" <?php if((strpos($type, '2') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="3" id="subdivisions_checkbox_lable3" <?php if((strpos($type, '3') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="4" id="subdivisions_checkbox_lable4" <?php if((strpos($type, '4') !== false)) echo "checked='checked'";?>/>
                                        <input name="type[]" type="checkbox" value="5" id="subdivisions_checkbox_lable5" <?php if((strpos($type, '5') !== false)) echo "checked='checked'";?>/>
                                        <label class="checkbox" for="subdivisions_checkbox_lable1">电子产品 </label> 
                                        <label class="checkbox" for="subdivisions_checkbox_lable2">书，资料 </label> 
                                        <label class="checkbox" for="subdivisions_checkbox_lable3">家具 </label> 
                                        <label class="checkbox" for="subdivisions_checkbox_lable4">自行车 </label> 
                                        <label class="checkbox" for="subdivisions_checkbox_lable5">游戏账号 </label> 
                                        
                                        </div>
                                        
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single_billing_inp">
                                    <label for="county_region">描述 （例: 可以接受价格最高3w，能用就行，不需要高配，用的时间长了也无所谓）<span>*</span></label>
                                    <textarea type="text" name= "content" id="county_region"><?php if(isset($need['content'])) echo $need['content'];?></textarea>
                                </div>
                            </div>
                            <div class="col-4 float_l anonymousbox" >
                                    <input name="anonymous" type="checkbox" value="1" id="anonymous_user" <?php if((strpos($need['anonymous'], '1') !== false)) echo "checked='checked'";?>/>
                                    <label class="checkbox  anonymous_user_checkbox" for="anonymous_user">匿名提问</label> 
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="default_btn xs_btn rounded px-4 float_l">确认修改</button>
                            </div>
                            </form>
                            

                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>


    <!-- all js -->
    <?php include 'alljs.php';?>



</body>

</html>