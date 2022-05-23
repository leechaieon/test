<?php 
session_start();
include "header.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
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
<style>
#pwResult2{color:red;}

</style>
</head><body>
<!-- skip nav -->
<div id="skip-nav">
<a href="#content">���� �ٷΰ���</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">ȸ������ ����</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>Ȩ</span></i></span>
					<strong>ȸ������ ����</strong>
				</div>
			</div>

			
      <?php
      session_start();

      $uid=$_SESSION["id"];
	$admin =$_SESSION["admin"];

      $conn = mysqli_connect("14.49.30.84:30019", "gosi", "pservant148", "eland");
        

      $query = "select * from project_1 where user_id='{$uid}'";
      $result = mysqli_query($conn,$query);
      $count = mysqli_num_rows($result);
      $row = mysqli_fetch_array($result);
      $user_name=iconv('utf-8','euc-kr',$row['user_name']);
      $user_phone=iconv('utf-8','euc-kr',$row['user_phoneNumber']);
 

      $user_telephone=iconv('utf-8','euc-kr',$row['user_telephone']);
      $user_email=iconv('utf-8','euc-kr',$row['user_email']);
      $emailArr=explode("@",$user_email);

      $user_postcode=iconv('utf-8','euc-kr',$row['user_postcode']);
      $user_address=iconv('utf-8','euc-kr',$row['user_address']);
      $user_detailaddress=iconv('utf-8','euc-kr',$row['user_detailaddress']);
      $user_sms=iconv('utf-8','euc-kr',$row['sms_receive']);
      $user_mail=iconv('utf-8','euc-kr',$row['mail_receive']);


        mysqli_close($conn);
        ?>


			<div class="section-content">
				<form action="memberModify.php" method="post" onsubmit="return checkAll()" name="memReg">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">��������</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>
 
					<tbody>
						<tr>
							<th scope="col"><span class="icons">*</span>�̸�</th>
							<td><input type="text" class="input-text" style="width:302px" name="userName" value="<?php echo"{$user_name}";?>" /></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>���̵�</th>
							<td><input type="text"  class="input-text" style="width:302px" id="userId" name="userId" value="<?php echo"{$uid}";?>" readonly />
							<div id="result"></div>	
								<!-- <button onclick="idDuplicate()" class="btn-s-tin ml10">�ߺ�Ȯ��</button></td> -->
						</tr>
            <tr>
            <th scope="col"><span class="icons">*</span>��й�ȣ</th>
							<td><input type="password"  class="input-text" style="width:302px" id="originalPassword"  name="originalPassword" 
              placeholder="��й�ȣ�� �����ϰ� ������ ���� ��й�ȣ�� �Է�" />
              <div id="pwResult"></div>
              <input type="hidden" name="changePassword"/>
            </tr>
            
              <!--------------------------------------->
              <tr>
							<th scope="col"><span class="icons">*</span>�� ��й�ȣ</th>
							<td><input type="password" class="input-text" style="width:302px" name="userPassword1" id="userPassword1" placeholder="8-15���� ������/���� ȥ��"/>
							<div id="pwResult1"></div>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>�� ��й�ȣ Ȯ��</th>
							<td><input type="password" class="input-text" style="width:302px" name="userPassword2" id="userPassword2"/>
							<div id="pwResult2">��й�ȣ�� ��ġ���� �ʽ��ϴ�.</div>
						</tr>
                 <!--------------------------------------->
						<tr>
							<th scope="col"><span class="icons">*</span>�̸����ּ�</th>
							<td>
								<input type="text" class="input-text" style="width:138px" name="userMail1" value="<?php echo"{$emailArr[0]}" ?>"/> @
								 <input type="text" class="input-text" style="width:138px" value="<?php echo"{$emailArr[1]}" ?>" name="userMail2"  />
								<select class="input-sel" style="width:160px" id="emailSelect" onchange="selectBox()">
									<option value="�����Է�">�����Է�</option>
									<option value="naver.com" >naver.com</option>
									<option value="daum.net">daum.net</option>
									<option value="hanmail.net">hanmail.net</option>
									<option value="gmail.com">gmail.com</option>
									<option value="hackers.com">hackers.com</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>�޴��� ��ȣ</th>
							<td>
								<input type="text" class="input-text" style="width:50px" value="<?php echo substr($user_phone,0,3); ?>" name="phoneNum1" readonly/> - 
								<input type="text" class="input-text" style="width:50px" value="<?php echo substr($user_phone,3,4); ?>" name="phoneNum2" readonly/> - 
								<input type="text" class="input-text" style="width:50px" value="<?php echo substr($user_phone,7,4); ?>" name="phoneNum3" readonly/>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons"></span>�Ϲ���ȭ ��ȣ</th>
							<td><input type="text" class="input-text" name="userTel1" value="<?php echo substr($user_telephone,0,3); ?>" style="width:50px"/> -
              <input type="text" class="input-text" name="userTel2" value="<?php echo substr($user_telephone,3,3);  ?>" style="width:50px"/> -
              <input type="text" class="input-text" name="userTel3" value="<?php echo substr($user_telephone,6,4); ?>" style="width:50px"/>
            </td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>�ּ�</th>
							<td>
								<p >
									<label>�����ȣ <input type="text" class="input-text ml5"  id="sample6_postcode" value="<?php echo"{$user_postcode}" ?>" name="sample6_postcode" style="width:242px" /></label>
									<button class="btn-s-tin ml10" onclick="sample6_execDaumPostcode()">�ּ�ã��</button>
								</p>
								<p class="mt10">
									<label>�⺻�ּ� <input type="text" class="input-text ml5" id="sample6_address" style="width:719px" value="<?php echo"{$user_address}" ?>"  name="sample6_address"/></label>
								</p>
								<p class="mt10">
									<label>���ּ� <input type="text" class="input-text ml5" id="sample6_detailAddress" style="width:719px" value="<?php echo"{$user_detailaddress}" ?>"  name="sample6_detailAddress"/></label>
								</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>SMS����</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="radio" id="sms_receive" value="y" <?php if($user_sms=="y"){ ?> checked <?php } ?>/>
										<span class="input-txt">������</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="radio" id="sms_not_receive" value="n" <?php if($user_sms=="n"){ ?> checked <?php } ?>/>
										<span class="input-txt">�̼���</span>
									</label>
								</div>
								<p>SMS���� ��, ��Ŀ���� ���� �� �̺�Ʈ ������ �޾ƺ��� �� �ֽ��ϴ�.</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>���ϼ���</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="radio2" id="mail_receive" value="y" <?php if($user_mail=="y"){ ?> checked <?php } ?>/>
										<span class="input-txt">������</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="radio2" id="mail_not_receive" value="n" <?php if($user_mail=="n"){ ?> checked <?php } ?>/>
										<span class="input-txt">�̼���</span>
									</label>
								</div>
								<p>���ϼ��� ��, ��Ŀ���� ���� �� �̺�Ʈ ������ �޾ƺ��� �� �ֽ��ϴ�.</p>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="box-btn">
					<input type="submit"  class="btn-l" value="���� ����"/>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

	<div id="footer" class="footer">
		<div class="inner p-r">
			<img src="http://img.hackershrd.com/common/logo_footer.png" class="logo-footer" alt="��Ŀ�� HRD LOGO" width="165" height="37"/>
			<div class="site-info">
				<div class="link-box">
					<a href="#">��Ŀ�� �Ұ�</a>
					<a href="#">�̿���</a>
					<a href="#"><strong class="tc-brand">����������޹�ħ</strong></a>
					<a href="#">CONTACT US</a>
					<a href="#">���/������</a>
				</div>
				<div class="address">
					��è�����͵� | ����ڵ�Ϲ�ȣ [120-87-09984] | TEL : 02)537-5000<br />
					����Ư���� ���ʱ� �������61�� 23(���ʵ� 1316-15) ���뼺����� 203ȣ<br />
					��ǥ�̻� : ������ | ������������å���� : �躴ö<br />
					����Ǹž��Ű�(�� 2008-���Ｍ��-0396ȣ) ������ȸ �ΰ���Ż���Ű�(�Ű��ȣ : 013760)<br />
				</div>
			</div>
			<a href="javascript:void(window.open('https://pgweb.uplus.co.kr/pg/wmp/mertadmin/jsp/mertservice/s_escrowYn.jsp?mertid=champescrow','','scrollbars=no,width=340,height=262,top=150,left=550'))" class="lg-info"><img src="http://img.hackershrd.com/common/lg_info.gif" alt="������ �����ŷ��� ���� ����(����)�� ���Ե� ��ǰ�� ������ �Ա����� �����Ͻô� ��� è�����͵� ������ LG U+�� ���ž��� ���񽺸� �̿��Ͻ� �� �ֽ��ϴ�.* LG U+�� ������ݿ�ġ�� ��Ϲ�ȣ : 02-006-00001" width="163" height="114"/></a>
		</div>
	</div>
</div>
<a href="../eland/site/common/dbClass.php">db</a>
<script src="jquery-3.6.0.min.js"></script>
<!-- <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> -->
<script>


///////////////////////��������///////////////////////////
$(document).ready(function(e){
	$("#originalPassword").on("keyup",function(){
		let self= $(this);
		let originalPassword;
		if(self.attr("id")==="originalPassword"){
			originalPassword = self.val();
		}
		$.post("pwModify.php",
		  {originalPassword : originalPassword},
		function(data){
			if(data){
				self.parent().parent().find("#pwResult").html(data);
				self.parent().parent().find("#pwResult").css("color","red");
			}
		});
	});
});



$(document).ready(function(e){
	$("#userPassword1").on("keyup",function(){
		let self= $(this);
		let userPassword1;
		if(self.attr("id")==="userPassword1"){
			userPassword1 = self.val();
		}
		$.post("checkPw.php",
		{userPassword1 : userPassword1},
		function(data){
			if(data){
				self.parent().parent().find("#pwResult1").html(data);
				self.parent().parent().find("#pwResult1").css("color","red");
			}
		});
	});
});

 $(function(){ 
	 $("#pwResult2").hide();
      $("input").keyup(function(){ 
	  var pwd1=$("#userPassword1").val();
      var pwd2=$("#userPassword2").val(); 
      if(pwd1 != "" || pwd2 != ""){ 
        if(pwd1 == pwd2){ 
            
             $("#pwResult2").hide(); 
             $("#submit").removeAttr("disabled");}
        else{
             $("#pwResult2").show();
          
            $("#submit").attr("disabled", "disabled"); }
        } 
    }); 
});

////email�����ϸ� ��ĭ�� ǥ�õǵ��� �ϱ�
function selectBox(){
let emailSite= $('#emailSelect option:selected').val();
if (emailSite!='�����Է�'){
$('input[name=userMail2]').attr('value',emailSite);	

$(function(){ 
	
      $("input").keyup(function(){ 
	let emailSite= $('#emailSelect option:selected').val();
     
          
    $("#userMail2").attr("value", emailSite);
	  })})
}
}
    


/////////////////////////���� ������� Ȯ���ϴ� �Լ�////////////////////////////////////////////////////////////

function checkExistData(value, dataName) {
        if (value == "") {
            alert(dataName + " �Է����ּ���!");
            return false;
        }
        return true;
    }




function checkUserId(id) {
        //Id�� �ԷµǾ����� Ȯ���ϱ�
        if (!checkExistData(id, "���̵�"))
            return false;
 
        var idRegExp = /^[a-zA-z0-9]{4,12}$/; //���̵� ��ȿ�� �˻�
        if (!idRegExp.test(id)) {
            alert("���̵�� ���� ��ҹ��ڿ� ���� 4~12�ڸ��� �Է��ؾ��մϴ�!");
            memReg.userId.value = "";
            memReg.userId.focus();
            return false;
        }
        return true; //Ȯ���� �Ϸ�Ǿ��� ��
    }





 function checkPassword(id, password1, password2) {
   
    if(memReg.changePassword.value=="1"){
        //��й�ȣ�� �ԷµǾ����� Ȯ���ϱ�
        if (!checkExistData(password1, "��й�ȣ��"))
            return false;
        //��й�ȣ Ȯ���� �ԷµǾ����� Ȯ���ϱ�
        if (!checkExistData(password2, "��й�ȣ Ȯ����"))
            return false;
        if(password1!=password2)
            {alert("��й�ȣ�� Ȯ���ϼ���");
            return false;}
            return true;
    }
 
        //���̵�� ��й�ȣ�� ���� ��..
        if (id == password1) {
            alert("���̵�� ��й�ȣ�� ���� �� �����ϴ�!");
            
            return false;
        }
        return true; //Ȯ���� �Ϸ�Ǿ��� ��
    }   


 function checkName(name) {
        if (!checkExistData(name, "�̸���"))
            return false;
 
        var nameRegExp = /^[��-�R]{2,10}$/;
        if (!nameRegExp.test(name)) {
            alert("�̸��� �ùٸ��� �ʽ��ϴ�.");
            return false;
        }
        return true; //Ȯ���� �Ϸ�Ǿ��� ��
    }

	
  function checkEmail(email) {
    

      var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
      if (regEmail.test(email) === false) {
         return false;
      }
	  return true;
  }


function checkAll() {
            const aa = document.getElementById("pwResult");

          if(aa.innerText=="��й�ȣ Ȯ��"){
            memReg.changePassword.value="1";
          }

       
        if (!checkUserId(memReg.userId.value)) {
            return false;
        } else if (!checkPassword(memReg.userId.value, memReg.userPassword1.value,
	    	memReg.userPassword2.value)) {
            return false;
        } 
         else if (!checkName(memReg.userName.value)) {
            return false;
        } else if (!checkExistData(memReg.phoneNum1.value)||!checkExistData(memReg.phoneNum2.value)||!checkExistData(memReg.phoneNum3.value)) {
            alert("�޴��� ��ȣ ������ �ùٸ��� �ʽ��ϴ�.");
			return false;
		
		}else if (!checkExistData(memReg.sample6_postcode.value)||!checkExistData(memReg.sample6_address.value)||!checkExistData(memReg.sample6_detailAddress.value)) {
            alert("�ּ� ������ �ùٸ��� �ʽ��ϴ�.");
			return false;
		}else if(!checkEmail(memReg.userMail1.value+"@"+memReg.userMail2.value)){
			alert("�̸��� ������ �ùٸ��� �ʽ��ϴ�.");
			return false;
		}
        return true;



    }










	
	
    // function sample6_execDaumPostcode() {
		//     new daum.Postcode({
			//         oncomplete: function(data) {
				//             // �˾����� �˻���� �׸��� Ŭ�������� ������ �ڵ带 �ۼ��ϴ� �κ�.
				
				//             // �� �ּ��� ���� ��Ģ�� ���� �ּҸ� �����Ѵ�.
				//             // �������� ������ ���� ���� ��쿣 ����('')���� �����Ƿ�, �̸� �����Ͽ� �б� �Ѵ�.
				//             var addr = ''; // �ּ� ����
				//             var extraAddr = ''; // �����׸� ����
				
				//             //����ڰ� ������ �ּ� Ÿ�Կ� ���� �ش� �ּ� ���� �����´�.
				//             if (data.userSelectedType === 'R') { // ����ڰ� ���θ� �ּҸ� �������� ���
					//                 addr = data.roadAddress;
					//             } else { // ����ڰ� ���� �ּҸ� �������� ���(J)
						//                 addr = data.jibunAddress;
						//             }
						
						//             // ����ڰ� ������ �ּҰ� ���θ� Ÿ���϶� �����׸��� �����Ѵ�.
						//             if(data.userSelectedType === 'R'){
							//                 // ���������� ���� ��� �߰��Ѵ�. (�������� ����)
							//                 // �������� ��� ������ ���ڰ� "��/��/��"�� ������.
							//                 if(data.bname !== '' && /[��|��|��]$/g.test(data.bname)){
								//                     extraAddr += data.bname;
								//                 }
								//                 // �ǹ����� �ְ�, ���������� ��� �߰��Ѵ�.
								//                 if(data.buildingName !== '' && data.apartment === 'Y'){
									//                     extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
									//                 }
									//                 // ǥ���� �����׸��� ���� ���, ��ȣ���� �߰��� ���� ���ڿ��� �����.
									//                 if(extraAddr !== ''){
										//                     extraAddr = ' (' + extraAddr + ')';
										//                 }
    //                 // ���յ� �����׸��� �ش� �ʵ忡 �ִ´�.
    //                 document.getElementById("sample6_extraAddress").value = extraAddr;
	
    //             } else {
		//                 document.getElementById("sample6_extraAddress").value = '';
		//             }
		
		//             // �����ȣ�� �ּ� ������ �ش� �ʵ忡 �ִ´�.
		//             document.getElementById('sample6_postcode').value = data.zonecode;
		//             document.getElementById("sample6_address").value = addr;
		//             // Ŀ���� ���ּ� �ʵ�� �̵��Ѵ�.
		//             document.getElementById("sample6_detailAddress").focus();
		//         }
		//     }).open();
		// }

</script>


</body>
</html>
