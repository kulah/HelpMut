<?php if (!defined('CONFIG_CLASS_INCLUDED')) {
  die(header("location: ../index.php"));
}
function turkcetarih($f, $zt = 'now'){
  $z = date("$f", strtotime($zt));
  $donustur = array(
    'Monday'  => 'Pazartesi',
    'Tuesday' => 'Salı',
    'Wednesday' => 'Çarşamba',
    'Thursday'  => 'Perşembe',
    'Friday'  => 'Cuma',
    'Saturday'  => 'Cumartesi',
    'Sunday'  => 'Pazar',
    'January' => 'Ocak',
    'February'  => 'Şubat',
    'March'   => 'Mart',
    'April'   => 'Nisan',
    'May'   => 'Mayıs',
    'June'    => 'Haziran',
    'July'    => 'Temmuz',
    'August'  => 'Ağustos',
    'September' => 'Eylül',
    'October' => 'Ekim',
    'November'  => 'Kasım',
    'December'  => 'Aralık',
    'Mon'   => 'Pts',
    'Tue'   => 'Sal',
    'Wed'   => 'Çar',
    'Thu'   => 'Per',
    'Fri'   => 'Cum',
    'Sat'   => 'Cts',
    'Sun'   => 'Paz',
    'Jan'   => 'Oca',
    'Feb'   => 'Şub',
    'Mar'   => 'Mar',
    'Apr'   => 'Nis',
    'Jun'   => 'Haz',
    'Jul'   => 'Tem',
    'Aug'   => 'Ağu',
    'Sep'   => 'Eyl',
    'Oct'   => 'Eki',
    'Nov'   => 'Kas',
    'Dec'   => 'Ara',
  );
  foreach($donustur as $en => $tr){
    $z = str_replace($en, $tr, $z);
  }
  if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
  return $z;
}

?>  
<form name="form1" method="post" action="" id="form1">
  <!-- Gelen Mesaj sonu -->
    <div class="box box-info direct-chat direct-chat-info">
      <div class="box-footer">
            <div class="input-group">
              <input type="text" name="message" id="message" placeholder="Bir durum paylaşım ..." class="form-control"/>
              <span class="input-group-btn">
                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-flat">Paylaş</button>
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

<!-- Gelen Mesaj -->
<ul class="timeline">
<?php                
$sqltar = $db->query("SELECT  DATE_FORMAT(A.ETAR,'%M') AS ETAR FROM 
                      (SELECT n.ID, n.DURUM, n.ICERIK, k.ADSOYAD,n.ETAR, n.EKUL, n.DTAR, n.DKUL  
                              FROM newsfeed n,kullanici k where k.ID=n.EKUL) A
                      GROUP BY  DATE_FORMAT(A.ETAR,'%M')");
foreach ($sqltar as $timelinetarsql)
{ ?>
    <li class="time-label">
        <span class="bg-red">
        <?php echo turkcetarih('j F Y',$timelinetarsql['ETAR']);?>
        </span>
    </li>
<?php $sql = $db->query("SELECT n.ID, n.DURUM, n.ICERIK, k.ADSOYAD,n.ETAR, n.EKUL, n.DTAR, n.DKUL  FROM newsfeed n,kullanici k where k.ID=n.EKUL  AND DATE_FORMAT(N.ETAR,'%M') = '".$timelinetarsql['ETAR']."' order by n.ETAR desc");
foreach ($sql as $newsfeedsql)
{ ?>

<ul class="timeline">
    <!-- timeline tarih başı-->

    <!-- /.timeline-tarih sonu -->

    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="fa fa-user bg-aqua"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo date("H:i:s",strtotime($newsfeedsql['ETAR'])); ?></span>

            <h3 class="timeline-header"><a href="#"><?php echo $newsfeedsql['ADSOYAD'];?></a> ...</h3>

            <div class="timeline-body">
                <?php echo $newsfeedsql['ICERIK'] ?>
            </div>
            <div class='timeline-footer'>
                <a class="btn btn-primary btn-xs">Read more</a>
                <a class="btn btn-danger btn-xs">Delete</a>
                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
</ul>



                    <?php
                            }}

                    ?>


               
