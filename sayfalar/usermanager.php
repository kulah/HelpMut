<?php if (!defined('CONFIG_CLASS_INCLUDED')) {
  die(header("location: ../index.php"));
}?>
<div class="row">
	 <div class="col-xs-12">
		<div class="box">
			<div class="box-header">
	            	<div class="input-group">
		               		<a href="kullanicihesaplari.php?do=TumKullanici">
		               			<button class="btn btn-default btn-sm ">Tümünü Listele</button>  
		               		</a>
		                	<a href="kullanicihesaplari.php?do=AktifKullanicilar">
		                   	 	<button class="btn btn-success  btn-sm">Aktif Kullanıcılar</button>     
		                	</a>
		                	<a href="kullanicihesaplari.php?do=PasifKullanici" >
		                    	<button class="btn btn-success  btn-sm">Pasif Kullanıcıları Listele</button>    
		                	</a>
		               		<a href="kullanicihesaplari.php?do=yenikayit" >
		                  		<button class="btn btn-success  btn-sm">Yeni Kayit</button>   
		               		</a>
	            	</div>
        	</div>
        </div>
	</div>
</div>
<?php
switch (filter_input(INPUT_GET,"do",FILTER_SANITIZE_SPECIAL_CHARS))
{
    case "PasifKullanici":
        $sql = $db->query("SELECT ID, DURUM, USERNAME, PASSWORD, ADMIN,"
                ."USER_GRUP, ADSOYAD, email, FOTO FROM kullanici"
                ." WHERE DURUM='-'");
    break;
    case "AktifKullanicilar":
        $sql = $db->query("SELECT ID, DURUM, USERNAME, PASSWORD, ADMIN,"
                ."USER_GRUP, ADSOYAD, email, FOTO  FROM kullanici"
                ." WHERE DURUM='+'");
    break;
    case "yenikayit":
        echo "<td colspan=\"7\">Yeni</td>";
    break;
    case "duzenKayit":
        date_default_timezone_set('Europe/Istanbul');
        try{
            
        $updtQuery = $db->prepare("UPDATE kullanici SET 
            USERNAME = :dusername, 
            ADSOYAD = :dadsoyad,
            email = :demail,
            dkul = :ddkul,
            dtar = :ddtar
            WHERE ID= :duserid");

        $update = $updtQuery->execute(array(
            "dusername" => filter_input(INPUT_POST, "usernameup", FILTER_SANITIZE_SPECIAL_CHARS),
            "dadsoyad" => filter_input(INPUT_POST, "adisoyadiup", FILTER_SANITIZE_SPECIAL_CHARS),
            "demail" => filter_input(INPUT_POST, "emailup", FILTER_SANITIZE_EMAIL),
            "ddkul" => filter_input(INPUT_SESSION, "kullaniciid", FILTER_SANITIZE_NUMBER_INT),
            "ddtar" => date("Y-m-d H:i:s"),
            "duserid" =>  filter_input(INPUT_POST, "duzenlenuserid", FILTER_SANITIZE_NUMBER_INT)
            ));
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
        if(!$update)
        {
            echo 'Kullanıcı bilgileri güncellenemedi!';
             header("location: kullanicihesaplari.php");    
        }else{
            echo 'Kullanıcı bilgileri güncellendi!';
             header("location: kullanicihesaplari.php");

        }
        break;
    case "duzenle":
        $result = $db->query("SELECT ID, DURUM, USERNAME, PASSWORD, ADMIN, "
            ."USER_GRUP, ADSOYAD, email, FOTO  FROM kullanici WHERE ID=".
            filter_input(INPUT_POST, "duzenleid", FILTER_VALIDATE_INT))
            ->fetch(PDO::FETCH_ASSOC);
    break;
    case "sil":
       
     date_default_timezone_set('Europe/Istanbul');
        try{
                            $query = $db->prepare("UPDATE kullanici SET DURUM = ?, dkul = ?,
                            dtar = ? WHERE ID = ?");
                            $del = $query->execute(array(
					                    "-",
					                    $_SESSION["kullaniciid"],
					                    date("Y-m-d H:i:s"),
										filter_input(INPUT_POST, "silid", FILTER_SANITIZE_NUMBER_INT)

                                      ));
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
        if(!$del)
        {
            echo 'Kullanıcı silinemedi!'; 
                header("location: kullanicihesaplari.php");

        }else{
            echo 'Kullanıcı silindi!';
            header("location: kullanicihesaplari.php");

        }
    break;
     case "Aktif":
       
     date_default_timezone_set('Europe/Istanbul');
        try{
            $query = $db->prepare("UPDATE kullanici SET DURUM = ?, dkul = ?,
                            dtar = ? WHERE ID = ?");
            
            $update = $query->execute(array(
                    "+",
                    $_SESSION["kullaniciid"],
                    date("Y-m-d H:i:s"),
                    filter_input(INPUT_POST, "aktifid", FILTER_SANITIZE_NUMBER_INT)
                ));
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
        if(!$update)
        {
            echo 'Kullanıcı bilgileri güncellenemedi!'; 
                header("location: kullanicihesaplari.php");
        }else{
            echo 'Kullanıcı bilgileri güncellendi!';
                header("location: kullanicihesaplari.php");

        }
    break;
    case "TumKullanici":
    default:
        $sql = $db->query("SELECT ID, DURUM, USERNAME, PASSWORD, ADMIN,"
                ."USER_GRUP, ADSOYAD, email, FOTO FROM kullanici");
    break;
}?>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Kullanıcı Hesap Yönetimi</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered  table-striped">
                  	<thead>
                      <tr>
                        <th>ID</th>
                        <th>Durum</th>
                        <th>Kullanıcı Adı</th>
                        <th>Adı Soyadı</th>
                        <th>E-Mail</th>
						<th>Düzenle</th>
						<th>Aktif/Pasif</th>
                      </tr>
                    </thead>   
                    	<tbody>

<?php if($sql != null)
{ ?>


	<?PHP foreach ($sql as $usersql)
{ 
	$durumrenk = ($usersql['DURUM'] == "+")?"success":"danger";?>
                      <tr class="<?php echo $durumrenk ?>">
                        <td><?php echo $usersql['ID'] ?></td>
                        <td><?php echo $usersql['DURUM'] ?></td>
                        <td><?php echo $usersql['USERNAME'] ?></td>
                        <td><?php echo $usersql['ADSOYAD'] ?></td>
                        <td><?php echo $usersql['email'] ?></td>
                        <td>
                        	<form action="kullanicihesaplari.php?do=duzenle" method="POST">
                    			<button class="btn btn-info btn-sm" name="duzenleid" value="<?php echo $usersql['ID'] ?>">Düzenle</button>
                			</form>
                		</td>

                		<td>
                				<?php if($usersql['DURUM'] == "+"){?>
							<form action="kullanicihesaplari.php?do=sil" method="POST">
                    			<button class="btn btn-danger btn-sm" name="silid" value="<?php echo $usersql['ID'] ?>">Pasif et</button>
                			</form>
                			      <?php }else{ ?>
							<form action="kullanicihesaplari.php?do=Aktif" method="POST">
                    			<button class="btn btn-success btn-sm" name="aktifid" value="<?php echo $usersql['ID'] ?>">Aktif et</button>
                			</form>
                			      <?php }?>
                		</td>
                      </tr>
<?php }?>
 

                   
<?php }elseif($result != NULL){
    
    $useridU = $result['ID'];
    $userdurumU = $result['DURUM'];
    $kullaniciadiU = $result['USERNAME'];
    $adisoyadiU = $result['ADSOYAD'];
    $emailU = $result['email'];?>

   					<form action="kullanicihesaplari.php?do=duzenKayit" method="POST">
            <div class="body bg-gray ">
           
        <div class="form-group">
             <input type="number" name="duzenlenuserid"  readonly class="form-control" placeholder="Kullanıcı ID" value="<?php echo $useridU ?>" />
        </div>
        <div class="form-group">
            <input type="text" name="usernameup" class="form-control" placeholder="Kullanıcı Adınız" value="<?php echo $kullaniciadiU ?>" />
        </div>
        <div class="form-group">
            <input type="text" name="adisoyadiup" class="form-control" placeholder="Şifreniz" value="<?php echo $adisoyadiU ?>"/>
        </div>
        <div class="form-group">
            <input type="text" name="emailup" class="form-control" placeholder="Email" value="<?php echo $emailU ?>"/>
        </div>
        <div class="form-group">
            <input type="password" name="passwordup" class="form-control" placeholder="Şifreniz" value="<?php echo '1' ?>"/>
        </div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-green pull-left ">Kaydet</button>
            </div>
            <div class="footer">                                                               
                <a href="kullanicihesaplari.php" class="btn bg-red pull-left">Vazgeç</a>
            </div>
        </form>	
<?php 	}?> 		</tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->