<?php
session_start();
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");

    $uid=$_SESSION['id'];
	$upw=$_POST['originalPassword'];
    $hash=hash('sha256',$upw);

  $select_query = "SELECT * from project_1 where user_id='{$uid}'";

  $result_set = mysqli_query($conn, $select_query);

  $count = mysqli_num_rows($result_set);
    $row= mysqli_fetch_array($result_set);



if($count>0){
    $pw =$row['user_pw'];
    if($hash==$pw){
        echo "��й�ȣ Ȯ��";
        echo "<script></script>";
        exit;
    }else{
        echo "Ʋ�� ��й�ȣ
        ";
        exit;
    }

}   





//  if(hash("hash256",$upw)==$row['user_pw']){
// 	 echo "��й�ȣ Ȯ��";
//   exit;}

//  else{ echo "Ʋ�� ��й�ȣ";
//  exit;}
  mysqli_close($conn);

  ?>

