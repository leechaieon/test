<?php
session_start();
$no = $_GET["no"];
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
$query="delete from project_1_admin where no= {$no}";
$result = mysqli_query($conn,$query);
if($result){
    echo "<script>alert('���ǰ� �����Ǿ����ϴ�.');history.back();
    </script>";
    
}else{
   
    echo "<script>alert('���� ��û�� ���еǾ����ϴ�.');history.back();
    </script>";
}
?>