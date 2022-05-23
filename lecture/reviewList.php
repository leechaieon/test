<?php session_start(); 



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
<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
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
<?php include "leftBox.html";
    $type=$_GET["type"];
  
?>
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
			<li ><a href="04_수강후기_리스트.php">전체</a></li>
			<li id="general"><a href="reviewList.php?type='general'">일반직무</a></li>
			<li id="industry"><a href="reviewList.php?type='industry'">산업직무</a></li>
			<li id="common"><a href="reviewList.php?type='common'">공통역량</a></li>
			<li id="language"><a href="reviewList.php?type='language'">어학 및 자격증</a></li>
			<input type="hidden" value="<?php echo "$type"?>" id="theType">
		</ul>

		<div class="search-info">
			<form action="searchReview.php" method="post">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">분류</option>
				</select>
				<select class="input-sel" style="width:158px" name="sep">
					<option value="lec_title">강의명</option>
					<option value="writer">작성자</option>
				</select>
				<input type="text" class="input-text" name="keyword" placeholder="검색어를 입력하세요." style="width:158px"/>
				<input type="submit" class="btn-s-dark"></button>
			</div>
			</form>
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
	 
			<tbody>

				
				<?php
              
			$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
			$query = "select * from project_1_review where lec_type={$type} order by no desc";
			$result = mysqli_query($conn,$query);
			$cnt = mysqli_num_rows($result);
			$list_num = 20;

				/* paging : 한 블럭 당 페이지 수 */
				$page_num = 3;

				/* paging : 현재 페이지 */
				$page = isset($_GET["page"])? $_GET["page"] : 1;

				/* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값, floor : 내림값, round : 반올림 */
				$total_page = ceil($cnt / $list_num);
				// echo "전체 페이지 수 : ".$total_page;

				/* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
				$total_block = ceil($total_page / $page_num);

				/* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
				$now_block = ceil($page / $page_num);

				/* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
				$s_pageNum = ($now_block - 1) * $page_num + 1;
				// 데이터가 0개인 경우
				if($s_pageNum <= 0){
					$s_pageNum = 1;
				};

				/* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
				$e_pageNum = $now_block * $page_num;
				// 마지막 번호가 전체 페이지 수를 넘지 않도록
				if($e_pageNum > $total_page){
					$e_pageNum = $total_page;
				};



				/* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */
				$start = ($page - 1) * $list_num;

				/* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
				$sql2 = "select * from project_1_review where lec_type={$type} order by no desc limit $start, $list_num ;";

				/* paging : 쿼리 전송 */
				$pagingSql = mysqli_query($conn, $sql2);
	
				/* paging : 글번호 */
				$cnt = $start + 1;


   if($cnt==0){
	   ?>
	   <tr class="bbs-sbj">
					<td>수강 후기가 없습니다.</td>
				</tr>
		<?php
		}
			else{
			while($row = mysqli_fetch_array($pagingSql)){
			$no = $row['no'];
			$writer = $row['user_id'];
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
							<span class="tc-gray ellipsis_line">수강 강의명 <?php echo "{$lec_title}";?></span>
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
			

				
			
			</tbody>
		</table>
		<div class="box-paging">
		<!-- paging : 첫 페이지 -->
		<a href="reviewList.php?type=<?php echo "$type"?>&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>		  
		<?php
		/* paging : 이전 페이지 */
		if($page <= 1){
		?>
			<a href="reviewList.php?type=<?php echo "$type"?>&page=1"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
		<?php
		 } else{ ?>
			<a href="reviewList.php?type=<?php echo "$type"?>&page=<?php echo ($page-1); ?>"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
			<?php };?>

		<?php
		/* pager : 페이지 번호 출력 */
		for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
		?>
		<a href="reviewList.php?type=<?php echo "$type"?>&page=<?php echo $print_page; ?>"  <?php if($page==$print_page){echo "class='active'";} ?>>
		<?php echo $print_page; ?></a>
		<?php };?>

		<?php
		/* paging : 다음 페이지 */
		if($page >= $total_page){
		?>
		<a href="reviewList.php?type=<?php echo "$type"?>&page=<?php echo ($total_page); ?>"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
		<?php } else{ ?>
		<a href="reviewList.php?type=<?php echo "$type"?>&page=<?php echo ($page+1); ?>"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
		<?php };?>

		<!-- 마지막페이지 -->

		<a href="reviewList.php?type=<?php echo "$type"?>&page=<?php echo ($total_page); ?>"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>	
		</div>
		<!-- <div class="box-paging">
			<a href="#"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
			<a href="#"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
			<a href="#"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>
		</div> -->

		<div class="box-btn t-r">
			<a href="04_수강후기_등록.php" class="btn-m">후기 작성</a>
		</div>
	</div>
</div>
<?php
	include "footer.html";
?>
</div>
<script>
	let type= document.getElementById("theType").value;
	
	if(type=="'general'"){
		document.getElementById("general").className="on";
	}
	if(type=="'industry'"){
		document.getElementById("industry").className="on";
	}
	if(type=="'language'"){
		document.getElementById("language").className="on";
	}
	if(type=="'common'"){
		document.getElementById("common").className="on";
	}

</script>
</body>
</html>
