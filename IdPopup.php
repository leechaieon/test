
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="euc-kr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{margin-top:20px}
        .box{border:1px solid gray;}
        .box form{margin-left:10%; margin-top:10px; margin-bottom:10px}
        
        #phoneAndMail{width:90%;}
        .all{margin-left:10px; margin-top:10%}
        #pickPhone{margin-left:20px}
        #close{margin-left:30%; margin-top:10%}
    </style>
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

</head>
<body>

    <div class="all">
    <button class="btn-s-line" id="pickPhone" onclick="pickPhone()">휴대전화로 인증</button>
    <button class="btn-s-line" id="pickMail"onclick="pickMail()">이메일로 인증</button>

    
    <div id="phoneAndMail">
        <div id="phone" class="box">
            <form  method="post" action="searchId.php" >
                <input class="input-text" type="text" class="input-text" style="width:50px" name="num1" list="phoneNum" />
                <datalist id="phoneNum">
                <option value="010"></option>    
                <option value="011"></option>  
                <option value="016"></option>  
                </datalist>
                - 
                <input class="input-text" type="text" class="input-text" style="width:50px" name="num2" /> - 
                <input class="input-text" type="text" class="input-text" style="width:50px" name="num3" />
                <input class="input-text" type="hidden" value="phone" name="what">
                <br /><br />
                <input class="input-text" type="text" class="input-text" style="width:100px" name="userName" placeholder="이름"/>		
                <input type="submit" class="btn-s-line" value="확인">
                <div id="idResult"></div>
            </form>
        </div>             

        <div id="email" class="box">
            <form  method="post" action="searchId.php" >
                <input class="input-text" type="text" class="input-text" style="width:100px" name="mail" placeholder="이메일"/>@
                <input class="input-text" type="text" class="input-text" style="width:80px" name="mailSite" list="emailSite"/>
                <datalist id="emailSite">
                <option value="직접입력"></option>
                <option value="naver.com"></option>
                <option value="hackers.com"></option>
                <option value="gmail.com"></option>
                <option value="hanmail.net"></option>
                </datalist>
                <input type="hidden" value="mail" name="what">
                <br /><br />
                <input class="input-text" type="text" class="input-text" style="width:100px" name="userName" placeholder="이름"/>		
                <input type="submit" class="btn-s-line" value="확인">
                <div id="idResult"></div>
            </form>
        </div>       
    </div>
               <button onClick='self.close()' class='btn-s-line' id="close">닫기</button>
    </div>
        <script>
            document.getElementById("email").style.display="none";
            function pickPhone(){
                document.getElementById("email").style.display="none";
                document.getElementById("phone").style.display="block";
            }

            function pickMail(){
                document.getElementById("email").style.display="block";
                document.getElementById("phone").style.display="none";
            }



            // function searchId(){
                //     $.ajax({
                    //         type:"post",
    //         url:"searchId.php",
    //         data:{
    //             num1:$('#num1').val(),
    //             num2:$('#num2').val(),
    //             num3:$('#num3').val(),
    //             name:$('#userName').val(),
    //         },
    //         success:function(data){
    //             $('#idResult').html(data);
    //         },
    //     });
    // }
</script>                        
</body>
</html>