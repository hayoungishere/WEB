
<?php
//error_reporting(E_ALL);
//ini_set("display_errors",1); //에러 발생시 표시하기 위한 부분

include("configure.php");
include("connect.php");
include("password.php");

$pw = $_POST['InputPassword1'];
$pwc = $_POST['InputConfirm-Password'];
$id =$_POST['InputId'];
$name=$_POST['InputName'];
$email=$_POST['Email'];

if($pw != $pwc){
  echo"<script> alert('비밀번호가 일치하지않습니다.'); window.location.href='/joining.html' </script>";
  exit();
}
if($id==NULL || $pw==NULL || $name==NULL ||$email==NULL){
  echo"<script> alert('빈 칸을 모두 채워주세요.'); window.location.href='/joining.html' </script>";
  exit();
}

$connect=connect_db($host, $dbid, $dbpw, $dbname);
$password=password_hash($_POST['InputConfirm-Password'],PASSWORD_DEFAULT);

$data_stream="'".$name."',"."'".$id."',"."'".$password."'".", '".$email."'";
$query = "insert into USER_INFO(user_name ,user_id, password, email) values (".$data_stream.")";
$result = mysqli_query($connect, $query);

if(!mysqli_query($connect, $query)){  /// 회원가입 완료후, 로그인 페이지로 이동.
  echo "<script> alert('회원가입을 축하드립니다.'); window.location.href='/login.html' </script>";
}else{
  echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
}

mysqli_close($connect);
?>
