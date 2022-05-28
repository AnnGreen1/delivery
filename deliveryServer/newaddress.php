<?php
require_once './common/DB.php';

// 跨域问题处理
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers:x-requested-with,content-type');


$email = $_REQUEST['username'];
$longitude = $_REQUEST['longitude'];
$latitude = $_REQUEST['latitude'];
$localization = $_REQUEST['localization'];
$createtime = time();
$default = $_REQUEST['default'];
$tel = $_REQUEST['tel'];

$msg = array(
    "code" => "",
    "msg" => ""
);

$sql_newaddress = "insert into address values (null,'$email',$longitude,$latitude,'$localization',$createtime,$default,$tel)";
// echo $sql_newaddress;
$count = DB::getInstance()->connect()->exec($sql_newaddress);

if ($count > 0) {
    // echo "<script>alert('注册成功！');location.href='../view/login.php'</script>";

    $msg['code'] = 1001;
    $msg['msg'] = "添加成功！";
} else {
    // echo "<script>alert('注册失败！');location.href='../view/register.php'</script>";
    $msg['code'] = -1001;
    $msg['msg'] = "添加失败！";
}

exit(json_encode($msg));