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
<script>
     function ban(){
        if(form.admin.value==''){
            alert("����� ������ ���� �������Դϴ�.");
            location.href='04_�����ı�_����Ʈ.php';

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
<a href="#content">���� �ٷΰ���</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	
<div id="container" class="container">
<?php include "leftBox.html";?>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">���� ���</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<strong>���� ���</strong>
			</div>
		</div>
    <form action="lectureRegister.php" method="post" name="form" enctype="multipart/form-data" onsubmit="return submitForm();" accept-charset="utf-8">
	<input type="hidden" name="MAX_FILE_SIZE" value="4000000" />	
    <table border="0" id="table">
            <tr>
                <td>�̹��� ÷��</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>
			<tr>
                <td>���� �̸�</td>
                <td><input type="text" name="teacher" width="150px"></td>
            </tr>
            <tr>    
                <td>���� �з�</td>
                
                <td>
                    <div class="box-input">
									<label class="input-sp">
										<input type="radio" name="kind" id="general" value="general" checked="checked"/>
										<span class="input-txt">�Ϲ�����</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="industry" value="industry"/>
										<span class="input-txt">�������</span>
									</label>
                                    <label class="input-sp">
										<input type="radio" name="kind" id="common" value="common"/>
										<span class="input-txt">���뿪��</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="language" value="language"/>
										<span class="input-txt">���� �� �ڰ���</span>
									</label>
                </div>
                </td>
            </tr>
            <tr>
                <td>���� ����</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>   
                <td>���� �Ⱓ</td>
                <td><input type="date" name="startDate">~<input type="date" name="endDate"></td>
            </tr>
            <tr>    
                <td>���� ���̵�</td>
                <td><input type="text" name="level"></td>
            </tr>
		</table>
        <?php
          $admin = $_SESSION['admin'];
        ?>
   <input type="hidden" value="<?php echo"$admin" ?>" name="admin">      
  <input type="submit" value="���� ���" name="submit" >
     </form>	
		<br />
        <a href="lectureList.php" style="color:blue">���� ��� �ٷΰ���</a>
	
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
                alert("������ �̸��� �����ϼ���.");
                return false;
            }
            if(tit==''){
                alert("���� ������ �����ϼ���.");
                return false;
            }
            if(s==''||e==''){
                alert("���� �Ⱓ�� �����ϼ���.");
                return false;  
            }
            if(level==''){
                alert("���� ������ �����ϼ���.");
                return false;
            }
          
            if(!img){
                alert("�̹��� ���� ������ �ùٸ��� �ʽ��ϴ�.");
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
