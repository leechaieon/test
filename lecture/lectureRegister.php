<?php
// session_start();
// $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");




//   $uploaded_file_name_tmp = $_FILES['fileToUpload']['tmp_name'];
//   $uploaded_file_name = $_FILES[ 'fileToUpload' ][ 'name' ];

//   $dot = strpos($uploaded_file_name,".");
  
//   $exp = substr($uploaded_file_name,$dot+1);
  
//   $allowed_ext = array('jpg','jpeg','png','gif');
  
//   if(!in_array($exp, $allowed_ext) ){
//       echo "alert('올바르지 않은 확장자입니다.{$exp}')";
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
//      echo "<script>alert('강의 등록이 완료되었습니다.');
//      location.href='lectureList.php'</script>";
//     // echo "강의 등록이 완료되었습니다.{$locate}....{$uploaded_file_name_tmp}";
// }
// else{
//     echo "실패{$query}<script>alert('강의 등록을 실패했습니다.');
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
    echo "<p>올바르지 않은 확장자입니다.</p>.으로 나누기:{$exp}";
    exit;
}else{

$upload_folder = "lectureImg/";
move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
echo "<p>" . $uploaded_file_name . "을(를) 업로드하였습니다.</p>";
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
     echo "<script>alert('강의 등록이 완료되었습니다.');
     location.href='lectureList.php'</script>";
    // echo "강의 등록이 완료되었습니다.{$locate}....{$uploaded_file_name_tmp}";
}
else{
    echo "실패{$query}<script>alert('강의 등록을 실패했습니다.');
    </script>";
    
}
?>