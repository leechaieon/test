<?php
session_start();

$uid=$_POST["userId"];
$upw=$_POST["userPassword"];


$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
	

$query = "select * from project_1 where user_id='{$uid}'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);


if($count>0){
    $row = mysqli_fetch_array($result);
    $hash= $row['user_pw'];
    $inputPw=hash("sha256",$upw);

    if($hash==$inputPw){ //upw�� �α��ο� �Էµ� ��й�ȣ
        
        $_SESSION["name"] = $row['user_name'];
        $admin=$row['administer'];
        $_SESSION["admin"] = $admin;
        $_SESSION["id"] = $uid;
        $_SESSION["login"] = "yes";
        
        echo  "<script>location.href='lecture/04_�����ı�_����Ʈ.php';</script>";
    }
    else{
    
        echo "<script>alert('���̵� ��й�ȣ�� ���� �ʽ��ϴ�.');
        location.href='00_�α���.html'</script>";
        
        exit;    

    }
}
else{
    echo "<script>alert('�������� �ʴ� ���̵��Դϴ�.');
    location.href='00_�α���.html'</script>";
    exit;
}
  mysqli_close($conn);
  ?>



