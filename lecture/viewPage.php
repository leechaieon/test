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
			<h3 class="tit-h3">���� �Ұ�</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>Ȩ</span></i></span>
				<span>�������� �ȳ�</span>
				<strong>����</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">��ü</a></li>
			<li><a href="#">�Ϲ�����</a></li>
			<li><a href="#">�������</a></li>
			<li><a href="#">���뿪��</a></li>
			<li><a href="#">���� �� �ڰ���</a></li>
		</ul>

		<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">�з�</option>
				</select>
				<select class="input-sel" style="width:158px">
					<option value="">���Ǹ�</option>
					<option value="">�ۼ���</option>
				</select>
				<input type="text" class="input-text" placeholder="���Ǹ��� �Է��ϼ���." style="width:158px"/>
				<button type="button" class="btn-s-dark">�˻�</button>
			</div>
		</div>
  
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">���� ���</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:23%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">��ȣ</th>
					<th scope="col">�з�</th>
					<th scope="col">����</th>
					<th scope="col">���ǱⰣ</th>
					<th scope="col">������</th>
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
                      <tr ><td colspan="4">���Ǹ� �ҷ��� �� �����ϴ�.</td>
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
                <td>�̹��� ÷��</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo"{$thumbnail}";  ?>"></td>
            </tr>
			<tr>
                <td>���� �̸�</td>
                <td><input type="text" name="teacher" width="150px"  value=<?php echo"{$teacher}";  ?>></td>
            </tr>
            <tr>    
                <td>���� �з�</td>
                
                <td>
                    <div class="box-input">
                               
									<label class="input-sp">
										<input type="radio" name="kind" id="general" value="general"  <?php if($type=="general"){ ?> checked <?php }?>/>
										<span class="input-txt">�Ϲ�����</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="industry" value="industry" <?php if($type=="industry"){ ?> checked <?php }?>/>
										<span class="input-txt">�������</span>
									</label>
                                    <label class="input-sp">
										<input type="radio" name="kind" id="common" value="common" <?php if($type=="common"){ ?> checked <?php }?>/>
										<span class="input-txt">���뿪��</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="kind" id="language" value="language" <?php if($type=="language"){ ?> checked <?php }?>/>
										<span class="input-txt">���� �� �ڰ���</span>
									</label>
                </div>
                </td>
            </tr>
            <tr>
                <td>���� ����</td>
                <td><input type="text" name="title" value="<?php echo"{$title}";  ?>"></td>
            </tr>
            <tr>   
                <td>���� �Ⱓ</td>
                <td><input type="date" name="startDate" value="<?php echo"{$startDate}";  ?>">~
                <input type="date" name="endDate"value="<?php echo"{$endDate}";  ?>"></td>
            </tr>
            <tr>    
                <td>���� ���̵�</td>
                <td><input type="text" name="level" value="<?php echo"{$level}";  ?>"></td>
            </tr>
		</table>
        ��¥<input type="text" value="<?php echo"{$startDate}";  ?>"><br /><br />
        <button onclick="reallyDelete()">�����ϱ�</button>              
        <!-- <a href="deleteLecture.php?no='<?php echo"{$no}";  ?>'" id="delete">�����ϱ�</a> -->
				<!-- //set -->
            <?php
                 }}
            ?>
			</tbody>
		</table>
        <input type="hidden" value="<?php echo"{$no}";  ?>">
        <input type="submit" value="�����ϱ�">
        </form>   
		
		<div class="box-btn t-r">
		<a href="lectureList.php">���� ���</a>
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

        function reallyDelete(){
            let q = confirm("������ �����Ͻðڽ��ϱ�? ��� <<?php echo"$title" ?> >������ ��� ������ �����˴ϴ�.");
            if(q==true){
                location.href="deleteLecture.php?no='<?php echo"{$no}";  ?>'";
            }else if(q==false){
                location.href="lectureList.php";
            }
        }
        
</script>
</body>
</html>
