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
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->
<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
<style>
#hit{margin-left:50%; margin-bottom:10px; width:50%; text-align:right}
#files{margin-left:50%; margin-bottom:10px; width:50%; text-align:right}
#file{text-decoration:underline; color:blue}
</style>
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
		<?php
		  $conn= mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
		  $no = $_GET["no"];
		  
	
		  $sql1="select * from project_1_review where no=$no";
		  $sqlhit="update project_1_review set hit= hit+1 where no= $no";
		  $result1 = mysqli_query($conn,$sql1);
		 $result2=mysqli_query($conn,$sqlhit);
		 $row1 = mysqli_fetch_array($result1);
		 $title = iconv("utf-8","euc-kr",$row1['title']);
		 $content = iconv("utf-8","euc-kr",$row1['content']);
		 $write=$row1['user_id'];
		 $length=strlen($write);
		 $writer = substr($write,0,$length-2)."**";
		 $star=$row1['star'];
		 $lec_title=iconv("utf-8","euc-kr",$row1['lec_title']);
		 $hit = $row1['hit'];
		 $date = $row1['review_date'];
		 $fileName = iconv("utf-8","euc-kr",$row1['attach']);

		?>
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				<p scope="col"  id="hit">�ۼ���:  <?php echo "{$date}"; ?> <br /> ��ȸ��:  <?php echo "{$hit}"; ?><br />
				</p>
				<?php
				  if($fileName){
				?>
				<p scope="col" id="files">
					÷�� ����: <a id="file" download href="file/<?php echo"$fileName"?>"><?php echo"$fileName"?></a>
				</p>
				<?php
				  }
				?>
				<tr>
					<th scope="col"><?php echo "$title"; ?></th>
					<th scope="col" class="user-id">�ۼ� | <?php echo "{$writer}"; ?></th>					
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating">���Ǹ�����</span>
							<span class="star-rating">
								<span class="star-inner" style="width:<?php echo "{$star}";?>%"></span>
							</span>
						</div>
						
						<?php echo "{$content}";?>
					</td>
				</tr>
			</tbody>
		</table>
		
		<?php
			$lec_title= iconv("euc-kr","utf-8",$lec_title);
		  $sql2 = "select * from project_1_admin where title='$lec_title'";
		
		  $result2 = mysqli_query($conn,$sql2);
		  $row2 = mysqli_fetch_array($result2);
		  $lec_teacher = iconv("utf-8","euc-kr",$row2['teacher']);
		  $lec_type = iconv("utf-8","euc-kr",$row2['type']);
		  $lec_level= iconv("utf-8","euc-kr",$row2['level']);
		  $lec_title2 = iconv("utf-8","euc-kr",$lec_title);
		  $start =$row2['start_date'];
		  $end=$row2['end_date'];
			$thumbnail=iconv("utf-8","euc-kr",$row2['thumbnail']);
		?>
		
		<p class="mb15"><strong class="tc-brand fs16"><?php echo "$writer";?>���� �����Ͻ� ���� ����</strong></p>
		
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
			<caption class="hidden">��������</caption>
			<colgroup>
				<col style="width:166px"/>
				<col style="*"/>
				<col style="width:110px"/>
			</colgroup>
			<tbody>
				<tr>
					<td>
						<a href="#" class="sample-lecture">
							<img src="lectureImg/<?php echo"$thumbnail"?>" alt="" width="144" height="101" />
							<span class="tc-brand">���ð��� ��</span>
						</a>
					</td>
					<td class="lecture-txt">
						<em class="tit mt10"><?php echo "{$lec_title2}";?></em>
						<p class="tc-gray mt20">����: <?php echo "{$lec_teacher}";?> | �н����̵� : <?php echo "{$lec_level}";?> | 
						�����ð�: <?php echo "{$start}";?>~<?php echo "{$end}";?></p>
					</td>
					<td class="t-r"><a href="#" class="btn-square-line">����<br />��</a></td>
				</tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="04_�����ı�_����Ʈ.php" class="btn-m-gray">���</a>
			<?php
			$user = $_SESSION["id"];
			 
				if($user===$write){ ?>
			
			<a href="04_�����ı�_����.php?no=<?php echo "$no" ?>" class="btn-m ml5">����</a>
			<a href="deleteReview.php?no=<?php echo "$no" ?>" class="btn-m-dark">����</a>
		<?php
		  }
		?>
			</div>
			<div class="search-info">
			<form action="searchReview.php" method="post">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">�з�</option>
				</select>
				<select class="input-sel" style="width:158px" name="sep">
					<option value="lec_title">���Ǹ�</option>
					<option value="writer">�ۼ���</option>
				</select>
				<input type="text" class="input-text" name="keyword" placeholder="�˻�� �Է��ϼ���." style="width:158px"/>
				<input type="submit" class="btn-s-dark"></button>
			</div>
			</form>
		</div>

		<!------------------------------------------�ؿ� ����Ʈ-------------------------------->
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">�����ı�</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">��ȣ</th>
					<th scope="col">�з�</th>
					<th scope="col">����</th>
					<th scope="col">���¸�����</th>
					<th scope="col">�ۼ���</th>
				</tr>
			</thead>
	 
			<tbody>

				
				<?php
		
			$listSql = "select * from project_1_review order by no desc";
			$listResult = mysqli_query($conn,$listSql);
			$cnt = mysqli_num_rows($listResult);
			$list_num = 10;
			// $hotsql = "select * from project_1_review order by hit desc limit 3";
			// $hotresult= mysqli_query($conn,$hotsql);
			

				/* paging : �� �� �� ������ �� */
				$page_num = 3;

				/* paging : ���� ������ */
				$page = isset($_GET["page"])? $_GET["page"] : 1;

				/* paging : ��ü ������ �� = ��ü ������ / �������� ������ ����, ceil : �ø���, floor : ������, round : �ݿø� */
				$total_page = ceil($cnt / $list_num);
				// echo "��ü ������ �� : ".$total_page;

				/* paging : ��ü �� �� = ��ü ������ �� / �� �� ������ �� */
				$total_block = ceil($total_page / $page_num);

				/* paging : ���� �� ��ȣ = ���� ������ ��ȣ / �� �� ������ �� */
				$now_block = ceil($page / $page_num);

				/* paging : �� �� ���� ������ ��ȣ = (�ش� ���� ����ȣ - 1) * ���� ������ �� + 1 */
				$s_pageNum = ($now_block - 1) * $page_num + 1;
				// �����Ͱ� 0���� ���
				if($s_pageNum <= 0){
					$s_pageNum = 1;
				};

				/* paging : �� �� ������ ������ ��ȣ = ���� �� ��ȣ * �� �� ������ �� */
				$e_pageNum = $now_block * $page_num;
				// ������ ��ȣ�� ��ü ������ ���� ���� �ʵ���
				if($e_pageNum > $total_page){
					$e_pageNum = $total_page;
				};



				/* paging : ���� ��ȣ = (���� ������ ��ȣ - 1) * ������ �� ������ ������ �� */
				$start = ($page - 1) * $list_num;

				/* paging : ���� �ۼ� - limit �������, � */
				$sql2 = "select * from project_1_review limit $start, $list_num;";

				/* paging : ���� ���� */
				$pagingSql = mysqli_query($conn, $sql2);

				/* paging : �۹�ȣ */
				$cnt = $start + 1;






   if($cnt==0){
	   ?>
	   <tr class="bbs-sbj">
					<td>���� �ıⰡ �����ϴ�.</td>
				</tr>
		
				
		<?php
			}else{
			if($page==1){
				include "hotList.php";
			}
			while($list = mysqli_fetch_array($listResult)){
			$no = $list['no'];
			$write=$list['user_id'];
			 $length=strlen($write);
		 	$writer = substr($write,0,$length-2)."**";
			$lec_type = iconv("utf-8","euc-kr",$list['lec_type']);
			$lec_title = iconv("utf-8","euc-kr",$list['lec_title']);
			$title = iconv("utf-8","euc-kr",$list['title']);
			$content = iconv("utf-8","euc-kr",$list['content']);
			$star = $list['star'];
			$hit = $list['hit'];
			
			?>	   
		
				<tr class="bbs-sbj">
					<td><?php echo "{$no}";?></td>
					<td><?php echo "{$lec_type}";?></td>
					<td>
					<a href="04_�����ı�_��.php?no='<?php echo "$no"?>'&lec_title=<?php echo "$lec_title"?>">
							<span class="tc-gray ellipsis_line">���� ���Ǹ� :<?php echo "{$lec_title}";?></span>
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
		<!-- paging : ù ������ -->
		<a href="04_�����ı�_����Ʈ.php?page=1"><i class="icon-first"><span class="hidden">ù������</span></i></a>		  
		<?php
		/* paging : ���� ������ */
		if($page <= 1){
		?>
			<a href="04_�����ı�_����Ʈ.php?page=1"><i class="icon-prev"><span class="hidden">����������</span></i></a>
		<?php
		 } else{ ?>
			<a href="04_�����ı�_����Ʈ.php?page=<?php echo ($page-1); ?>"><i class="icon-prev"><span class="hidden">����������</span></i></a>
			<?php };?>

		<?php
		/* pager : ������ ��ȣ ��� */
		for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
		?>
		<a href="04_�����ı�_����Ʈ.php?page=<?php echo $print_page; ?>" <?php if($page==$print_page){echo "class='active'";} ?>  >
		<?php echo $print_page; ?></a>
		<?php };?>

		<?php
		/* paging : ���� ������ */
		if($page >= $total_page){
		?>
		<a href="04_�����ı�_����Ʈ.php?page=<?php echo ($total_page); ?>"><i class="icon-next"><span class="hidden">����������</span></i></a>
		<?php } else{ ?>
		<a href="04_�����ı�_����Ʈ.php?page=<?php echo ($page+1); ?>"><i class="icon-next"><span class="hidden">����������</span></i></a>
		<?php };?>

		<!-- ������������ -->

		<a href="04_�����ı�_��.php?page=<?php echo ($total_page); ?>"><i class="icon-last"><span class="hidden">������������</span></i></a>	
		</div>
		
		<!-- <div class="box-paging">
			<a href="#"><i class="icon-first"><span class="hidden">ù������</span></i></a>
			<a href="#"><i class="icon-prev"><span class="hidden">����������</span></i></a>
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#"><i class="icon-next"><span class="hidden">����������</span></i></a>
			<a href="#"><i class="icon-last"><span class="hidden">������������</span></i></a>
		</div> -->
	
<?php
	include "footer.html";
?>
</div>
</body>
</html>
