<?php
  session_start();
  $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
  $ff=$_POST["ir1"];
 $content=$_POST["ir1"];
 $title = $_POST["title"];
 $radio = $_POST["radio"];
 $lec_type = $_POST["type"];
 $lec_title = $_POST["lec_title"];
 $uid = $_SESSION["id"];
// ÷������
$uploaded_file_name_tmp = $_FILES[ 'fileToUpload' ][ 'tmp_name' ];
$uploaded_file_name = $_FILES[ 'fileToUpload' ][ 'name' ];
$dot = strpos($uploaded_file_name,".");
$exp = substr($uploaded_file_name,$dot+1);
$allowed_ext = array('jpg','jpeg','png','gif','zip','txt','html','php','hwp');
if($uploaded_file_name){
if(!in_array($exp, $allowed_ext) ){
    echo "<script>alert('�ùٸ��� ���� Ȯ�����Դϴ�.')</script>";
   
}else{

$upload_folder = "file/";
move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
echo "<script>alert(' . $uploaded_file_name . '��(��) ���ε��Ͽ����ϴ�.')</script>";
}}
$fileName= $uploaded_file_name;
// 
 $sql = "insert into project_1_review(user_id, lec_type,lec_title,title,content,star,review_date,attach) 
 values('$uid','$lec_type','$lec_title','$title','$content',$radio,now(),'$fileName')";
$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('���� �ıⰡ ��ϵǾ����ϴ�.');location.href='04_�����ı�_����Ʈ.php'</script>";
}
else{
    echo "���� �ı� ��� ����{$sql}";
}
?>