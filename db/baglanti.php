<?php 
$dbhost = "localhost";
$dbuser	= "862392";
$dbpass	= "6553kulah";
$dbadi	= "862392";

try{
    $db = new PDO("mysql:host={$dbhost};dbname={$dbadi}", $dbuser, $dbpass);
    $db->exec("SET NAMES 'utf8'");
    
}
catch(PDOException $e)
{
    echo 'Connection failed: ' . $e->getMessage();
}

$baglanti = @mysql_connect($dbhost,$dbuser,$dbpass)or die ("Veri Tabani Bağlantisi Başarısız");
mysql_select_db($dbadi,$baglanti) or die ("Veri Tabani Bağlantisi Sağlanamadı");
@mysql_query("SET NAMES utf8");
?>

