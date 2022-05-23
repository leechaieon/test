<?php
  session_start();
  
include "header.php";
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
.pager{margin-left:30%; margin-top:50px}
a{padding:0}

</style>
</head>
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
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">전체</a></li>
			<li><a href="reviewList.php?type='general'">일반직무</a></li>
			<li><a href="reviewList.php?type='industry'">산업직무</a></li>
			<li><a href="reviewList.php?type='common'">공통역량</a></li>
			<li><a href="reviewList.php?type='language'">어학 및 자격증</a></li>
		</ul>

		<div class="search-info">
			
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">분류</option>
				</select>
				<select class="input-sel" style="width:158px" id="sep">
					<option value="lec_title">강의명</option>
					<option value="writer">작성자</option>
				</select>
				<input type="text" class="input-text" id="keyword" name="keyword" placeholder="검색어를 입력하세요." style="width:158px"/>
				<button type="button" onclick="search()"class="btn-s-dark">검색</button>
			</div>
			
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">분류</th>
					<th scope="col">제목</th>
					<th scope="col">강좌만족도</th>
					<th scope="col">작성자</th>
				</tr>
			</thead>
            <?php
            $sep = $_POST["sep"];    
		    $keyword = iconv("euc-kr","utf-8",$_POST["keyword"]);
            $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
            if($sep=="lec_title"){
            $sql = "select * from project_1_review where lec_title like '%{$keyword}%'";
            $sql2 = "select * from project_1_review where lec_title like '%{$keyword}% limit $start, $list_num;";}
            else{$sql= "select * from project_1_review where user_id like '%{$keyword}%'";
            $sql2 = "select * from project_1_review where user_id like '%{$keyword}%' limit $start, $list_num;";}
            $result= mysqli_query($conn,$sql);
            $result2=mysqli_query($conn,$sql2);
			$cnt = mysqli_num_rows($result);
			$list_num = 20;?>
			
            <tbody id="tbody">	
               	
	<?php
  		 if($cnt==0){?>
	   
	   		<td colspan="5" style="color:blue">검색 결과가 없습니다.</td>
	
		<?php
			}else{
			
			while($row = mysqli_fetch_array($result)){
			$no = $row['no'];
			$write=$row['user_id'];
			 $length=strlen($write);
		 	$writer = substr($write,0,$length-2)."**";
			$lec_type = iconv("utf-8","euc-kr",$row['lec_type']);
			$lec_title = iconv("utf-8","euc-kr",$row['lec_title']);
			$title = iconv("utf-8","euc-kr",$row['title']);
			$content = iconv("utf-8","euc-kr",$row['content']);
			$star = $row['star'];
			$hit = $row['hit'];
			?>
            <tr class="bbs-sbj">
					<td><?php echo "{$no}";?></td>
					<td><?php echo "{$lec_type}";?></td>
					<td>
					<a href="04_수강후기_상세.php?no='<?php echo "$no"?>'&lec_title=<?php echo "$lec_title"?>">
							<span class="tc-gray ellipsis_line">수강 강의명 :<?php echo "{$lec_title}";?></span>
							<strong class="ellipsis_line"><?php echo "{$title}";?></strong>
						</a>
					</td>
					<td>
						<span class="star-rating">
							<span class="star-inner" style="width:<?php echo "{$star}";?>%"></span>
						</span>
					</td>
					<td class="last"><?php echo "{$writer}";?></td>
				</tr>
				
			   

				
				
				<?php
				  }}
				?>
		
                </div>
		
			
			</tbody>
		</table>
		
<?php
	include "footer.html";
?>

<script type="text/javascript" src="jquery-3.6.0.min.js"></script>   
<script>
     function search(){  //button id 값을 설정하고 누르면 클릭이벤트 발생
    let sep = document.getElementById("sep").value;
    let keyword = document.getElementById("keyword").value; 
    $.ajax({
        type :"POST",                //post타입으로 데이터 보냄
        url : "searchReviewBack.php",      //값을 전달할 url
        async : true,                
               
        data : {"sep":sep, "keyword":keyword},                  //변수 설정해놓은 data 값 사용
        success : function(data){    //데이터값이 제대로 전달 됐으면 result에 출력 해준다
            $('#tbody').html(data);
            
        }
    });
  
};
  
</script>
</body>
</html>
