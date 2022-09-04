<?php
include_once(SINIF."class.upload.php");
include_once(SINIF."VT.php");
$VT=new VT();
$ayar=$VT->Getir("ayar","WHERE ID=?",array(1),"ORDER BY ID ASC",1);

if($ayar!=false)
{
    $sitebaslik=$ayar[0]["baslik"];
    $siteanahtar=$ayar[0]["anahtar"];
    $siteaciklama=$ayar[0]["aciklama"];
    $sitetelefon=$ayar[0]["telefon"];
    $sitemail=$ayar[0]["mail"];
    $sitefax=$ayar[0]["fax"];
    $siteadres=$ayar[0]["adres"];
    $siteURL=$ayar[0]["url"];


}
else
{ echo "bos geldi";}

?>