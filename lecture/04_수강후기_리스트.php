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
<title>��Ŀ�� HRD</title>
<meta name="description" content="��Ŀ�� HRD" />
<meta name="keywords" content="��Ŀ��, HRD" />
<script src="jquery-3.6.0.min.js" type="text/javascript"></script>
<style>
.pager{margin-left:30%; margin-top:50px}
a{padding:0}

</style>
</head>
<body>
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

		<ul class="tab-list tab5">
			<li class="on" id="entitle"><a href="#">��ü</a></li>
			<li id="general" onclick="alterClass(this)"><a href="reviewList.php?type='general'">�Ϲ�����</a></li>
			<li id="industry" onclick="alterClass(this)"><a href="reviewList.php?type='industry'">�������</a></li>
			<li id="common" onclick="alterClass(this)"><a href="reviewList.php?type='common'">���뿪��</a></li>
			<li id="language" onclick="alterClass(this)"><a href="reviewList.php?type='language'">���� �� �ڰ���</a></li>
		</ul>

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
			$conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
			$query = "select * from project_1_review order by no desc";
			$result = mysqli_query($conn,$query);
			$cnt = mysqli_num_rows($result);
			
			$list_num = 20;
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
				$sql2 = "select * from project_1_review order by no desc limit $start, $list_num ;";

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
			while($row = mysqli_fetch_array($pagingSql)){
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
					<a href="04_�����ı�_��.php?no='<?php echo "$no"?>'&lec_title=<?php echo "$lec_title"?>">
							<span class="tc-gray ellipsis_line">���� ���Ǹ� |  <?php echo "{$lec_title}";?></span>
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

		<a href="04_�����ı�_����Ʈ.php?page=<?php echo ($total_page); ?>"><i class="icon-last"><span class="hidden">������������</span></i></a>	
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

		<div class="box-btn t-r">
			<a href="04_�����ı�_���.php" class="btn-m">�ı� �ۼ�</a>
		</div>
	</div>
</div>
<?php
	include "footer.html";
?>
</div>
<script>
	function alterClass(e){
		let gg = document.getElementById("entitle").className;
		
		document.getElementById("entitle").className.replace(gg,"");
		e.className=gg;
	}

</script>
</body>
</html>
