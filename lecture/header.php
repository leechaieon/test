
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->
<div id="header" class="header">
		
    <div class="nav-section">
        <div class="inner p-r">
            <h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="��Ŀ�� HRD LOGO" width="165" height="37"/></a></h1>
            <div class="nav-box">
                <h2 class="hidden">�ָ޴� ����</h2>
                
                <ul class="nav-main-lst">
                    <li class="mnu">
                        <a href="#">�Ϲ�����</a>
                        <ul class="nav-sub-lst">
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                        </ul>
                    </li>
                    <li class="mnu2">
                        <a href="#">�������</a>
                        <ul class="nav-sub-lst">
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                        </ul>
                    </li>
                    <li class="mnu3">
                        <a href="#">���뿪��</a>
                        <ul class="nav-sub-lst">
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                        </ul>
                    </li>
                    <li class="mnu4">
                        <a href="#">���� �� �ڰ���</a>
                        <ul class="nav-sub-lst">
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                        </ul>
                    </li>
                    <li class="mnu5">
                        <a href="#">�������� �ȳ�</a>
                        <ul class="nav-sub-lst">
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                        </ul>
                    </li>
                    <li class="mnu6">
                        <a href="#">�� ���ǽ�</a>
                        <ul class="nav-sub-lst">
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                            <li><a href="#">����޴�</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="nav-sub-box">
            <div class="inner"><!-- <a href="#"><img src="/" alt="����̹���" width="171" height="196"></a> --></div>
        </div>

    </div>

    <div class="top-section">
        <div class="inner">
            <div class="link-box">
            <?php 
					if(!$_SESSION["id"]){
					
					?>
					<a href="00_�α���.html">�α���</a>
					<a href="#">ȸ������</a>
					<a href="#">���/������</a>
					<!-- �α����� -->
					<?php } else if($_SESSION["id"]){ ?>
					<a href="logout.php">�α׾ƿ�</a>
					<a href="myInformation.php">������</a>
					<a href="#">���/������</a>
					<?php } ?>	
            </div>
        </div>
    </div>
</div>