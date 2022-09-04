
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Konferans Ekle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?=SITE?>">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Konferans Ekle</li>
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
                            $dosya=$VT->filter($_FILES["dizi_dosya"]);

                            if(!empty($dosya))

                            {
                                $dizi_ismi= $_FILES["dizi_dosya"]["name"];
                                $tmp_dizi_ismi=$_FILES["dizi_dosya"]["tmp_name"];
                                $dizi_tipi=$_FILES["dizi_dosya"]["type"];
                                $dizi_boyutu=$_FILES["dizi_dosya"]["size"];
                                $dizi_hata=$_FILES["dizi_dosya"]["error"];




                              //  $yukle=$VT->upload("resim","../images/".konferanslar."/");
                                //$yukle=$VT->upload("dosya","../makale/".konferanslar."/");
                                for($i=0; $i<count($tmp_dizi_ismi); $i++)
                                {
                                    if(move_uploaded_file($tmp_dizi_ismi[$i],"makaleler/".$dizi_ismi[$i]))
                                    {
                                    $ekle = $VT->SorguCalistir("INSERT INTO konferanslar", "SET adi=?, konusu=?, yer=?, konusmaci=?, kad=?, tarih=? dosya=? ", array($adi, $konusu, $yeri, $konusmaci, $kad, date("Y-m-d"), $dizi_ismi));

                                    }
                                else
                                    {
                                        ?>
                                        <div class="alert alert-info">dosya yükleme işleminiz başarısız..</div>
                                        <?php
                                    }
                                }
                            }
                          else
                                {
                                    $ekle=$VT->SorguCalistir("INSERT INTO konferanslar","SET adi=?, konusu=?, yer=?, konusmaci=?, kad=?, tarih=? ",array($adi,$konusu,$yeri,$konusmaci,$kad,date("Y-m-d")));
                               }
                            if($ekle!=false)
                                {
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
                                <input type="text" class="form-control" placeholder="Konferans Adı..." name="adi">
                </div>
            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konferansın Konusu ve Makaleniz</label>
                                <textarea class="textarea" placeholder="Konferans Konusu..." name="konusu"
                                          style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Yeri</label>
                                <input type="text" class="form-control" placeholder="konferans Yeri ..." name="yeri">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konuşmacı</label>
                                <input type="text" class="form-control" placeholder="Konusmaci ..." name="konusmaci">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tarih</label>
                                <input type="text" class="form-control" placeholder="Konferans Tarihi ..." name="tarih">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dosya Ekle</label>
                                <input type="file" class="form-control" placeholder="Dosyanızı ekleyin  ..." name="dizi_dosya[]">
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