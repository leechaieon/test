<?php

  session_start();
  $no = $_POST["no"];
  $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
 $content= $_POST["ir1"];
 $title =$_POST["title"];
 $radio = $_POST["radio"];
 $lec_type = $_POST["type"];
 $lec_title = $_POST["lec_title"];
 $uid = $_SESSION["id"];
 $originalFile =iconv("utf-8","euc-kr", $_POST["originalFile"]);
// ÷������
$uploaded_file_name_tmp = $_FILES[ 'fileToUpload' ][ 'tmp_name' ];
$uploaded_file_name = $_FILES[ 'fileToUpload' ][ 'name' ];
$dot = strpos($uploaded_file_name,".");
$exp = substr($uploaded_file_name,$dot+1);
$allowed_ext = array('jpg','jpeg','png','gif','zip','txt','html','php','hwp');

$path = "file/".$originalFile;
if($originalFile){
    unlink($path);
}

if($uploaded_file_name){
if(!in_array($exp, $allowed_ext) ){
    echo "<script>alert('�ùٸ��� ���� Ȯ�����Դϴ�.')</script>";
    exit;
}else{

$upload_folder = "file/";
move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
echo "<p>" . $uploaded_file_name . "��(��) ���ε��Ͽ����ϴ�.</p>";
}}
$fileName= $uploaded_file_name;
// 
 $sql =  "update project_1_review set  lec_type='$lec_type',star='$radio',title='$title',content ='$content',attach='$fileName'  where no=$no";
$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('���� �ıⰡ �����Ǿ����ϴ�.');location.href='04_�����ı�_����Ʈ.php'</script>";
}
else{
    echo "���� �ı� ���� ����{$sql}";
}
?>