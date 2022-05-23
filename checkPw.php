<?php

$upw=$_POST[userPassword1];
$eng = preg_match('/[a-z]/u', $upw);
$upw=$_POST["userPassword1"];
$num = preg_match('/[0-9]/u', $upw); 
$kor = preg_match('/[xA1-xFE][xA1-xFE]/',$upw); 

if(empty($upw)){echo "비밀번호를 입력하세요. ";}

else if($eng==0||strlen($upw)<8||strlen($upw)>15||$num==0){
    echo "비밀번호는 8~15자의 영문자 숫자 혼합입니다.";
  }
 else echo "사용가능한 비밀번호 입니다.";
 
  ?>

