<?php 
require_once('dbinfo.php');

$id = $_POST['id'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$score = isset($_POST['score'])? ($_POST['score']==''?0:$_POST['score']) :0;

$mydb = new mysqli($server_host,$user_name,$password,$db);

mysqli_connect_error()?die("数据库连接失败！"):'';

$sql = "update grade set id = '$id', name = '$name' , subject = '$subject' , score='$score' where id = '$id'";
$result = $mydb->query($sql);
if($result){
    echo json_encode(array(
        "status"=> "success",
        "message"=>"数据更新成功！",
        "result"=>$result
    ));
}else{
    echo json_encode(array(
        "status"=> "fail",
        "message"=>$result,
        "sql"=>$sql
    ));
}

mysqli_close($mydb);

?>