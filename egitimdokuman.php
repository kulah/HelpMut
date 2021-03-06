<?php include ("db/baglanti.php");
ob_start();
session_start();
 
if(!isset($_SESSION["giris"]))
{
    header("location: logout.php");
}
define('CONFIG_CLASS_INCLUDED',1) 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>IBK YAZILIM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="Content/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="Content/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="images/ico" href="Content/img/favicon.ico" />
    <link href="Content/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="Content/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="Content/js/jquery-1.3.2.min.js"></script>

<script type="text/javascript">

 function ajax_listele(){
            var xmlhttp;
 
            if (window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
 
                    document.getElementById("tablo").innerHTML=xmlhttp.responseText;
 
                }
            }
 
            xmlhttp.open("POST","index.php",true);
            xmlhttp.send();
        }

</script>
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
<?php include_once("sayfalar/header.php"); ?>
<?php include_once("sayfalar/solmenu.php"); ?>
      <!-- Orta Bolum Üst Panelden itibaren İçerik dahil Başlangıcı -->
        <div class="content-wrapper">
          <!-- Orta Üst Panel Sadece Üst Bilgi Başı -->
          <section class="content-header">
            <h1>
              Döküman Yönetimi
              <small>Eğitim Dökümanları</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i> Döküman Yönetimi</a></li>
              <li class="active">Eğitim Dökümanları</li>
            </ol>
          </section>
          <!-- Orta Üst Panel Sadece Üst Bilgi Sonu-->

          <!-- Orta Bolum Başlangıcı -->
          <section class="content">
              <!-- Orta Bolum İçerik Başı -->
              <?php include_once("sayfalar/egitimformicerik.php"); ?>  		  
  		        <!-- Orta Bolum İçerik Sonu -->
          </section><!-- Orta Bolum Bitişi -->
        </div>
      <!-- Orta Bolum Üst Panel Sonu -->
      <!-- Orta Alt Bilgi Başlangıcı -->
            <?php include_once("sayfalar/footer.php"); ?>    
      <!-- Orta Alt Bilgi Sonu -->
    <!-- REQUIRED JS SCRIPTS -->
    <script src="Content/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="Content/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="Content/js/app.min.js" type="text/javascript"></script>
        <script src="Content/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="Content/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>



    <script src="Content/plugins/datatables/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="Content/plugins/datatables/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="Content/plugins/datatables/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
<script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script

  </body>
</html>