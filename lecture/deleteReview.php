<?php
    session_start();
    $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
    $uid=$_SESSION["id"];
    $no = $_GET["no"];
    // ���� ã��
    $fileSql="select * from project_1_review where no=$no";
    $result2=mysqli_query($conn,$fileSql);
    $row = mysqli_fetch_array($result2);
   
    $fileName =$row['attach'];
    $path = "file/".$fileName;
    if($fileName){
        unlink($path);
    }
	echo "$path sql:$fileSql";
    $sql = "delete from project_1_review where  no={$no};";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('���� �Ϸ�Ǿ����ϴ�.');location.href='04_�����ı�_����Ʈ.php'</script>";
    }else{
        // echo "���� ���� ${sql}";
        echo "<script>alert('���� ���еǾ����ϴ�.');history.back();</script>";
    }


?>