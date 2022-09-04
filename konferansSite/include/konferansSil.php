<?php
if(!empty($_GET["ID"]))
{

    $ID=$VT->filter($_GET["ID"]);

            $sil=$VT->SorguCalistir("DELETE FROM konferanslar","WHERE ID=?",array($ID),1);
         if($sil)
            {
            ?>
            <meta http-equiv="refresh" content="0; url=<?=SITE?>konferansListe">
            <?php
        }
}
       /* else
        {
            ?>
            <meta http-equiv="refresh" content="0; url=<?=SITE?>konferansListe">
            <?php
        }



else
{
    ?>
    <meta http-equiv="refresh" content="0; url=<?=SITE?>">
    <?php
}*/
    ?>