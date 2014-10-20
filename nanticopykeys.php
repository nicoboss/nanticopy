<?php
  $h='localhost';
  $u='31879_nanticopy';
  $p='ndjaAG6G89$%';
  $db=new mysqli($h, $u, $p, '31879_nanticopy');
  $c=0;
  $cnt=0;
  $enable=0;
  $app=$_GET['app'];
  $key=$_GET['key'];
  $q=$db->query("SELECT * FROM `Keys` WHERE `AppID` = '" . $app . "' AND `Key` = '" . $key . "'");
  while($x=$q->fetch_assoc()) {
    $c++;
    $cnt=$x['Activated'];
  }
  if ($c>0) 	$enable=1;
  if ($enable==1) echo '1;';
  else echo '0;';
  if ($cnt>0) {
    $q=$db->query("UPDATE `Keys` SET `Activated`=`Activated`-1 WHERE `AppID` LIKE '".
    $app."' AND `Key` LIKE '" . $key . "'");
  }
  echo $cnt;
  $db->close();
?>