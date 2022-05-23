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
	.pager{margin-left:300px; margin-top:50px}
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
			<h3 class="tit-h3">강의 목록</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>강의 목록</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">전체</a></li>
			<li><a href="lectureListType.php?type='general'">일반직무</a></li>
			<li><a href="lectureListType.php?type='industry'">산업직무</a></li>
			<li><a href="lectureListType.php?type='common'">공통역량</a></li>
			<li><a href="lectureListType.php?type='language'">어학 및 자격증</a></li>
		</ul>

		
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">강의 목록</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:23%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">사진</th>
					<th scope="col">분류</th>
					<th scope="col">제목</th>
					<th scope="col">강의기간</th>
					<th scope="col">선생님</th>
				</tr>
			</thead>
	 
			<tbody>
				<!-- set -->
                <?php
                  $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
                  $query = "select * from project_1_admin";
                  $result = mysqli_query($conn,$query);
                  $cnt = mysqli_num_rows($result);
				  	/* paging : 한 페이지 당 데이터 개수 */
				$list_num = 5;

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
				$sql2 = "select * from project_1_admin limit $start, $list_num;";

				/* paging : 쿼리 전송 */
				$pagingSql = mysqli_query($conn, $sql2);

				/* paging : 글번호 */
				$cnt = $start + 1;
                  if($cnt==0){ 
                      ?>                     
                      <tr ><td colspan="4">등록된 강의가 없습니다.</td>
                  </tr>
               <?php
                 }else{
                     
                    while($row= mysqli_fetch_array($pagingSql)){
                        $teacher = iconv("utf-8","euc-kr",$row["teacher"]);
                        $title = iconv("utf-8","euc-kr",$row["title"]);
                        $level = iconv("utf-8","euc-kr",$row["level"]);
                        $no = iconv("utf-8","euc-kr",$row["no"]);
                        $startDate = iconv("utf-8","euc-kr",$row["start_date"]);
						$endDate = iconv("utf-8","euc-kr",$row["end_date"]);
                        $type = iconv("utf-8","euc-kr",$row["type"]);
						$thumbnail = iconv("utf-8","euc-kr",$row["thumbnail"]);
		//////////////////////////////////////페이징/////////////////////////////////////////
			

               ?>
			<form action="deleteLecture.php" method="post" name="form" onsubmit="return deleteOK()">
				<tr class="bbs-sbj">
					<input type="hidden" name="no" value="<?php echo "$no";  ?>">
					<td><?php echo "$no";  ?></td>
					<td><img src="lectureImg/<?php echo "$thumbnail";  ?>" alt="no img" width="50px"></td>
					<td><?php echo "$type";  ?></td>
					<td >	
						<a id="title" href="viewPage.php?no='<?php echo "$no";  ?>'">	<?php echo "$title";  ?></a>
                      
					</td>
					<td>
                    <?php echo "$startDate.~.$endDate";  ?>
					</td>
					<td class="last"><?php echo "$teacher";  ?></td>
				</tr>
            </form>   
				<!-- //set -->
            <?php
                 }}
            ?>
			</tbody>
		</table>
             
		<p class="pager">

			<?php
			/* paging : 이전 페이지 */
			if($page <= 1){
			?>
			<a href="lectureList.php?page=1">이전</a>
			<?php } else{ ?>
			<a href="lectureList.php?page=<?php echo ($page-1); ?>">이전</a>
			<?php };?>

			<?php
			/* pager : 페이지 번호 출력 */
			for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
			?>
			<a href="lectureList.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
			<?php };?>

			<?php
			/* paging : 다음 페이지 */
			if($page >= $total_page){
			?>
			<a href="lectureList.php?page=<?php echo $total_page; ?>">다음</a>
			<?php } else{ ?>
			<a href="lectureList.php?page=<?php echo ($page+1); ?>">다음</a>
			<?php };?>

		</p>


		<div class="box-btn t-r">
			<a href="adminPage.php" class="btn-m">강의 등록하기</a>
		</div>
	</div>
	
</div>


<?php
	include "footer.html";
?>
</div>
    <script>
        function deleteOK(){
            let q = confirm("정말로 강의를 삭제하시겠습니까?");
            if(!q){
                return false;
            }
            return true;
        }


    </script>
</body>
</html>
