<?php // oturumu baslatalim

 session_start();

 // oturumu oldurelim

 session_destroy();

 // ansayfaya gidelim

 header("location:login.php");

echo "TEKRAR BEKLERİZ";?>