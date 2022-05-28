<?php

require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');


//  获取前端提交的用户名和密码
$id = $_REQUEST['o_id'];


$sqlStuLogin = "delete  from `order` where o_id = ${id}";

$stmtStu = DB::getInstance()->connect()->exec($sqlStuLogin);


$msg = array(
    "code" => "",
    "message" => "",
);

if (!empty($stmtStu)) {
    $msg['code'] = 1001;
    $msg['message'] = "删除成功";
} else {
    $msg['code'] = -1001;
    $msg['message'] = "删除失败";
}

exit(json_encode($msg));
