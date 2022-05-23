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
 // 에디터의 내용이 textarea에 적용된다.
 oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

 // 에디터의 내용에 대한 값 검증은 이곳에서
 // document.getElementById("ir1").value를 이용해서 처리한다.

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
				alert("제목을 입력해주세요.");
				return false;				
			}
			
			if(type==''){
				alert("강의 분류를 선택해주세요.");
				return false;				
			}
			
			if(ir1==''){
				alert("후기 내용을 작성해주세요.");
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
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">

<div id="container" class="container">
<?php include "leftBox.html";?>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">유의사항 안내</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">수강후기는 신청하신 강의의 학습진도율 25%이상 달성시 작성가능합니다. </li>
				<li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.</li>
			</ul>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>
<!---------------------------------------- form------------------------------------------- -->
			<tbody>
				<!-- <form action="04_수강후기_리스트.php" method="post"> -->
				<form action="reviewRegister.php" method="post" onsubmit="return check()"  enctype="multipart/form-data" accept-charset="utf-8">
				
				<tr>
					<th scope="col">강의</th>
					<td>
						<select class="input-sel" id="type" name="type" class="type" style="width:160px" onchange="categoryChange(this)">
							<option value="">분류</option>
							<option value="general">일반직무</option>
							<option value="industry">산업직무</option>
							<option value="common">공통역량</option>
							<option value="language">어학 및 자격증</option>
						</select>

						<select class="input-sel ml5" style="width:454px" name="lec_title" id="lec_title" >
								<option value="">수업을 선택하세요</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="col">제목</th>
					<td><input type="text" class="input-text" style="width:611px" name="title" id="title"/></td>
				</tr>
				<tr>
					<th scope="col">강의만족도</th>
					<td>
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="100" checked="checked"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="80"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="60"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="40"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
							</li>
							<li>
								<label class="input-sp ico">
									<input type="radio" name="radio" id="" value="20"/>
									<span class="input-txt">만점</span>
								</label>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
							</li>
						</ul>
					</td>
				</tr>
				<tr><td>첨부파일</td>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="4000000" />
				<input type="file" name="fileToUpload" id="fileToUpload">	</td></tr>
			</tbody>
		</table>
<!-- ----------------------------------smartEditor ------------------------------------------------->
		

	
		<textarea rows="10" cols="50" id="ir1" name="ir1"></textarea>
		<div id="notice" style="display:none; color:red"  >※10자 이상 입력하셔야 합니다.</div>
	</div>
</div>

<div class="box-btn t-r" id="box-btn">
	<a href="04_수강후기_리스트.php" class="btn-m-gray">목록</a>
	<input type="submit" class="btn-m ml5" value="저장" onclick="submitContents()">
		
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
