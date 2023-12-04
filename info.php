<?php 
function info(){
    $choice = $_SESSION['choice'];
    if(empty($choice)) return;
    if(!is_numeric($choice)) return;
    $html = '<script>
    $(function(){
        Notiflix.Notify.Init();
        Notiflix.Report.Init();
        Notiflix.Confirm.Init();
        Notiflix.Loading.Init({
            clickToClose:true
        });
        ';
	if($choice == 1){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '发布成功', '感谢您的使用', 'OK' ); 
    })";
    }
    elseif($choice == 2){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '注册成功', '感谢您的使用', 'OK' ); 
    })";
    }
    elseif($choice == 3){
        $html .= "$('#confirm').submit(function(){
            Notiflix.Confirm.Show( '确认发布', '检查好填写的正误哦～', '发布', '取消'); 
            })
            $.post('getqsnext.php', $('form').serialize() )";
    }
    //, function(){window.location.href = 'https://www.ershou-jp.com';} 
    elseif($choice == 4){
        $html .= "$('#dialog-error').ready(function(){
            Notiflix.Report.Failure( '发布失败', '一分钟之内不能进行多次发布哦～', 'OK' ); 
    })";
    }
    elseif($choice == 5){
        $html .= "$('#dialog-error').ready(function(){
            Notiflix.Report.Failure( '注册失败', '该邮箱已被注册', 'OK' ); 
    })";
    }
    elseif($choice == 6){
        $html .= "$('#dialog-error').ready(function(){
            Notiflix.Report.Failure( '发布失败', '请先完成登录哦', 'OK' ); 
    })";
    }
    elseif($choice == 7){
        $html .= "$('#dialog-error').ready(function(){
            Notiflix.Report.Failure( '发布失败', '发生未知错误，请稍后重试', 'OK' ); 
    })";
    }
    elseif($choice == 8){
        $html .= "$('#dialog-warning').ready(function(){
            Notiflix.Report.Warning( '访问失败', '请先登录哦', 'OK' ); 
    })";
    }
    elseif($choice == 9){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '删除成功', '感谢您的使用', 'OK' ); 
    })";
    }
    elseif($choice == 10){
        $html .= "$('#dialog-warning').ready(function(){
            Notiflix.Report.Warning( '删除失败', '发生未知错误，请稍后再试', 'OK' ); 
    })";
    }
    elseif($choice == 11){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '编辑成功', '感谢您的使用', 'OK' ); 
    })";
    }
    elseif($choice == 12){
        $html .= "$('#dialog-warning').ready(function(){
            Notiflix.Report.Warning( '编辑失败', '发生未知错误，请稍后再试', 'OK' ); 
    })";
    }
    elseif($choice == 13){
        $html .= "$('#dialog-warning').ready(function(){
            Notiflix.Report.Warning( '操作失败', '发生未知错误，请稍后再试', 'OK' ); 
    })";
    }
    elseif($choice == 14){
        $html .= "$('#dialog-warning').ready(function(){
            Notiflix.Report.Warning( '操作失败', '填写信息不得为空', 'OK' ); 
    })";
    }
    elseif($choice == 15){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '修改成功', '感谢您的使用', 'OK' ); 
    })";
    }
    elseif($choice == 16){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '欢迎回来', '感谢您的使用', 'OK' ); 
    })";
    }
    elseif($choice == 17){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '发送成功', '十分感谢您宝贵的建议！', 'OK' ); 
    })";
    }
    elseif($choice == 18){
        $html .= "$('#dialog-success').ready(function(){
            Notiflix.Report.Success( '登录成功', '欢迎回来～', 'OK' ); 
    })";
    }
    $html .= "    })
    </script>";
    echo $html;
    unset($_SESSION['choice']);
}
info();
?>