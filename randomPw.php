<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="EUC-KR">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

<!-- xhtml property속성 벨리데이션 오류/확인필요 -->
<meta property="og:title" content="해커스 HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login페이지에만 호출 -->

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->
<style>
    button{margin-left:30%; margin-top:30px}
    #all{margin-left:10%; margin-top:10%}
</style>
</head>
<body>
    
</body>
</html>
<?php
$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");




function getRandStr($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

 $rNum = getRandStr(); 

 $hash= hash("sha256",$rNum);
 
 


$what=$_POST["what"];

if($what=="phone"){
    $phone = $_POST['num1'].$_POST['num2'].$_POST['num3'];
    $name = iconv("euc-kr","utf-8",$_POST['userName1']);
    $query = "update project_1 set user_pw='{$hash}' where user_name='{$name}' and user_phoneNumber='{$phone}'";
    // update project_1 set user_pw='{$hash}' where user_name='{$name}' and user_phoneNumber='{$phone}'
    $result_set = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result_set);
    // var_dump($result_set);
    echo "<div id='all'><i class='icon-guide'></i><p>임시 비밀번호로 로그인 후<br /> '내정보'에서 비밀번호를 수정하시길 바랍니다.</p>";
    echo "<br /><h3>임시 비밀번호: {$rNum} </h3>";
    echo "<button onClick='self.close()' class='btn-s-line'>닫기</button></div>";

    exit;
    }
else{

    $id = $_POST['userId2'];
    $mail = $_POST['email']."@".$_POST['emailSite'];
    $name = iconv("euc-kr","utf-8",$_POST['userName2']);
    $query2 = "update project_1 set user_pw='{$hash}' where user_name='{$name}' and user_id='{$id}'";
    $result_set2 = mysqli_query($conn, $query2);
    echo "<div id='all'><i class='icon-guide'></i><p>임시 비밀번호로 로그인 후<br /> '내정보'에서 비밀번호를 수정하시길 바랍니다.</p>";
    echo "<br /><h3>임시 비밀번호: {$rNum} </h3>";
    echo "<button onClick='self.close()' class='btn-s-line'>닫기</button></div>";
    exit;
}    

    
mysqli_close($conn);   
 ?>