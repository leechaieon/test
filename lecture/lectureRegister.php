<?php
// session_start();
// $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");




//   $uploaded_file_name_tmp = $_FILES['fileToUpload']['tmp_name'];
//   $uploaded_file_name = $_FILES[ 'fileToUpload' ][ 'name' ];

//   $dot = strpos($uploaded_file_name,".");
  
//   $exp = substr($uploaded_file_name,$dot+1);
  
//   $allowed_ext = array('jpg','jpeg','png','gif');
  
//   if(!in_array($exp, $allowed_ext) ){
//       echo "alert('�ùٸ��� ���� Ȯ�����Դϴ�.{$exp}')";
//       exit;
//   }else{

//   $upload_folder = "lectureImg";
//   $locate = $upload_folder."/".$fileName;
//   move_uploaded_file( $uploaded_file_name_tmp, $locate );
 
//   }


// $uid=$_SESSION['id'];
// $type=iconv("euc-kr","utf-8",$_POST['kind']);
// $title=iconv("euc-kr","utf-8",$_POST['title']);
// $teacher=iconv("euc-kr","utf-8",$_POST['teacher']);
// $level=iconv("euc-kr","utf-8",$_POST['level']);
// $start=iconv("euc-kr","utf-8",$_POST['startDate']);
// $end=iconv("euc-kr","utf-8",$_POST['endDate']);
// $query ="insert into project_1_admin(type,title,teacher,level,start_date,end_date,id,thumbnail)
//  values('{$type}','{$title}','{$teacher}','{$level}','{$start}','{$end}','{$uid}','{$fileName}')";

//  $result = mysqli_query($conn,$query);
// if($result){
//      echo "<script>alert('���� ����� �Ϸ�Ǿ����ϴ�.');
//      location.href='lectureList.php'</script>";
//     // echo "���� ����� �Ϸ�Ǿ����ϴ�.{$locate}....{$uploaded_file_name_tmp}";
// }
// else{
//     echo "����{$query}<script>alert('���� ����� �����߽��ϴ�.');
//     </script>";
//     history.back();
// }

session_start();
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");



$uploaded_file_name_tmp = $_FILES[ 'fileToUpload' ][ 'tmp_name' ];
$uploaded_file_name = $_FILES[ 'fileToUpload' ][ 'name' ];
$dot = strpos($uploaded_file_name,".");
$exp = substr($uploaded_file_name,$dot+1);
$allowed_ext = array('jpg','jpeg','png','gif');
if(!in_array($exp, $allowed_ext) ){
    echo "<p>�ùٸ��� ���� Ȯ�����Դϴ�.</p>.���� ������:{$exp}";
    exit;
}else{

$upload_folder = "lectureImg/";
move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
echo "<p>" . $uploaded_file_name . "��(��) ���ε��Ͽ����ϴ�.</p>";
}


$uid=$_SESSION['id'];
$type=$_POST['kind'];
$title=$_POST['title'];
$teacher=$_POST['teacher'];
$level=$_POST['level'];
$start=$_POST['startDate'];
$end=$_POST['endDate'];
$thumbnail = $uploaded_file_name;
$query ="insert into project_1_admin(type,title,teacher,level,start_date,end_date,id,thumbnail)
 values('{$type}','{$title}','{$teacher}','{$level}','{$start}','{$end}','{$uid}','{$thumbnail}')";

 $result = mysqli_query($conn,$query);
if($result){
     echo "<script>alert('���� ����� �Ϸ�Ǿ����ϴ�.');
     location.href='lectureList.php'</script>";
    // echo "���� ����� �Ϸ�Ǿ����ϴ�.{$locate}....{$uploaded_file_name_tmp}";
}
else{
    echo "����{$query}<script>alert('���� ����� �����߽��ϴ�.');
    </script>";
    
}
?>