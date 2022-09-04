<?php
if(!empty($_GET["ID"]))
{
    $ID=$VT->filter($_GET["ID"]);
    $veri=$VT->Getir("konferanslar","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
    ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Konferans Düzenle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?=SITE?>">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Konferans Düzenle</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?=SITE?>KonferansListe"class="btn btn-info" style="float: right; margin-bottom:10px;margin-left: 10px "><i class="fas fa-bars"></i> LİSTE </a>
                    <a href="<?=SITE?>KonferansEkle"class="btn btn-success" style="float: right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE </a>
                </div>
            </div>
            <?php
            $kad=$_SESSION["kad"];
            if ($_POST)
                {
                    if(!empty($_POST["adi"]) && !empty($_POST["konusu"]) && !empty($_POST["yeri"]) && !empty($_POST["konusmaci"]) && !empty($_POST["tarih"]))
                        {
                            $adi=$VT->filter($_POST["adi"]);
                            $konusu=$VT->filter($_POST["konusu"],true);
                            $yeri=$VT->filter($_POST["yeri"]);
                            $konusmaci=$VT->filter($_POST["konusmaci"]);
                            $tarih=$VT->filter($_POST["tarih"]);

                            /*if(!empty($_FILES["resim"]["name"]))
                                {
                                    $yukle=$VT->upload("resim","../images/".$kontrol[0]["tablo"]."/");
                                    if($yukle!=false)
                                        {
                                            $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET baslik=?, seflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?, durum=?, sirano=?, tarih=?",
                                                array($baslik,$seflink,$kategori,$metin,$yukle,$anahtar,$description,1,$sirano,date("Y-m-d")));
                                        }
                                    else
                                        {
                                            ?>
                                            <div class="alert alert-info">Resim yükleme işleminiz başarısız..</div>
                                            <?php
                                        }
                                }*/
                           // else
                                //{
                                    $ekle=$VT->SorguCalistir("UPDATE konferanslar","SET adi=?, konusu=?, yer=?, konusmaci=?, kad=?, tarih=? WHERE ID=?",array($adi,$konusu,$yeri,$konusmaci,$kad,date("Y-m-d"),$veri[0]["ID"]));
                               // }
                            if($ekle!=false)
                                {
                                    $veri=$VT->Getir("konferanslar","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
                                    ?>
                                    <div class="alert alert-success">İşleminiz başarıyla kaydedildi..</div>
                                    <?php
                                }
                            else
                                {
                                    ?>
                                    <div class="alert alert-info">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz..</div>
                                    <?php
                                }
                        }
                    else
                        {
                            ?>
                            <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz..</div>
                            <?php
                        }
                }
            ?>

              <form action="#" method="post" enctype="multipart/form-data">
                  <div class="col-md-8">
                      <div class="card-body card card-primary">
                    <div class="row">
                        <div class="col-md-12">

                    </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konferans Adı</label>
                                <input type="text" class="form-control" placeholder="Konferans Adı..." name="adi" value="<?=stripslashes($veri[0]["adi"])?>">
                </div>
            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konusu</label>
                                <textarea class="textarea" placeholder="Konferans Konusu..." name="konusu"
                                          style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" <?=stripslashes($veri[0]["konusu"])?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Yeri</label>
                                <input type="text" class="form-control" placeholder="konferans Yeri ..." name="yeri" value="<?=stripslashes($veri[0]["yer"])?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konuşmacı</label>
                                <input type="text" class="form-control" placeholder="Konusmaci ..." name="konusmaci" value="<?=stripslashes($veri[0]["konusmaci"])?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tarih</label>
                                <input type="text" class="form-control" placeholder="Konferans Tarihi ..." name="tarih" value="<?=stripslashes($veri[0]["tarih"])?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dosya Ekle</label>
                                <input type="file" class="form-control" placeholder="Dosyanızı ekleyin  ..." name="dosya" value="<?=stripslashes($veri[0]["dosya"])?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                            </div>
                        </div>
                    </div>
                      </div>
                  </div>

              </form>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php
}
/*
    else
    {
        ?>
        <meta http-equiv="refresh" content="0; url=<?=SITE?>">
        <?php
    }

else
{
    ?>
    <meta http-equiv="refresh" content="0; url=<?=SITE?>">
    <?php
}*/
    ?>