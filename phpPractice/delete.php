<?php
require_once('dbinfo.php');

$id = isset($_POST['id'])?$_POST['id']:'';

$mydb = new mysqli($server_host,$user_name,$password,$db);

mysqli_connect_error()?die("数据库连接失败！"):'';

if($id ==''){
    echo "参数错误";
}else{
    $sql = "delete from grade where id = '$id'";
    $result = $mydb->query($sql);
    if($result){
        echo json_encode(array(
            "status"=>"success",
            "message"=>"删除数据成功"
        ));
    }else{
        echo json_encode(array(
            "status"=>"fail",
            "message"=>"删除数据失败"
        ));
    }
}


mysqli_close($mydb);
?>