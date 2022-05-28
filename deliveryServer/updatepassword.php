<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');



//  获取前端提交的用户名和密码
$username = $_REQUEST['username'];
$old_password = $_REQUEST['old_password'];
$new_password = $_REQUEST['new_password'];




$sql_password = "select * from user where u_email = '$username' and u_password = '$old_password'";
//echo $sql_password;
$stmt_password = DB::getInstance()->connect()->query($sql_password);
$password = $stmt_password->fetch();

$msg = array(
    "code" => "",
    "msg" => ""
);

if(empty($password))
{
    $msg['code'] = -1001;
    $msg['msg'] = "原密码错误！";
}else{
    $sql_update = "update user set u_password = '$new_password' where u_email = '$username'";

    $count_update = DB::getInstance()->connect()->exec($sql_update);
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
