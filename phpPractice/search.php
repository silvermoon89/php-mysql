<?php
require_once('dbinfo.php');

$search = isset($_POST['search'])?$_POST['search']:'';

$mydb = new mysqli($server_host,$user_name,$password,$db);

mysqli_connect_error()?die("数据库连接失败！"):'';

if($search==''){
    $sql_all = "select * from grade";
    $result = $mydb->query($sql_all);
    $data = $result->fetch_all();
    // print_r($data);
    echo json_encode($data);
}else{
    $sql_name = "select * from grade where name = '$search' or subject = '$search'";
    $result = $mydb->query($sql_name);
    $data = $result->fetch_all();
    echo json_encode($data);
}

mysqli_close($mydb);
?>