<?php 
session_start();
include "header.php"; ?>
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
<script>
     function ban(){
        if(form.admin.value==''){
            alert("사용자 권한이 없는 페이지입니다.");
            location.href='04_수강후기_리스트.php';

        }}

</script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

<style>
   .btn-3{margin-left:80px; margin-top:20px} 

</style>
</head>
<body onload="ban()">
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
			<h3 class="tit-h3">강의 등록</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<strong>강의 등록</strong>
			</div>
		</div>
    <form action="lectureRegister.php" method="post" name="form" enctype="multipart/form-data" onsubmit="return submitForm();" accept-charset="utf-8">
	<input type="hidden" name="MAX_FILE_SIZE" value="4000000" />	
    <table border="0" id="table">
            <tr>
                <td>이미지 첨부</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>
			<tr>
                <td>강사 이름</td>
                <td><input type="text" name="teacher" width="150px"></td>
            </tr>
            <tr>    
                <td>강의 분류</td>
                
                <td>
                    <div class="box-input">
									<label class="input-sp">
										<input type="radio" name="kind" id="general" value="general" checked="checked"/>
										<span class="input-txt">일반직무</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="industry" value="industry"/>
										<span class="input-txt">산업직무</span>
									</label>
                                    <label class="input-sp">
										<input type="radio" name="kind" id="common" value="common"/>
										<span class="input-txt">공통역량</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="language" value="language"/>
										<span class="input-txt">어학 및 자격증</span>
									</label>
                </div>
                </td>
            </tr>
            <tr>
                <td>강의 제목</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>   
                <td>강의 기간</td>
                <td><input type="date" name="startDate">~<input type="date" name="endDate"></td>
            </tr>
            <tr>    
                <td>강의 난이도</td>
                <td><input type="text" name="level"></td>
            </tr>
		</table>
        <?php
          $admin = $_SESSION['admin'];
        ?>
   <input type="hidden" value="<?php echo"$admin" ?>" name="admin">      
  <input type="submit" value="강의 등록" name="submit" >
     </form>	
		<br />
        <a href="lectureList.php" style="color:blue">강의 목록 바로가기</a>
	
	</div>
</div>
<?php
	include "footer.html";
?>
</div>
    <script>
       

        function submitForm(){
            let tea =form.teacher.value;
            let tit = form.title.value;
            let start = form.startDate.value;
            let end = form.endDate.value;
            let type = form.kind.value;
            let level = form.level.value;
            let admin = form.admin.value; 
            let img = form.fileToUpload.value;
            if(tea==''){
                alert("선생님 이름을 기입하세요.");
                return false;
            }
            if(tit==''){
                alert("강의 제목을 기입하세요.");
                return false;
            }
            if(s==''||e==''){
                alert("강의 기간을 기입하세요.");
                return false;  
            }
            if(level==''){
                alert("강의 수준을 기입하세요.");
                return false;
            }
          
            if(!img){
                alert("이미지 파일 형식이 올바르지 않습니다.");
                return false;
            }
            return true;
        }

        // function testImg(fileName){
        //     let fileName ="good.html";
        //     let dot = fileName.lastIndexOf(".");
        //     let ext = fileName.substr(dot+1,fileName.length);
        //     let ok = ["png","jpeg","gif","jpg","bmp"];
        //     for(let i=0;i<5;i++){
        //        if(ok[i]==ext)return true;
        //     }
        //     return false;

        // }

    </script>
</body>
</html>
