<?php include "header.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>해커스 HRD</title>
<meta name="description" content="해커스 HRD" />
<meta name="keywords" content="해커스, HRD" />

<!-- 파비콘설정 -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

<!-- xhtml property속성 벨리데이션 오류/확인필요 -->
<meta property="og:title" content="해커스 HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login페이지에만 호출 -->

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
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	
			
		
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="section-content">
				<form action="01_회원가입_04_회원가입완료.php" method="post" onsubmit="return checkAll()" name="memReg">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col"><span class="icons">*</span>이름</th>
							<td><input type="text" class="input-text" style="width:302px" name="userName"/></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>아이디</th>
							<td><input type="text"  class="input-text" style="width:302px" id="userId" name="userId" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/>
							<div id="result"></div>	
								<!-- <button onclick="idDuplicate()" class="btn-s-tin ml10">중복확인</button></td> -->
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>비밀번호</th>
							<td><input type="password" class="input-text" style="width:302px" name="userPassword1" id="userPassword1" placeholder="8-15자의 영문자/숫자 혼합"/>
							<div id="pwResult1"></div>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
							<td><input type="password" class="input-text" style="width:302px" name="userPassword2" id="userPassword2"/>
							<div id="pwResult2">비밀번호가 일치하지 않습니다.</div>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>이메일주소</th>
							<td>
								<input type="text" class="input-text" style="width:138px" name="userMail1"/> @
								 <input type="text" class="input-text" style="width:138px" value="" name="userMail2" list="emailSelect"  />
								<SELECT name="SelEmailDomain1" onchange="changeSelect(this,1);">
							
								<option value="naver.com">naver.com</option>
								<option value='hackers.com'>hackers.com</option>
								<option value='hanmail.net'>hanmail.net</option>
								<option value="user">직접입력</option>
   								 </SELECT>
						
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
							<td>
								<input type="text" class="input-text" style="width:50px" value="<?php echo substr($_POST[phoneNumber],0,3); ?>" name="phoneNum1" readonly/> - 
								<input type="text" class="input-text" style="width:50px" value="<?php echo substr($_POST[phoneNumber],3,4); ?>" name="phoneNum2" readonly/> - 
								<input type="text" class="input-text" style="width:50px" value="<?php echo substr($_POST[phoneNumber],7,4); ?>" name="phoneNum3" readonly/>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons"></span>일반전화 번호</th>
							<td><input type="text" class="input-text" style="width:88px" name="userTel1"/> - <input type="text" class="input-text" style="width:88px" name="userTel2"/> - <input type="text" class="input-text" name="userTel3" style="width:88px"/></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>주소</th>
							<td>
								<p >
									<label>우편번호 <input type="text" class="input-text ml5"  id="sample6_postcode" name="sample6_postcode" style="width:242px" /></label>
									<button class="btn-s-tin ml10" onclick="sample6_execDaumPostcode()">주소찾기</button>
								</p>
								<p class="mt10">
									<label>기본주소 <input type="text" class="input-text ml5" id="sample6_address" style="width:719px" name="sample6_address"/></label>
								</p>
								<p class="mt10">
									<label>상세주소 <input type="text" class="input-text ml5" id="sample6_detailAddress" style="width:719px" name="sample6_detailAddress"/></label>
								</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>SMS수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="radio" id="sms_receive" value="y" checked="checked"/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="radio" id="sms_not_receive" value="n"/>
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>메일수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" name="radio2" id="mail_receive" value="y" checked="checked"/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" name="radio2" id="mail_not_receive" value="n"/>
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="box-btn">
					<input type="submit"  class="btn-l" value="회원가입"/>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include "footer.html"; ?>
</div>
<a href="../eland/site/common/dbClass.php">db</a>
<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<!-- <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> -->
<script>

///////////////////////제이쿼리///////////////////////////
function changeSelect(s,no){
    form = document.memReg;
    sel = s[s.selectedIndex].value;
    dis = 1;
 
    if(sel=="user"){
        sel = "";
        dis = 0;
    }
        form.userMail2.value = sel;
        form.userMail2.disabled = dis;
   
}
$(document).ready(function(e){
	$("#userId").on("keyup",function(){
		let self= $(this);
		let userId;
		if(self.attr("id")==="userId"){
			userId = self.val();
		}
		$.post("check.php",
		{userId : userId},
		function(data){
			if(data){
				self.parent().parent().find("#result").html(data);
				self.parent().parent().find("#result").css("color","red");
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

////email셀렉하면 빈칸에 표시되도록 하기
function selectBox(){
let emailSite= $('#emailSelect option:selected').val();
if (emailSite!='직접입력'){
$('input[name=userMail2]').attr('value',emailSite);	

$(function(){ 
	
      $("input").keyup(function(){ 
	let emailSite= $('#emailSelect option:selected').val();
     
          
    $("#userMail2").attr("value", emailSite);
	  })})
}
}
    





	








/////////////////////////값이 비었는지 확인하는 함수////////////////////////////////////////////////////////////

function checkExistData(value, dataName) {
        if (value == "") {
            alert("모든 정보를 입력해주세요!");
            return false;
        }
        return true;
    }




function checkUserId(id) {
        //Id가 입력되었는지 확인하기
        if (!checkExistData(id, "아이디를"))
            return false;
 
        var idRegExp = /^[a-zA-z0-9]{4,12}$/; //아이디 유효성 검사
        if (!idRegExp.test(id)) {
            alert("아이디는 영문 대소문자와 숫자 4~12자리로 입력해야합니다!");
            form.userId.value = "";
            form.userId.focus();
            return false;
        }
        return true; //확인이 완료되었을 때
    }





 function checkPassword(id, password1, password2) {
        //비밀번호가 입력되었는지 확인하기
        if (!checkExistData(password1, "비밀번호를"))
            return false;
        //비밀번호 확인이 입력되었는지 확인하기
        if (!checkExistData(password2, "비밀번호 확인을"))
            return false;
 
        var password1RegExp = /^[a-z0-9]{8,15}$/; //비밀번호 유효성 검사
		let firstLetter = password1.substr(0,1);
        if (!password1RegExp.test(password1)||password1RegExp.test(firstLetter)) {
            alert("비밀번호는 영문 소문자와 숫자 8~15자이며 영문으로 시작해야 합니다!");
          
        memReg.userPassword1.focus();
            return false;
        }
        //비밀번호와 비밀번호 확인이 맞지 않다면..
        if (password1 != password2) {
            alert("두 비밀번호가 일치하지 않습니다.");
            memReg.userPassword2.focus();
            return false;
        }
 
        //아이디와 비밀번호가 같을 때..
        if (id == password1) {
            alert("아이디와 비밀번호는 같을 수 없습니다!");
            
            return false;
        }
        return true; //확인이 완료되었을 때
    }   


 function checkName(name) {
        if (!checkExistData(name, "이름을"))
            return false;
 
        var nameRegExp = /^[가-힣]{2,10}$/;
        if (!nameRegExp.test(name)) {
            alert("이름이 올바르지 않습니다.");
            return false;
        }
        return true; //확인이 완료되었을 때
    }

	
  function checkEmail(email) {
    

      var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
      if (regEmail.test(email) === false) {
         return false;
      }
	  return true;
  }


function checkAll() {
        if (!checkUserId(memReg.userId.value)) {
            return false;
        } else if (!checkPassword(memReg.userId.value, memReg.userPassword1.value,
		memReg.userPassword2.value)) {
            return false;
        } 
         else if (!checkName(memReg.userName.value)) {
            return false;
        } else if (!checkExistData(memReg.phoneNum1.value)||!checkExistData(memReg.phoneNum2.value)||!checkExistData(memReg.phoneNum3.value)) {
            alert("휴대폰 번호 형식이 올바르지 않습니다.");
			return false;
		
		}else if (!checkExistData(memReg.sample6_postcode.value)||!checkExistData(memReg.sample6_address.value)||!checkExistData(memReg.sample6_detailAddress.value)) {
            alert("주소 형식이 올바르지 않습니다.");
			return false;
		}else if(!checkEmail(memReg.userMail1.value+"@"+memReg.userMail2.value)){
			alert("이메일 형식이 올바르지 않습니다.");
			return false;
		}
        return true;
    }










	
	
    // function sample6_execDaumPostcode() {
		//     new daum.Postcode({
			//         oncomplete: function(data) {
				//             // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
				
				//             // 각 주소의 노출 규칙에 따라 주소를 조합한다.
				//             // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
				//             var addr = ''; // 주소 변수
				//             var extraAddr = ''; // 참고항목 변수
				
				//             //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
				//             if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
					//                 addr = data.roadAddress;
					//             } else { // 사용자가 지번 주소를 선택했을 경우(J)
						//                 addr = data.jibunAddress;
						//             }
						
						//             // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
						//             if(data.userSelectedType === 'R'){
							//                 // 법정동명이 있을 경우 추가한다. (법정리는 제외)
							//                 // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
							//                 if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
								//                     extraAddr += data.bname;
								//                 }
								//                 // 건물명이 있고, 공동주택일 경우 추가한다.
								//                 if(data.buildingName !== '' && data.apartment === 'Y'){
									//                     extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
									//                 }
									//                 // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
									//                 if(extraAddr !== ''){
										//                     extraAddr = ' (' + extraAddr + ')';
										//                 }
    //                 // 조합된 참고항목을 해당 필드에 넣는다.
    //                 document.getElementById("sample6_extraAddress").value = extraAddr;
	
    //             } else {
		//                 document.getElementById("sample6_extraAddress").value = '';
		//             }
		
		//             // 우편번호와 주소 정보를 해당 필드에 넣는다.
		//             document.getElementById('sample6_postcode').value = data.zonecode;
		//             document.getElementById("sample6_address").value = addr;
		//             // 커서를 상세주소 필드로 이동한다.
		//             document.getElementById("sample6_detailAddress").focus();
		//         }
		//     }).open();
		// }

</script>


</body>
</html>
