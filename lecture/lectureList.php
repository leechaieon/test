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
<title>��Ŀ�� HRD</title>
<meta name="description" content="��Ŀ�� HRD" />
<meta name="keywords" content="��Ŀ��, HRD" />
<style>
    #title{text-align:center}
    #delete{color:red; margin-left:10px; font-size:12px; border:none}
    #delete:hover {cursor:pointer}
	.pager{margin-left:300px; margin-top:50px}
</style>
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
			<h3 class="tit-h3">���� ���</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>�������� �ȳ�</span>
				<strong>���� ���</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">��ü</a></li>
			<li><a href="lectureListType.php?type='general'">�Ϲ�����</a></li>
			<li><a href="lectureListType.php?type='industry'">�������</a></li>
			<li><a href="lectureListType.php?type='common'">���뿪��</a></li>
			<li><a href="lectureListType.php?type='language'">���� �� �ڰ���</a></li>
		</ul>

		
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">���� ���</caption>
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
					<th scope="col">��ȣ</th>
					<th scope="col">����</th>
					<th scope="col">�з�</th>
					<th scope="col">����</th>
					<th scope="col">���ǱⰣ</th>
					<th scope="col">������</th>
				</tr>
			</thead>
	 
			<tbody>
				<!-- set -->
                <?php
                  $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
                  $query = "select * from project_1_admin";
                  $result = mysqli_query($conn,$query);
                  $cnt = mysqli_num_rows($result);
				  	/* paging : �� ������ �� ������ ���� */
				$list_num = 5;

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
				$sql2 = "select * from project_1_admin limit $start, $list_num;";

				/* paging : ���� ���� */
				$pagingSql = mysqli_query($conn, $sql2);

				/* paging : �۹�ȣ */
				$cnt = $start + 1;
                  if($cnt==0){ 
                      ?>                     
                      <tr ><td colspan="4">��ϵ� ���ǰ� �����ϴ�.</td>
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
		//////////////////////////////////////����¡/////////////////////////////////////////
			

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
			/* paging : ���� ������ */
			if($page <= 1){
			?>
			<a href="lectureList.php?page=1">����</a>
			<?php } else{ ?>
			<a href="lectureList.php?page=<?php echo ($page-1); ?>">����</a>
			<?php };?>

			<?php
			/* pager : ������ ��ȣ ��� */
			for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
			?>
			<a href="lectureList.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
			<?php };?>

			<?php
			/* paging : ���� ������ */
			if($page >= $total_page){
			?>
			<a href="lectureList.php?page=<?php echo $total_page; ?>">����</a>
			<?php } else{ ?>
			<a href="lectureList.php?page=<?php echo ($page+1); ?>">����</a>
			<?php };?>

		</p>


		<div class="box-btn t-r">
			<a href="adminPage.php" class="btn-m">���� ����ϱ�</a>
		</div>
	</div>
	
</div>


<?php
	include "footer.html";
?>
</div>
    <script>
        function deleteOK(){
            let q = confirm("������ ���Ǹ� �����Ͻðڽ��ϱ�?");
            if(!q){
                return false;
            }
            return true;
        }


    </script>
</body>
</html>
