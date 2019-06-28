<?php
include("configure.php");
include("connect.php");
include("password.php");
include("session.php");

if($_POST['InputId'] != ""){
$connect=connect_db($host, $dbid, $dbpw, $dbname);

  $myuserid=$_POST['InputId'];


  $query="select * from USER_INFO where user_id='".$myuserid."'";  //아이디 비밀번호 대조.
  $result=mysqli_query($connect,$query);
  $count=mysqli_num_rows($result);


 if($count>=1){
    //session_register("myuserid");
    echo "<script>alert('사용할 수 없는 아이디 입니다. 다시 입력해주세요.');window.location.href='/joining.html'</script>";
  //  header("location:welcome.php"); //welcom.php 페이지로 넘김

}else{
  echo "<script>alert('사용가능한아이디입니다.');window.location.href='/joining.html'</script>";
//echo "<script>history.back();</script>";
  }
mysqli_close($connect);
}
?>
<!--<meta http-equiv="refresh" content="0;url=loginMain.php"/>
-->
