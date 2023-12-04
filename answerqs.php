<!DOCTYPE html>
<html lang="en">
    
<?php 
session_start();
include 'head.php';
include_once 'mysql.inc.php';
include_once 'page.inc.php';
if(isset($_SESSION['ID'])){
    include_once 'connectdb.php';
    $ID = $_SESSION['ID'];
    $sql = "SELECT mQID from userinfo WHERE ID = {$ID}";
    $res = execute($conn,$sql);
    $mQID = mysqli_fetch_array($res)['mQID'];
    close($conn);
}

$servername = 'localhost';
$username = 'bale2002_0309';
$password = 'axiulan14';
$conn = mysqli_connect($servername, $username, $password, 'bale2002_question', 3306);

// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_GET['qid'])) header('location:showqs.php');//choice要更正
$qid = isset($_GET['qid']) ? $_GET['qid'] : '';
if(!is_numeric($qid)) header('location:showqs.php');
$sql = "SELECT * from questiontable where QID = {$qid}";
$res = mysqli_fetch_array(execute($conn,$sql));
if(!isset($res)) header('location:showqs.php');
?>
<body>
    <!-- header的html-->
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="assets/css/discussqs.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>

    <!-- 以下写内容 -->
    <div class="container">
        <div class="breadcrumbs">
            <a href="index.php"><i class="las la-home">返回主页</i></a>
            <a href="showqs.php"  class="active">回答问题</a>
        </div>
    </div>

    <!-- product view -->
    <div class="shop_wrap section_padding_b">
        <div class="question_warpper">
            <div class="question_content">
                <h1 class="question_title"><?php echo htmlspecialchars($res['title']);?></h1>
                <p><?php 
                if($res['nickname']!=='未登录' && $res['anonymous']==0){
                    echo htmlspecialchars($res['time'].'　　'.$res['nickname']);
                }
                elseif($res['nickname']==='未登录') echo $res['time'].'　　'.'未登录用户';
                else echo $res['time'].'　　'.'匿名用户';
                ?></p>
                <div class="question_discribe" style="margin-bottom:20px;">
                    <span itemprop="text"><?php echo htmlspecialchars($res['content']);?></span>
                </div>
                <div class="col-md-2 mid">
                    <a href="#answer"> <button class="list_product_btn"><span class="icon"><i class="las la-pen"></i></span>去写回答</button></a>
                    <?php 
                    if(isset($_SESSION['ID'])){
                        if(strpos($mQID, '|'.$qid.'|') !== false){
                            echo "<a href='#' ><button class='default_btn small rounded second border-none list_product_btn loved' id='loved_btn'><i class='icon-heart me-2'></i> 已收藏</button></a>";
                        }
                        else{
                            echo "<a href='#' ><button class='default_btn small rounded second border-none list_product_btn' id='loved_btn'><i class='icon-heart me-2'></i> 收藏</button></a>";
                        }
                    };?>
                    <p id="wangzhi"><?php echo 'www.ershou-jp.com/answerqs.php?qid='.$qid;?></p>
                    <button class="default_btn small rounded second border-none list_product_btn la la-copy" id="copy" style="margin-left:auto;margin-right:auto;">复制网址</button>
                </div>  
            </div>
        </div>
        <div class="container">
            <div class="row single_list_product" >
                        <div class="col-xl-8 col-lg-10">
                            
                            <div class="shop_products">
                                <div class="list_view_products">

                <?php //大评论
                            $commentsql = "SELECT * from comment_{$qid} where comment_level = 1 ORDER BY CID DESC";
                            $commentres = execute($conn,$commentsql);
                            $count = mysqli_num_rows($commentres);
                            $idnum = 1;
                            for($i=0;$i<$count;$i++){
                                $firstcomment = mysqli_fetch_array($commentres);
                                if(!isset($firstcomment)) break;?>                        
                                    <div class=" border_bottom">
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="product_content">
        
                                                    <div class="user">
                                                        <div class="user-name"><?php echo htmlspecialchars($firstcomment['nickname']);?></div><p class="pushtime"style="font-size:10px;"><?php echo $firstcomment['reply_time'];?></p>
                                                    </div>
                                                    <p class="product_list_desc">
                                                    <?php echo htmlspecialchars($firstcomment['content']);?>
                                                    </p>
                                                    <div class="replywarpper">        
                                                        <div class="reply_conbig">
                                                        <label class="float_r reply_show" for="open<?php $idnum += 1; echo $idnum;?>">展开回复</label>
                                                        <input type="checkbox" value="" id="open<?php echo $idnum;?>" class="reply_show_input"/>
                                                        <div class="reply_content">
                                                            <ul>
                                                                <li>
                                                                <label class="float_r reply_show" for="answer<?php $idnum += 1; echo $idnum;?>">回复楼主</label>
                                                                <input type="checkbox" value="" id="answer<?php echo $idnum;?>" class="reply_show_second_input"/>
                                                                <div class='reply_textarea'>
                                                                <form action="getcomment.php" method="post">
                                                                <input type="hidden" name='qid' value='<?php echo $qid;?>'>
                                                                <input type="hidden" name='repliedCID' value='<?php echo $firstcomment['CID'];?>'>
                                                                <input type="hidden" name='repliedID' value='<?php echo $firstcomment['ID'];?>'>
                                                                <input type="hidden" name='repliedname' value='<?php echo htmlspecialchars($firstcomment['nickname']);?>'>
                                                                <input type="hidden" name='level' value='<?php echo 2;?>'>
                                                                <input type="hidden" name='fatherCID' value='<?php echo $firstcomment['CID'];?>'>
                                                                <textarea name='content' rows='5'></textarea><br/>
                                                                <input type='submit' class='list_product_btn reply_input'value='发表' />
                                                                </form>
                                                                </div>
                                                                
                                                                </li>
                                                        
                                                    </a>
                                                    <?php //小评论
                                                    $commentsql1 = "SELECT * from comment_{$qid} where fatherCID = {$firstcomment['CID']}";
                                                    $commentres1 = execute($conn,$commentsql1);
                                                    $count1 = mysqli_num_rows($commentres1);
                                                    for($j=0;$j<$count1;$j++){
                                                        $secondcomment = mysqli_fetch_array($commentres1);
                                                        if(!isset($secondcomment)) break;?> 
                                                                <li>
                                                                    <div class="user">
                                                                    <?php echo htmlspecialchars($secondcomment['nickname']);?>
                                                                    </div>
                                                                    <div class="reply_user">
                                                                        <p>回复</p>
                                                                        <p><?php echo htmlspecialchars($secondcomment['repliedname']);?></p>
                                                                    </div>
                                                                    <p class="pushtime" style="font-size:10px;"><?php echo $secondcomment['reply_time'];?></p>
                                                                    <div class="reply_detail"><?php echo htmlspecialchars($secondcomment['content']);?>   <input type="checkbox" value="" id="k0000000<?php $idnum += 1; echo $idnum;?>" class="reply_show_second_input"/><label class="float_r reply_show" for="k0000000<?php echo $idnum;?>">回复</label>
                                                                    <div class='reply_textarea'>
                                                                    <form action="getcomment.php" method="post">
                                                                    <input type="hidden" name='qid' value='<?php echo $qid;?>'>
                                                                    <input type="hidden" name='repliedCID' value='<?php echo $secondcomment['CID'];?>'>
                                                                    <input type="hidden" name='repliedID' value='<?php echo $secondcomment['ID'];?>'>
                                                                    <input type="hidden" name='repliedname' value='<?php echo htmlspecialchars($secondcomment['nickname']);?>'>
                                                                    <input type="hidden" name='level' value='<?php echo 2;?>'>
                                                                    <input type="hidden" name='fatherCID' value='<?php echo $firstcomment['CID'];?>'>
                                                                    <textarea name='content' rows='5'></textarea><br/>
                                                                    <input type='submit' class='list_product_btn reply_input'value='发表' />
                                                                    </form>
                                                                    </div>
                                                                    
                                                                </li>
                                                                <?php };?>
                                                            </ul>
                                                        </div>
                                                        </div>                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php };?>
                            
                                </div>
                            </div>

                            <div class="pagination_wrp d-flex align-items-center justify-content-center">
                                <!--
                                <div class="single_paginat active">1</div>
                                <div class="single_paginat">2</div>
                                <div class="single_paginat">3</div>
                                <div class="single_paginat">4</div>
                                <div class="single_paginat"><i class="las la-long-arrow-alt-right"></i></div>
                                -->
                            </div>
                            <div id="answer" class="row">
                            <form action="getcomment.php" method="post">
                                <div class="col-md-10">
                                    <div class="title">写回答</div>
                                    <div class="answer_write">
                                        <div class="single_billing_inp">
                                            <input type="hidden" name='qid' value='<?php echo $qid;?>'>
                                            <input type="hidden" name='level' value='<?php echo 1;?>'>
                                            <textarea name="content" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-12 mid">
                                                <button class="list_product_btn" type='submit'><span class="icon"><i class="las la-pen"></i></span>提交回答</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    
                </div>
            </div>
            
        </div>



    <!-- footer的html -->
    <?php include 'footer.php'; ?>

    <!-- all js -->
    <?php include 'alljs.php';?>
    <script type="text/javascript">
    document.getElementById('loved_btn').onclick = function(){
        mark();
    }
    function mark(){
      var test = document.getElementById("loved_btn");
      if(test.classList.contains('loved')){
        document.getElementById('loved_btn').innerHTML="<i class='icon-heart me-2'></i>已收藏";
        var ajaxObj = new XMLHttpRequest();
        ajaxObj.open('get', 'markpush.php?mark=1&&QID=<?php echo $qid;?>');
        ajaxObj.send();
      }
      else{
        document.getElementById('loved_btn').innerHTML="<i class='icon-heart me-2'></i>收藏";
        var ajaxObj = new XMLHttpRequest();
        ajaxObj.open('get', 'markpush.php?mark=0&&QID=<?php echo $qid;?>');
        ajaxObj.send();
      }
    }
  </script>
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
    <?php include 'info.php';?>
</body>
</html>