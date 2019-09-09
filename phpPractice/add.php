<?php 
require_once('dbinfo.php');

$id = md5(uniqid());
$name = $_POST['name'];
$subject = $_POST['subject'];
$score = isset($_POST['score'])? ($_POST['score']==''?0:$_POST['score']) :0;

$mydb = new mysqli($server_host,$user_name,$password,$db);

mysqli_connect_error()?die("数据库连接失败！"):'';

$sql = "insert into grade values('$id','$name','$subject','$score')";
$result = $mydb->query($sql);
if($result){
    echo json_encode(array(
        "status"=> "success",
        "message"=>"数据写入成功！"
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