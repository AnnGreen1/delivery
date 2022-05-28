<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$email=$_REQUEST['email'];
$sqlgetaddresslist = "select * from `address` where a_email='${email}'";

$stmtaddresslist = DB::getInstance()->connect()->query($sqlgetaddresslist);

$addresslist = $stmtaddresslist->fetchALL();


$msg = array(
    "code" => "",
    "data" => $addresslist,
    "message" => ""
);

if (empty($addresslist)) {
    $msg['code'] = 404;
    $msg['message'] = "查找失败";
} else {
    $msg['code'] = 1001;
    $msg['message'] = "查找成功";
}

// exit("sf");

exit(json_encode($msg));
