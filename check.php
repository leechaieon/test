<?php
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");


	$uid=$_POST["userId"];
  $eng = preg_match('/[a-z]/u', substr($uid,0,1)); //아이디의 시작이 영문자인지 확인하기
  $num = preg_match('/[0-9]/u', $uid); //숫자가 포함되어 있어야함
  $kor = preg_match('/[xA1-xFE][xA1-xFE]/',$uid); //한글이 포함되면 안됨

  if(empty($uid)){echo "아이디를 입력하세요. ";}

  else if($eng==false||strlen($uid)<4||strlen($uid)>15||$num==false){
    echo "아이디는 4~15로 영문자 소문자로 시작하며 숫자가 포함되어야 합니다.";
  }
 
  else {$select_query = "SELECT * from project_1 where user_id='{$uid}'";

  $result_set = mysqli_query($conn, $select_query);



  $count = mysqli_num_rows($result_set);



 if($count>0){
	 echo "{$uid}는 중복된 아이디입니다.";
 }

 else echo "{$uid}는 사용 가능한 아이디입니다.";
?>

	<?php
  mysqli_close($conn);}
  ?>

