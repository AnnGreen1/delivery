<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$username = $_REQUEST['username'];

$sqlUserinfo = "select * from user where u_email = '$username'";

$stmUserinfo = DB::getInstance()->connect()->query($sqlUserinfo);

$user = $stmUserinfo->fetch();


$msg = array(
    "code" => "",
    "data"=>'',
    "message" => ""
);

if (!empty($stu)) {
    $msg['code'] = -1001;
    $msg['data'] = '';
    $msg['message'] = "查找失败";
} else {
    $msg['code'] = 1001;
    $msg['data'] = $user;
    $msg['message'] = "查找成功";
}

// exit("sf");

exit(json_encode($msg));

