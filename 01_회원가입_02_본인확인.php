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
				<h3 class="tit-h3">ȸ������</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>Ȩ</span></i></span>
					<strong>ȸ������ �Ϸ�</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> �������</li>
					<li class="on"><i class="icon-join-chk"></i> ����Ȯ��</li>
					<li class="last"><i class="icon-join-inp"></i> �����Է�</li>
				</ul>
			</div>

			<div class="tit-box-h4">
				<h3 class="tit-h4">��������</h3>
			</div>

			<div class="section-content after">
				<div class="identify-box" style="width:100%;height:190px;">
					<div class="identify-inner">
						<strong>�޴��� ����</strong>
						<p>�ֹι�ȣ ���� �޽��� ���Ű����� �޴������� 1�� ���̵� ȸ�������� �����մϴ�. </p>

						<br />
						
						<input type="text" class="input-text" style="width:50px" id="num1"/> - 
						<input type="text" class="input-text" style="width:50px" id="num2"/> - 
						<input type="text" class="input-text" style="width:50px" id="num3"/>
						<button class="btn-s-line" onclick="chkNum()">������ȣ �ޱ�</button>
						
						<br /><br />
						<form method="post" action="01_ȸ������_03_�����Է�.php" onsubmit="return confirm()" name="form">	
						<input type="text" class="input-text" style="width:200px" id="message"/>
						<input type="hidden" value="" id="phoneNumber" name="phoneNumber">
						<input type="submit" class="btn-s-line" ></button>
					</form>

					</div>
					<i class="graphic-phon"><span>�޴��� ����</span></i>
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
		let pattern1 = /[0-9]/; //����
		let pattern2 = /[a-zA-Z]/; //����
		let pattern3 = /[��-��|��-��|��-�R]/; //�ѱ�
		let pattern4 = /[~!@#\#$%<>^&*]/; //Ư������


		let num1 = document.getElementById("num1").value;
		let num2 = document.getElementById("num2").value;
		let num3 = document.getElementById("num3").value;
		let phoneNum = num1+num2+num3;

		if(pattern2.test(phoneNum)||pattern3.test(phoneNum)||pattern4.test(phoneNum)){
			alert("�޴��� ��ȣ�� ���ڰ� �ƴ� ���ڰ� ���ԵǾ� �ֽ��ϴ�.");
		}
		else if(num1.length!==3||num2.length!==4||num3.length!==4){
			alert("�޴��� ��ȣ�� ��Ȯ�ϰ� �Է��ϼ���");
		}
		
		else{
			sendMsg= sendMsg+1;
			alert("������ȣ�� ���۵Ǿ����ϴ�.")
		}
	}  

	function confirm(){
	
		let num1 = document.getElementById("num1").value;
		let num2 = document.getElementById("num2").value;
		let num3 = document.getElementById("num3").value;
		
		let num="123456";
		
		if(num1.length!==3||num2.length!==4||num3.length!==4){
			alert("�޴��� ��ȣ�� ��Ȯ�ϰ� �Է��ϼ���");
			return false;
		}
		if(sendMsg<1){
			alert("������ȣ �ޱ⸦ ��������");
			return false;
		}

		else{
			if(document.getElementById("message").value==num){
				alert("�����Ǿ����ϴ�.")
				let phoneNumber=num1+num2+num3;
				document.getElementById("phoneNumber").value=phoneNumber;
				return true;
		}
			else{
				alert("������ȣ�� Ʋ�Ƚ��ϴ�.")
				return false;
			}
		}

	}
</script>



</body>
</html>
