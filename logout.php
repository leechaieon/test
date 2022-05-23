<?php
    session_start();
    session_destroy();
    echo "<script>alert('로그아웃 되었습니다.');

            window.open('lecture/04_수강후기_리스트.php','_self')</script>";
?>