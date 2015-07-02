<?php if (!defined('CONFIG_CLASS_INCLUDED')) {
  die(header("location: ../index.php"));
}?>  
<?php                
$sql = $db->query("SELECT n.ID, n.DURUM, n.ICERIK, k.ADSOYAD,n.ETAR, n.EKUL, n.DTAR, n.DKUL  FROM newsfeed n,kullanici k where k.ID=n.EKUL");
foreach ($sql as $newsfeedsql)
{ ?>
<!-- Gelen Mesaj -->

<div class="box box-solid" >
    <div class="col-md-1">    
             <img class="direct-chat-img" src="Content/img/user1-128x128.jpg" alt="message user image" />
    </div>
    <div class='box-header with-border'>
        <span class='direct-chat-name pull-left'><?php echo $newsfeedsql['ADSOYAD'];?></span>
        <span class='direct-chat-timestamp pull-right'><?php echo date("d.m.Y",strtotime($newsfeedsql['ETAR'])); ?></span>
    </div >
    <div class="box-body">
        <p><?php echo $newsfeedsql['ICERIK'] ?></p>
    </div>
</div>
                    <?php
                            }
                    ?>
<form name="form1" method="post" action="" id="form1">
  <!-- Gelen Mesaj sonu -->
    <div class="box box-info direct-chat direct-chat-info">
      <div class="box-footer">
            <div class="input-group">
              <input type="text" name="message" id="message" placeholder="Bir mesaj yaz ..." class="form-control"/>
              <span class="input-group-btn">
                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-flat">Gönder</button>
              </span>
            </div>
      </div><!-- /.box-footer-->
    </div><!--/.direct-chat -->
<?php
if ($_POST){
date_default_timezone_set('Europe/Istanbul');
$sql = "INSERT INTO newsfeed (ICERIK,EKUL,ETAR) VALUES (:title,:user,:etard)";
$q = $db->prepare($sql);
$q->execute(array("user"  => $_SESSION["kullaniciid"],
                  "title" => $_POST["message"],
                  "etard" => date("Y-m-d H:i:s")));
header("location: index.php");
}
?>
</form>