<?php
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");


	$uid=$_POST["userId"];
  $eng = preg_match('/[a-z]/u', substr($uid,0,1)); //���̵��� ������ ���������� Ȯ���ϱ�
  $num = preg_match('/[0-9]/u', $uid); //���ڰ� ���ԵǾ� �־����
  $kor = preg_match('/[xA1-xFE][xA1-xFE]/',$uid); //�ѱ��� ���ԵǸ� �ȵ�

  if(empty($uid)){echo "���̵� �Է��ϼ���. ";}

  else if($eng==false||strlen($uid)<4||strlen($uid)>15||$num==false){
    echo "���̵�� 4~15�� ������ �ҹ��ڷ� �����ϸ� ���ڰ� ���ԵǾ�� �մϴ�.";
  }
 
  else {$select_query = "SELECT * from project_1 where user_id='{$uid}'";

  $result_set = mysqli_query($conn, $select_query);



  $count = mysqli_num_rows($result_set);



 if($count>0){
	 echo "{$uid}�� �ߺ��� ���̵��Դϴ�.";
 }

 else echo "{$uid}�� ��� ������ ���̵��Դϴ�.";
?>

	<?php
  mysqli_close($conn);}
  ?>

