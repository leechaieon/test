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

    if($hash==$inputPw){ //upw는 로그인에 입력된 비밀번호
        
        $_SESSION["name"] = $row['user_name'];
        $admin=$row['administer'];
        $_SESSION["admin"] = $admin;
        $_SESSION["id"] = $uid;
        $_SESSION["login"] = "yes";
        
        echo  "<script>location.href='lecture/04_수강후기_리스트.php';</script>";
    }
    else{
    
        echo "<script>alert('아이디나 비밀번호가 맞지 않습니다.');
        location.href='00_로그인.html'</script>";
        
        exit;    

    }
}
else{
    echo "<script>alert('존재하지 않는 아이디입니다.');
    location.href='00_로그인.html'</script>";
    exit;
}
  mysqli_close($conn);
  ?>



