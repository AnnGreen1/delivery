<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');



//  获取前端提交的用户名和密码
$username = $_REQUEST['username'];
$payword = $_REQUEST['payword'];
$type = $_REQUEST['type'];

$msg = array(
    "code" => "",
    "msg" => ""
);


if($type == 1)
{
    $sql_oldpayword = "select * from user where u_email = '$username'";
    $stmt_oldpayword = DB::getInstance()->connect()->query($sql_oldpayword);
    $stmt_payword = $stmt_oldpayword->fetch();
    if($stmt_payword['u_payword'] == $payword)
    {
        $msg['code'] = 1002;
        $msg['msg'] = "原密码输入正确！";
    }else{
        $msg['code'] = -1001;
        $msg['msg'] = "原密码输入错误！";
    }
}else{
    $sql_newpayword = "update user set u_payword = '$payword' where u_email = '$username'";
    $count_update = DB::getInstance()->connect()->exec($sql_newpayword);
    //echo $sql_update;
    if($count_update > 0)
    {
        $msg['code'] = 1001;
        $msg['msg'] = "修改成功！";
    }
    else{
        $msg['code'] = -1002;
        $msg['msg'] = "修改失败！";
    }
}

exit(json_encode($msg));
