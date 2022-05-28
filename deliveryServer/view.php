<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$username=$_REQUEST['username'];
$sqlStuView = "select * from `order` where o_username='${username}'";

$stmtStu = DB::getInstance()->connect()->query($sqlStuView);

$stu = $stmtStu->fetchALL();


$msg = array(
    "code" => "",
    "data" => $stu,
    "message" => ""
);

if (empty($stu)) {
    $msg['code'] = 404;
    $msg['message'] = "查找失败";
} else {
    $msg['code'] = 1001;
    $msg['message'] = "查找成功";
}

// exit("sf");

exit(json_encode($msg));
