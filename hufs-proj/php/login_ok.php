<?php
include("configure.php");
include("connect.php");
include("password.php");
include("session.php");

if($_POST['InputId'] != ""){
$connect=connect_db($host, $dbid, $dbpw, $dbname);

  $myuserid=$_POST['InputId'];
  $mypassword=$_POST['InputPassword'];

  //$query="select * from USER_INFO where user_id='".$myuserid."' and password='".$mypassword."'";  //아이디 비밀번호 대조.
$query="select * from USER_INFO where user_id='".$myuserid."'";  //아이디 비밀번호 대조.
  $result=mysqli_query($connect,$query);
  $array=mysqli_fetch_array($result);
  $hash_password=$array['password'];
  $count=mysqli_num_rows($result);

  if($count==0){
  echo "<script>alert('This Id is not EXIST!');window.location.href='/login.html'</script>";
  }
  if(password_verify($mypassword,$hash_password)){
    //session_register("myuserid");
    $_SESSION['user_id']=$myuserid;
  //  header("location:welcome.php"); //welcom.php 페이지로 넘김

}else{
  echo "<script>alert('Password is invalid!!');window.location.href='/login.html'</script>";
  }
mysqli_close($connect);
}
?>
<meta http-equiv="refresh" content="0;url=loginMain.php"/>
