<?php
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
$what=$_POST['what'];

if($what=="phone"){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $id = $_POST['userId'];
    $query="select * from project_1 where user_name='{$name}' and user_phoneNumber='{$phone}' and user_id='{$id}'";
}
else{
    $email = $_POST['email']."@".$_POST['emailSite'];
    $name=$_POST['name'];
    $id = $_POST['userId'];
    $query="select * from project_1 where user_name='{$name}' and user_email='{$email}' and user_id='{$id}'";
}

$result=mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
$row = mysqli_num_rows($result);

if($count>0){
    echo "������ȣ�� ���½��ϴ�. �Է��ϼ���.";
}else{
    echo "�������� �ʴ� ȸ���Դϴ�.{$query}";
}
mysqli_close($conn);

?>