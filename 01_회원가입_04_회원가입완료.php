<?php include "header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>��Ŀ�� HRD</title>
<meta name="description" content="��Ŀ�� HRD" />
<meta name="keywords" content="��Ŀ��, HRD" />

<!-- �ĺ��ܼ��� -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

<!-- xhtml property�Ӽ� �������̼� ����/Ȯ���ʿ� -->
<meta property="og:title" content="��Ŀ�� HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main���������� ȣ�� -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub���������� ȣ�� -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login���������� ȣ�� -->

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">���� �ٷΰ���</a>
</div>
<!-- //skip nav -->

<div id="wrap">

<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">ȸ������ �Ϸ�</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>Ȩ</span></i></span>
					<strong>ȸ������ �Ϸ�</strong>
				</div>
			</div>

			<div class="guide-box">
				<i class="graphic-join"></i>
				<p class="big-title">��Ŀ��HRD ȸ���� �ǽŰ��� ȯ���մϴ�!</p>
				<p class="mt10">��Ŀ������ �����ϴ� �پ��� �������� ��������!<br/>��Ŀ���� ������ �������� ��ǥ�޼��� �����մϴ�.</p>
			</div>

			<div class="box-btn mt30">
				<a href="00_�α���.html" class="btn-l">�α���</a>
				<a href="#" class="btn-l-line ml5">������û</a>
			</div>
			
		</div>
	</div>
</div>
<?php include "footer.html"; ?>
</div>

<?php
include "password.php";
$uid=iconv("euc-kr","utf-8",$_POST["userId"]);
$userName=iconv("euc-kr","utf-8",$_POST["userName"]);
$userPw=$_POST["userPassword1"];
$email=iconv("euc-kr","utf-8",$_POST["userMail1"]."@".$_POST["userMail2"]);
$postcode=iconv("euc-kr","utf-8",$_POST["sample6_postcode"]);
$address=iconv("euc-kr","utf-8",$_POST["sample6_address"]);
$detailaddress=iconv("euc-kr","utf-8",$_POST["sample6_detailAddress"]);
$phone=iconv("euc-kr","utf-8",$_POST["phoneNum1"].$_POST["phoneNum2"].$_POST["phoneNum3"]);
$telephone=iconv("euc-kr","utf-8",$_POST["userTel1"].$_POST["userTel2"].$_POST["userTel3"]);
$sms= iconv("euc-kr","utf-8",$_POST["radio"]);
$mail=iconv("euc-kr","utf-8",$_POST["radio2"]);
 ///��й�ȣ ��ȣȭ

$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");


$hash=hash("sha256",$userPw);
  $select_query = "insert into project_1(user_name, user_id,user_pw,user_email,user_phoneNumber,
  user_telephone,user_postcode,user_address,user_detailaddress,sms_receive,mail_receive) 
  values ('{$userName}','{$uid}','{$hash}',
  '{$email}','{$phone}','{$telephone}','{$postcode}','{$address}','{$detailaddress}','{$sms}','{$mail}'
  )";
  $result_set = mysqli_query($conn, $select_query);

  mysqli_close($conn);
  ?>




</body>
</html>
