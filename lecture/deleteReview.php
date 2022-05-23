<?php
    session_start();
    $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
    $uid=$_SESSION["id"];
    $no = $_GET["no"];
    // 파일 찾기
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
        echo "<script>alert('삭제 완료되었습니다.');location.href='04_수강후기_리스트.php'</script>";
    }else{
        // echo "삭제 실패 ${sql}";
        echo "<script>alert('삭제 실패되었습니다.');history.back();</script>";
    }


?>