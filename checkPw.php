<?php

$upw=$_POST[userPassword1];
$eng = preg_match('/[a-z]/u', $upw);
$upw=$_POST["userPassword1"];
$num = preg_match('/[0-9]/u', $upw); 
$kor = preg_match('/[xA1-xFE][xA1-xFE]/',$upw); 

if(empty($upw)){echo "��й�ȣ�� �Է��ϼ���. ";}

else if($eng==0||strlen($upw)<8||strlen($upw)>15||$num==0){
    echo "��й�ȣ�� 8~15���� ������ ���� ȥ���Դϴ�.";
  }
 else echo "��밡���� ��й�ȣ �Դϴ�.";
 
  ?>

