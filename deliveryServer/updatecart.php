<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');



//  获取前端提交的用户名和密码
$username = $_REQUEST['username'];
$total = $_REQUEST['total'];
$title = $_REQUEST['title'];
$state = $_REQUEST['state'];
$icon=$title.'.jpg';
$sql_updatecart = "INSERT into `order` VALUES ('','$total','$username','$title','$state','$icon')";
$stmt_password = DB::getInstance()->connect()->exec($sql_updatecart);
// $password = $stmt_password->fetch();

$msg = array(
    "code" => "",
    "msg" => ""
);

if ($stmt_password = 0) {
    $msg['code'] = -1001;
    $msg['msg'] = "插入失败！";
} else {
    $msg['code'] = 1001;
    $msg['msg'] = "插入成功！";
}



exit(json_encode($msg));
