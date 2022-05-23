<?php
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");

$name=iconv("euc-kr","utf-8",$_POST['userName']);

$what = $_POST['what'];

if($what=='phone'){
  $phone=$_POST['num1'].$_POST['num2'].$_POST['num3'];
  $query="select user_id from project_1 where user_name='{$name}' and user_phoneNumber='{$phone}'";
}else{
  $mail=$_POST['mail']."@".$_POST['mailSite'];
  $query="select user_id from project_1 where user_name='{$name}' and user_email='{$mail}'";
}

  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);
 
  if($count>0){
      $id= $row['user_id'];
    echo "<h3>{$id}</h3> 입니다.";
    exit;
    }
    else{
  echo"아이디를 찾을 수 없습니다.";
        
    exit;    

}
  

  mysqli_close($conn);
  ?>

