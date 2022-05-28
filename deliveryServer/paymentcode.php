<?php
/*
 * @Author: xycllin 9674394+xycllin@user.noreply.gitee.com
 * @Date: 2022-05-09 21:39:47
 * @LastEditors: xycllin 9674394+xycllin@user.noreply.gitee.com
 * @LastEditTime: 2022-05-17 09:22:10
 * @FilePath: \deliveryServer\login.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');



//  获取前端提交的用户名和密码
$username = $_REQUEST['username'];
$payword = $_REQUEST['payword'];

$sqlStuLogin = "select * from user where u_email = '$username'";

$stmtStu = DB::getInstance()->connect()->query($sqlStuLogin);

$stu = $stmtStu->fetch();

$msg = array(
    "code" => "",
    "message" => "",
);

if (empty($stu)) {
    $msg['code'] = 404;
} else {
    if ($stu['u_payword'] == $payword) {
        $msg['code'] = 1001;
        $msg['message'] = "密码正确";
    }else{
        $msg['code'] = 1001;
        $msg['message'] = "密码错误";
    }
}

exit(json_encode($msg));
