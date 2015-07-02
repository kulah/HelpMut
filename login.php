<?php 
ob_start();
session_start();
 
if(!isset($_SESSION["giris"])){
    header("login.php");
}
else {
    echo "<center>".$_SESSION["kadi"]." sayfasina hosgeldiniz..! ";
    echo "<a href=logout.php>Guvenli cikis</a></center>";
    ob_end_flush();
}?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>IBK YAZILIM | Giriş Yap</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="Content/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="Content/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="Content/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <link href="Content/css/animate.css" rel="stylesheet" type="text/css" />
	<link rel="icon" type="images/ico" href="Content/img/favicon.ico" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="css/jquery.min.js"></script><style type="text/css"></style>
    <script src="css/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script type="text/javascript">
        function acac(baslik, icerik) {
            $("#myModalLabel").html(baslik);
            $('.modal-body').html(icerik);
            $('#myModal').modal('show');
      $('#myModal').modal('hide');
      $('#myModal').modal('toggle');
        }
        jQuery(document).ready(function ($) {
            var min_height = jQuery(window).height();
            jQuery('div.login-page-container').css('min-height', min_height);
            jQuery('div.login-page-container').css('line-height', min_height + 'px');

            //$(".inner", ".boxed").fadeIn(500);
        });
    </script>
  </head>
<?php include ("db/baglanti.php");?>

  <body class="login-page">
<div id="KullaniciBulunamadi" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">İşlem Hata İle Sona Erdi</h4>
            </div>
            <div class="modal-body">
                <p>Kullanıcı Bulunamadı.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tamam</button>
            </div>
        </div>
    </div>
</div>
<div id="YanlisParola" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">İşlem Hata İle Sona Erdi</h4>
            </div>
            <div class="modal-body">
                <p>Yanlış Şifre Girdiniz.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tamam</button>
            </div>
        </div>
    </div>
</div>
<div id="KullaniciPasif" class="modal fade ">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">İşlem Hata İle Sona Erdi</h4>
            </div>
            <div class="modal-body">
                <p>Kullanıcınız Pasif Edilmiştir.Sistem Yöneticisine Başvurunuz</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tamam</button>
            </div>
        </div>
    </div>
</div>


    <div class="login-box boxed animated bounceOut flipInX">
      <div class="login-box-body">
        <h3><p class="login-box-msg">Giriş Yapınız. </p></h3>
        <form name="form1" method="post" action="login.php" id="form1">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="kadi" name="kadi" placeholder="Kullanıcı Adınız"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id ="sifre" name="sifre" class="form-control" placeholder="Şife"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Beni Hatırla
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
            </div><!-- /.col --> 
          </div>

        <a href="#">Şifremi Unuttum</a><br>
        <a href="register.php" class="text-center">Kayıt Ol</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php
    if ($_POST){     //Sayfaya herhangi bir veri post edilmimi kontrol ediyoruz
  $kadi  = $_POST["kadi"] ;
  $sifre = $_POST["sifre"];
# kullanici bilgisi alalim
  $sorgu = mysql_query("select password,DURUM from kullanici where  username = '".$kadi."'");
  if( mysql_num_rows($sorgu) != 1 ){
    
    print '<script type="text/javascript">
  $(document).ready(function(){
    $("#KullaniciBulunamadi").modal("show");
  });
</script>';
    #print '<script>alert("Kullanıcı bulunamadı!");history.back(-1);</script>';
    exit;
  }
  else{
    # veriyi alıyoruz
      $bilgi = mysql_fetch_assoc($sorgu);
  }

  if ($bilgi["DURUM"] == "-") {
     print '<script type="text/javascript">
  $(document).ready(function(){
    $("#KullaniciPasif").modal("show");
  });
</script>';
    #print '<script>alert("Kullanıcınız Pasif Edilmiştir.Lütfen  Yetkili ile görüşünüz.");history.back(-1);</script>';
    exit;
    }
  # sifre eslestirmesi
  if( trim($sifre) != trim($bilgi["password"]))
  {
     print '<script type="text/javascript">
  $(document).ready(function(){
    $("#YanlisParola").modal("show");
  });
</script>';
    #print '<script>alert("Yanlış şifre girdiniz!");history.back(-1);</script>';
exit;
  } 

  $sorgu2 = mysql_query("select id,username,adsoyad,user_grup,durum,admin,etar,ekul,dtar,dkul,email,foto from kullanici where username = '".$kadi."'");  
  $oku = mysql_fetch_assoc($sorgu2);
  
# başarılı giriş yapıldı
# oturuma kaydedip anasayfaya gidelim
  $_SESSION["giris"] ="kullanic_oturum_".$bilgi["password"].("_ds785667f5e67w423yjgty") ;
  $_SESSION["kadi"]  = $kadi;
  $_SESSION["adsoyad"]  = $oku["adsoyad"];
  $_SESSION["user_grup"]  = $oku["user_grup"];
  $_SESSION["kayit_tar"]  = $oku["etar"];
  $_SESSION["email"]  = $oku["email"];
  $_SESSION["avatar"]  = $oku["foto"];
  $_SESSION["kullaniciid"]  = $oku["id"];
  header("location: index.php");
    }?> 
    <!-- jQuery 2.1.4 -->
    <script src="Content/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="Content/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="Content/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });    

    </script>
    </form>
  </body>
</html>