<?php
session_start();
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");

$content= iconv("euc-kr","utf-8",$_POST["ir1"]);
 $no = $_GET["no"];
 $uploaded_file_name_tmp = $_FILES[ 'fileToUpload' ][ 'tmp_name' ];
 $uploaded_file_name = $_FILES[ 'fileToUpload' ][ 'name' ];
 $dot = strpos($uploaded_file_name,".");
 $exp = substr($uploaded_file_name,$dot+1);
 $allowed_ext = array('jpg','jpeg','png','gif','zip','txt','html','php','hwp',"");
 if(!in_array($exp, $allowed_ext) ){
     echo "<script>alert('���������� �ʴ� ���� �����Դϴ�.');history.back();</script>";
     exit;}
 else{
 
 $upload_folder = "lectureImg/";
 move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
 echo "<p>" . $uploaded_file_name . "��(��) ���ε��Ͽ����ϴ�.</p>";
 }
 $fileName= $uploaded_file_name;
 

$uid=$_SESSION['id'];
$no=$_POST['no'];
$type=$_POST['kind'];
$title=$_POST['title'];
$teacher=$_POST['teacher'];
$level=$_POST['level'];
$start=$_POST['startDate'];
$end=$_POST['endDate'];

$query ="update project_1_admin set type='{$type}',title='{$title}',teacher='{$teacher}',
level='{$level}',start_date='{$start}',end_date='{$end}',id='{$uid}',thumbnail='{$fileName}' where no= '{$no}'";

 $result2 = mysqli_query($conn,$query);
if($result2){
     echo "<script>alert('���� ������ �Ϸ�Ǿ����ϴ�.');
     location.href='lectureList.php'</script>";
   
}
else{
    echo "����{$query}<script>alert('���� ����� �����߽��ϴ�.');
    </script>";
    history.back();
}
?>