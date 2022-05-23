<?php include "header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>ÇØÄ¿½º HRD</title>
<meta name="description" content="ÇØÄ¿½º HRD" />
<meta name="keywords" content="ÇØÄ¿½º, HRD" />

<!-- ÆÄºñÄÜ¼³Á¤ -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

<!-- xhtml property¼Ó¼º º§¸®µ¥ÀÌ¼Ç ¿À·ù/È®ÀÎÇÊ¿ä -->
<meta property="og:title" content="ÇØÄ¿½º HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- mainÆäÀÌÁö¿¡¸¸ È£Ãâ -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- subÆäÀÌÁö¿¡¸¸ È£Ãâ -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- loginÆäÀÌÁö¿¡¸¸ È£Ãâ -->

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">º»¹® ¹Ù·Î°¡±â</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">È¸¿ø°¡ÀÔ</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>È¨</span></i></span>
					<strong>È¸¿ø°¡ÀÔ ¿Ï·á</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> ¾à°üµ¿ÀÇ</li>
					<li class="on"><i class="icon-join-chk"></i> º»ÀÎÈ®ÀÎ</li>
					<li class="last"><i class="icon-join-inp"></i> Á¤º¸ÀÔ·Â</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">º»ÀÎÀÎÁõ</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>ÈŞ´ëÆù ÀÎÁõ</strong>
						<p>ÁÖ¹Î¹øÈ£ ¾øÀÌ ¸Ş½ÃÁö ¼ö½Å°¡´ÉÇÑ ÈŞ´ëÆùÀ¸·Î 1°³ ¾ÆÀÌµğ¸¸ È¸¿ø°¡ÀÔÀÌ °¡´ÉÇÕ´Ï´Ù. </p>

						<br />
						
						<input type="text" class="input-text" style="width:50px" id="num1"/> - 
						<input type="text" class="input-text" style="width:50px" id="num2"/> - 
						<input type="text" class="input-text" style="width:50px" id="num3"/>
						<button class="btn-s-line" onclick="chkNum()">ÀÎÁõ¹øÈ£ ¹Ş±â</button>
						
						<br /><br />
						<form method="post" action="01_È¸¿ø°¡ÀÔ_03_Á¤º¸ÀÔ·Â.php" onsubmit="return confirm()" name="form">	
						<input type="text" class="input-text" style="width:200px" id="message"/>
						<input type="hidden" value="" id="phoneNumber" name="phoneNumber">
						<input type="submit" class="btn-s-line" ></button>
					</form>

					</div>
					<i class="graphic-phon"><span>ÈŞ´ëÆù ÀÎÁõ</span></i>
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
		let pattern1 = /[0-9]/; //¼ıÀÚ
		let pattern2 = /[a-zA-Z]/; //¿µ¾î
		let pattern3 = /[¤¡-¤¾|¤¿-¤Ó|°¡-ÆR]/; //ÇÑ±Û
		let pattern4 = /[~!@#\#$%<>^&*]/; //Æ¯¼ö¹®ÀÚ


		let num1 = document.getElementById("num1").value;
		let num2 = document.getElementById("num2").value;
		let num3 = document.getElementById("num3").value;
		let phoneNum = num1+num2+num3;

		if(pattern2.test(phoneNum)||pattern3.test(phoneNum)||pattern4.test(phoneNum)){
			alert("ÈŞ´ëÆù ¹øÈ£¿¡ ¼ıÀÚ°¡ ¾Æ´Ñ ¹®ÀÚ°¡ Æ÷ÇÔµÇ¾î ÀÖ½À´Ï´Ù.");
		}
		else if(num1.length!==3||num2.length!==4||num3.length!==4){
			alert("ÈŞ´ëÆù ¹øÈ£¸¦ Á¤È®ÇÏ°Ô ÀÔ·ÂÇÏ¼¼¿ä");
		}
		
		else{
			sendMsg= sendMsg+1;
			alert("ÀÎÁõ¹øÈ£°¡ Àü¼ÛµÇ¾ú½À´Ï´Ù.")
		}
	}  

	function confirm(){
	
		let num1 = document.getElementById("num1").value;
		let num2 = document.getElementById("num2").value;
		let num3 = document.getElementById("num3").value;
		
		let num="123456";
		
		if(num1.length!==3||num2.length!==4||num3.length!==4){
			alert("ÈŞ´ëÆù ¹øÈ£¸¦ Á¤È®ÇÏ°Ô ÀÔ·ÂÇÏ¼¼¿ä");
			return false;
		}
		if(sendMsg<1){
			alert("ÀÎÁõ¹øÈ£ ¹Ş±â¸¦ ´©¸£¼¼¿ä");
			return false;
		}

		else{
			if(document.getElementById("message").value==num){
				alert("ÀÎÁõµÇ¾ú½À´Ï´Ù.")
				let phoneNumber=num1+num2+num3;
				document.getElementById("phoneNumber").value=phoneNumber;
				return true;
		}
			else{
				alert("ÀÎÁõ¹øÈ£°¡ Æ²·È½À´Ï´Ù.")
				return false;
			}
		}

	}
</script>



</body>
</html>
