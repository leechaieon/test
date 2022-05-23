<?php session_start(); 

include "header.php";

$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
$query = "select * from project_1_admin";
$result = mysqli_query($conn,$query);
$cnt = mysqli_num_rows($result);
if($cnt>0){
    
}

?>
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
<style>
    #title{text-align:center}
    #delete{color:red; margin-left:10px; font-size:12px; border:none}
    #delete:hover {cursor:pointer}
</style>
<body>
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
			<h3 class="tit-h3">강의 소개</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>강의</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">전체</a></li>
			<li><a href="#">일반직무</a></li>
			<li><a href="#">산업직무</a></li>
			<li><a href="#">공통역량</a></li>
			<li><a href="#">어학 및 자격증</a></li>
		</ul>

		<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">분류</option>
				</select>
				<select class="input-sel" style="width:158px">
					<option value="">강의명</option>
					<option value="">작성자</option>
				</select>
				<input type="text" class="input-text" placeholder="강의명을 입력하세요." style="width:158px"/>
				<button type="button" class="btn-s-dark">검색</button>
			</div>
		</div>
  
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">강의 목록</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:23%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">분류</th>
					<th scope="col">제목</th>
					<th scope="col">강의기간</th>
					<th scope="col">선생님</th>
				</tr>
			</thead>
	 
			<tbody>
				<!-- set -->
                <?php
                $no = $_GET["no"];
                  $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
                  $query = "select * from project_1_admin where no={$no}";
                  $result = mysqli_query($conn,$query);
                  $cnt = mysqli_num_rows($result);
                  if($cnt==0){ 
                      ?>                     
                      <tr ><td colspan="4">강의를 불러올 수 없습니다.</td>
                  </tr>
               <?php
                 }else{
                     
                    while($row= mysqli_fetch_array($result)){
                        $teacher = iconv("utf-8","euc-kr",$row["teacher"]);
                        $title = iconv("utf-8","euc-kr",$row["title"]);
                        $level = iconv("utf-8","euc-kr",$row["level"]);
                        $no = iconv("utf-8","euc-kr",$row["no"]);
                        $period = iconv("utf-8","euc-kr",$row["period"]);
                        $type = iconv("utf-8","euc-kr",$row["type"]);
                        $thumbnail = $row["thumbnail"];
                        $startDate = iconv("utf-8","euc-kr",$row["start_date"]);
                        $endDate = iconv("utf-8","euc-kr",$row["end_date"]);
                        
               ?>
               <form action="lectureModify.php" method="post" name="form"enctype="multipart/form-data" onsubmit="return submitForm();" accept-charset="utf-8">
		<table border="0" id="table">
            <tr>
                <input type="hidden" value="<?php echo"{$no}";  ?>" name="no">
                <td>이미지 첨부</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo"{$thumbnail}";  ?>"></td>
            </tr>
			<tr>
                <td>강사 이름</td>
                <td><input type="text" name="teacher" width="150px"  value=<?php echo"{$teacher}";  ?>></td>
            </tr>
            <tr>    
                <td>강의 분류</td>
                
                <td>
                    <div class="box-input">
                               
									<label class="input-sp">
										<input type="radio" name="kind" id="general" value="general"  <?php if($type=="general"){ ?> checked <?php }?>/>
										<span class="input-txt">일반직무</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="industry" value="industry" <?php if($type=="industry"){ ?> checked <?php }?>/>
										<span class="input-txt">산업직무</span>
									</label>
                                    <label class="input-sp">
										<input type="radio" name="kind" id="common" value="common" <?php if($type=="common"){ ?> checked <?php }?>/>
										<span class="input-txt">공통역량</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="language" value="language" <?php if($type=="language"){ ?> checked <?php }?>/>
										<span class="input-txt">어학 및 자격증</span>
									</label>
                </div>
                </td>
            </tr>
            <tr>
                <td>강의 제목</td>
                <td><input type="text" name="title" value="<?php echo"{$title}";  ?>"></td>
            </tr>
            <tr>   
                <td>강의 기간</td>
                <td><input type="date" name="startDate" value="<?php echo"{$startDate}";  ?>">~
                <input type="date" name="endDate"value="<?php echo"{$endDate}";  ?>"></td>
            </tr>
            <tr>    
                <td>강의 난이도</td>
                <td><input type="text" name="level" value="<?php echo"{$level}";  ?>"></td>
            </tr>
		</table>
        날짜<input type="text" value="<?php echo"{$startDate}";  ?>"><br /><br />
        <button onclick="reallyDelete()">삭제하기</button>              
        <!-- <a href="deleteLecture.php?no='<?php echo"{$no}";  ?>'" id="delete">삭제하기</a> -->
				<!-- //set -->
            <?php
                 }}
            ?>
			</tbody>
		</table>
        <input type="hidden" value="<?php echo"{$no}";  ?>">
        <input type="submit" value="수정하기">
        </form>   
		
		<div class="box-btn t-r">
		<a href="lectureList.php">강의 목록</a>
		</div>
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

        function reallyDelete(){
            let q = confirm("정말로 삭제하시겠습니까? 모든 <<?php echo"$title" ?> >수업의 모든 정보가 삭제됩니다.");
            if(q==true){
                location.href="deleteLecture.php?no='<?php echo"{$no}";  ?>'";
            }else if(q==false){
                location.href="lectureList.php";
            }
        }
        
</script>
</body>
</html>
