<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');

/**
 * 注册的流程
 * 数据：邮箱、密码、验证码
 */


//  获取前端提交的用户名和密码
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$nickname = $_REQUEST['nickname'];
$payword = $_REQUEST['payword'];
$verificationcode = $_REQUEST['verificationcode'];
// echo $email . "   " . $password."   ".$verificationcode;

// echo time();

$timenow = time();

$msg = array(
    "code" => "",
    "msg" => ""
);

$sqlselectverificationcode = "select * from `emailverificationcode` where username = '$email' and verificationCode = $verificationcode and ($timenow - createtime) <= 60";

// $sqlselectverificationcode = "select * from emailverificationCode where username = '$email' and verificationcode = '$verificationcode'";
// echo $sqlselectverificationcode;
$stmt = DB::getInstance()->connect()->query($sqlselectverificationcode);
if (!is_null($stmt)) {
    //验证码正确，判断是否已经注册
    $sqlselectuser = "select * from user where u_email = '$email'";
    // echo $sqlselectuser;
    $stmtselectuser = DB::getInstance()->connect()->query($sqlselectuser);

    if (!is_null($stmtselectuser)) {
        //验证码正确且该邮箱还没有注册
        $sqlinsertuser = "insert into user(u_id,u_password,u_nickname,u_createtime,u_icon,u_balance,u_address,u_email,u_payword) values (null,'$password','$nickname',$timenow,'default.png',0,'#','$email',$payword)";
        // echo $sqlinsertuser;

        $count = DB::getInstance()->connect()->exec($sqlinsertuser);
        if ($count > 0) {
            // echo "<script>alert('注册成功！');location.href='../view/login.php'</script>";

            $msg['code'] = 1001;
            $msg['msg'] = "注册成功！";
        } else {
            // echo "<script>alert('注册失败！');location.href='../view/register.php'</script>";
            $msg['code'] = -1003;
            $msg['msg'] = "注册失败！";
        }
    } else {
        $msg['code'] = -1002;
        $msg['msg'] = "该邮箱已注册！";
    }
} else {
    $msg['code'] = -1001;
    $msg['msg'] = "验证码错误！";
}


exit(json_encode($msg));
