<?php 
session_start();
include "header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
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
<style>
	
	#length_check{width:30%;}
	#box-btn{margin-right:20%}
</style>
<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
<script type="text/javascript" src="se2/js/service/HuskyEZCreator.js" charset="EUC-KR"></script>
<script type="text/javascript">
		var oEditors = [];
$(function(){nhn.husky.EZCreator.createInIFrame({
 oAppRef: oEditors,
 elPlaceHolder: "ir1",
 sSkinURI: "se2/SmartEditor2Skin.html",
 fCreator: "createSEditor2"})

});

function submitContents(elClickedObj) {
 // �������� ������ textarea�� ����ȴ�.
 oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

 // �������� ���뿡 ���� �� ������ �̰�����
 // document.getElementById("ir1").value�� �̿��ؼ� ó���Ѵ�.

 try {
     elClickedObj.form.submit();
 } catch(e) {}
}
let common=[];
		let language=[];
		let industry=[];
		let general=[];
		<?php
			 $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
			$query="select * from project_1_admin";
			$result1 = mysqli_query($conn,$query);
			$cnt = mysqli_num_rows($result1);
								


		while($row1 = mysqli_fetch_array($result1)){
			$title= iconv("utf-8","euc-kr",$row1['title']);
			$type=$row1['type'];

		if($type=="common"){?>
		common.push('<?php echo"$title"; ?>');
		<?php } 
		 if($type=="language"){
		?>language.push('<?php echo"$title" ?>');
		<?php } 
		 if($type=="industry"){
		?>industry.push('<?php echo"$title" ?>');
		<?php } 
		if($type=="general"){
		?>general.push('<?php echo"$title" ?>');<?php }} ?>;
	
	
	
	function categoryChange(e) {
		
		var target = document.getElementById("lec_title");
		if(e.value == "common") var d = common;
		else if(e.value == "language") var d = language;
		else if(e.value == "general") var d = general;
		else if(e.value == "industry") var d = industry;
		target.options.length = 0;

		for (x in d) {
			var opt = document.createElement("option");
			opt.value = d[x];
			opt.innerHTML = d[x];
			target.appendChild(opt);
		}	
	}


		function check(){
			let title= document.getElementById("title").value;
			let type = document.getElementById("type").value;
			let content = document.getElementById("ir1").value;

			if(title==''){
				alert("������ �Է����ּ���.");
				return false;				
			}
			
			if(type==''){
				alert("���� �з��� �������ּ���.");
				return false;				
			}
			
			if(ir1==''){
				alert("�ı� ������ �ۼ����ּ���.");
				return false;				
			}
			return true;
		}

	
// 	$(document).ready(function(e){
// 		$("#ir1").on("keyup",function(){
// 			document.getElementById("notice").style.display="block";	
// 		let ir1=document.getElementById("notice").innerHTML;
// 		let length = ir1.toString().length;
// 		if(length>9){
// 			document.getElementById("notice").style.display="none";	
// 		}
		
// 	});
// });

</script>			
</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">���� �ٷΰ���</a>
</div>
<!-- //skip nav -->

<div id="wrap">

<div id="container" class="container">
<?php include "leftBox.html";?>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">�����ı�</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>�������� �ȳ�</span>
				<strong>�����ı�</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">���ǻ��� �ȳ�</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">�����ı�� ��û�Ͻ� ������ �н������� 25%�̻� �޼��� �ۼ������մϴ�. </li>
				<li>�弳(�弳�� ǥ���ϴ� ������/��ȣǥ�� ����) �� ���Ѽ�, ���,�����, ����� ������ ȫ���� �Խñ� �� ��ȸ��Կ� ���ϴ� �Խñ� �� ���ǳ���� ������� ���񽺿� ���� �ۼ��� �۵��� ���� �� �� ������, ���� å���� �� �� �ֽ��ϴ�.</li>
			</ul>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">��������</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>
<!---------------------------------------- form------------------------------------------- -->
			<tbody>
				<!-- <form action="04_�����ı�_����Ʈ.php" method="post"> -->
				<form action="reviewRegister.php" method="post" onsubmit="return check()"  enctype="multipart/form-data" accept-charset="utf-8">
				
				<tr>
					<th scope="col">����</th>
					<td>
						<select class="input-sel" id="type" name="type" class="type" style="width:160px" onchange="categoryChange(this)">
							<option value="">�з�</option>
							<option value="general">�Ϲ�����</option>
							<option value="industry">�������</option>
							<option value="common">���뿪��</option>
							<option value="language">���� �� �ڰ���</option>
						</select>

						<select class="input-sel ml5" style="width:454px" name="lec_title" id="lec_title" >
								<option value="">������ �����ϼ���</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="col">����</th>
					<td><input type="text" class="input-text" style="width:611px" name="title" id="title"/></td>
				</tr>
				<tr>
					<th scope="col">���Ǹ�����</th>
					<td>
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="100" checked="checked"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="80"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="60"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="40"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="20"/>
									<span class="input-txt">����</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
							</li>
						</ul>
					</td>
				</tr>
				<tr><td>÷������</td>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
				<input type="file" name="fileToUpload" id="fileToUpload">	</td></tr>
			</tbody>
		</table>
<!-- ----------------------------------smartEditor ------------------------------------------------->
		

	
		<textarea rows="10" cols="50" id="ir1" name="ir1"></textarea>
		<div id="notice" style="display:none; color:red"  >��10�� �̻� �Է��ϼž� �մϴ�.</div>
	</div>
</div>

<div class="box-btn t-r" id="box-btn">
	<a href="04_�����ı�_����Ʈ.php" class="btn-m-gray">���</a>
	<input type="submit" class="btn-m ml5" value="����" onclick="submitContents()">
		
</div>
</form>
		

		
	</div>
</div>
<?php
	include "footer.html";
?>
</div>
</body>
</html>
