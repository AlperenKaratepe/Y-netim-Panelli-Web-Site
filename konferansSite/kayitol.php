<?php
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");

include_once(DATA."baglanti.php");
define("SITE",$siteURL);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kayıt Ol</title>
    <meta http-equiv="keyword" content="">
    <meta http-equiv="description" content="">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=SITE?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=SITE?>"><b>Kayıt</b>Ol</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Kayıt olmak için bilgilerinizi yazınız...</p>
        <?php
        if ($_POST)
        {

            if(!empty($_POST["adsoyad"]) && !empty($_POST["kullanici"]) && !empty($_POST["sifre"]) && !empty($_POST["mail"]) && !empty($_POST["tarih"]))
            {

                $adsoyad=$VT->filter($_POST["adsoyad"]);
                $kullanici=$VT->filter($_POST["kullanici"]);
                $sifre=$VT->filter($_POST["sifre"]);
                $mail=$VT->filter($_POST["mail"]);
                $tarih=$VT->filter($_POST["tarih"]);


                $a=$VT->SorguCalistir("INSERT INTO kullanici","SET adsoyad=?, kullanici=?, sifre=?, mail=?, tarih=?",array($adsoyad,$kullanici,$sifre,$mail,$tarih));

            }

                if($a!=false)
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

                <?php
            }


        ?>

      <form action="kayitol.php" method="post">
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="adsoyad" placeholder="Adınız Soyadınız...">
              <div class="input-group-append">
                  <div class="input-group-text">

                  </div>
              </div>
          </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adınız...">
          <div class="input-group-append">
            <div class="input-group-text">

            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="sifre" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">

            </div>
          </div>
        </div>

          <div class="input-group mb-3">
              <input type="text" class="form-control" name="mail" placeholder="Mail...">
              <div class="input-group-append">
                  <div class="input-group-text">

                  </div>
              </div>
          </div>
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="tarih" placeholder="Tarih...">
              <div class="input-group-append">
                  <div class="input-group-text">

                  </div>
              </div>
          </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-14">
            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
          </div>
            <div class="col-8">
                <a href="<?=SITE?>giris-yap"class="btn btn-success" style=""> Giriş Yap </a>

            </div>

          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE?>dist/js/adminlte.min.js"></script>

</body>
</html>
