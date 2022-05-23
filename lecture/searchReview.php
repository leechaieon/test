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
<title>��Ŀ�� HRD</title>
<meta name="description" content="��Ŀ�� HRD" />
<meta name="keywords" content="��Ŀ��, HRD" />

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
			<li class="on"><a href="#">��ü</a></li>
			<li><a href="reviewList.php?type='general'">�Ϲ�����</a></li>
			<li><a href="reviewList.php?type='industry'">�������</a></li>
			<li><a href="reviewList.php?type='common'">���뿪��</a></li>
			<li><a href="reviewList.php?type='language'">���� �� �ڰ���</a></li>
		</ul>

		<div class="search-info">
			
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">�з�</option>
				</select>
				<select class="input-sel" style="width:158px" id="sep">
					<option value="lec_title">���Ǹ�</option>
					<option value="writer">�ۼ���</option>
				</select>
				<input type="text" class="input-text" id="keyword" name="keyword" placeholder="�˻�� �Է��ϼ���." style="width:158px"/>
				<button type="button" onclick="search()"class="btn-s-dark">�˻�</button>
			</div>
			
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
	   
	   		<td colspan="5" style="color:blue">�˻� ����� �����ϴ�.</td>
	
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
		
                </div>
		
			
			</tbody>
		</table>
		
<?php
	include "footer.html";
?>

<script type="text/javascript" src="jquery-3.6.0.min.js"></script>   
<script>
     function search(){  //button id ���� �����ϰ� ������ Ŭ���̺�Ʈ �߻�
    let sep = document.getElementById("sep").value;
    let keyword = document.getElementById("keyword").value; 
    $.ajax({
        type :"POST",                //postŸ������ ������ ����
        url : "searchReviewBack.php",      //���� ������ url
        async : true,                
               
        data : {"sep":sep, "keyword":keyword},                  //���� �����س��� data �� ���
        success : function(data){    //�����Ͱ��� ����� ���� ������ result�� ��� ���ش�
            $('#tbody').html(data);
            
        }
    });
  
};
  
</script>
</body>
</html>
