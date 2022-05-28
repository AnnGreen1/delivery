<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$o_id = $_REQUEST['o_id'];
$username = $_REQUEST['username'];
$payword = $_REQUEST['payword'];

$msg = array(
    "code" => "",
    "message" => ""
);

$sql_confirm_payword = "select * from user where u_email = '$username' and u_payword = $payword";
//echo $sql_confirm_payword;

$stmt_confirm_payword = DB::getInstance()->connect()->query($sql_confirm_payword);
// var_dump($stmt_confirm_payword);
$confirm_payword = $stmt_confirm_payword->fetch();
// var_dump($confirm_payword);
if (empty($confirm_payword)) {
    //支付密码错误
    $msg['code'] = -1001;
    $msg['message'] = '支付密码错误';
} else {
    //支付密码正确
    //如果用户名和密码匹配，就把订单的状态给改了

    $sql_updateorder = "update `order` set o_state = '已完成' where o_id = '$o_id'";
    $count_updateorder = DB::getInstance()->connect()->exec($sql_updateorder);
    if ($count_updateorder > 0) {
        $msg['code'] = 1001;
        $msg['message'] = "修改成功！";
    } else {
        $msg['code'] = -1002;
        $msg['message'] = "修改失败！";
    }
}

exit(json_encode($msg));
