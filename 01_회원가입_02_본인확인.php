<?php include "header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>해커스 HRD</title>
<meta name="description" content="해커스 HRD" />
<meta name="keywords" content="해커스, HRD" />

<!-- 파비콘설정 -->
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

</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입 완료</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li class="on"><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">본인인증</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>휴대폰 인증</strong>
						<p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

						<br />
						
						<input type="text" class="input-text" style="width:50px" id="num1"/> - 
						<input type="text" class="input-text" style="width:50px" id="num2"/> - 
						<input type="text" class="input-text" style="width:50px" id="num3"/>
						<button class="btn-s-line" onclick="chkNum()">인증번호 받기</button>
						
						<br /><br />
						<form method="post" action="01_회원가입_03_정보입력.php" onsubmit="return confirm()" name="form">	
						<input type="text" class="input-text" style="width:200px" id="message"/>
						<input type="hidden" value="" id="phoneNumber" name="phoneNumber">
						<input type="submit" class="btn-s-line" ></button>
					</form>

					</div>
					<i class="graphic-phon"><span>휴대폰 인증</span></i>
				</div>
			</div>

		</div>
	</div>
</div>

<?php include "footer.html"; ?>
</div>

<script>
	let sendMsg=0;
	function chkNum(){
		let pattern1 = /[0-9]/; //숫자
		let pattern2 = /[a-zA-Z]/; //영어
		let pattern3 = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/; //한글
		let pattern4 = /[~!@#\#$%<>^&*]/; //특수문자


		let num1 = document.getElementById("num1").value;
		let num2 = document.getElementById("num2").value;
		let num3 = document.getElementById("num3").value;
		let phoneNum = num1+num2+num3;

		if(pattern2.test(phoneNum)||pattern3.test(phoneNum)||pattern4.test(phoneNum)){
			alert("휴대폰 번호에 숫자가 아닌 문자가 포함되어 있습니다.");
		}
		else if(num1.length!==3||num2.length!==4||num3.length!==4){
			alert("휴대폰 번호를 정확하게 입력하세요");
		}
		
		else{
			sendMsg= sendMsg+1;
			alert("인증번호가 전송되었습니다.")
		}
	}  

	function confirm(){
	
		let num1 = document.getElementById("num1").value;
		let num2 = document.getElementById("num2").value;
		let num3 = document.getElementById("num3").value;
		
		let num="123456";
		
		if(num1.length!==3||num2.length!==4||num3.length!==4){
			alert("휴대폰 번호를 정확하게 입력하세요");
			return false;
		}
		if(sendMsg<1){
			alert("인증번호 받기를 누르세요");
			return false;
		}

		else{
			if(document.getElementById("message").value==num){
				alert("인증되었습니다.")
				let phoneNumber=num1+num2+num3;
				document.getElementById("phoneNumber").value=phoneNumber;
				return true;
		}
			else{
				alert("인증번호가 틀렸습니다.")
				return false;
			}
		}

	}
</script>



</body>
</html>
