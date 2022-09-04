<?php
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");

include_once(DATA."baglanti.php");
define("SITE",$siteURL);
if(!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]))
{
    ?>
    <meta http-equiv="refresh" content="0;url=<?=SITE?>">
    <?php
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kullanıcı Girişi</title>
    <meta http-equiv="keyword" content="<?=$siteanahtar?>">
    <meta http-equiv="description" content="<?=$siteaciklama?>">
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
    <a href="<?=SITE?>"><b>Kullanıcı</b>Girişi</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Giriş yapmak için bilgilerinizi yazınız...</p>
        <?php
        if($_POST)
        {
            echo '<div class="alert alert-danger>dogru...</div>';
           if(!empty($_POST["kullanici"]) && !empty($_POST["sifre"]))
           {
                $kullanici=$VT->filter($_POST["kullanici"]);
                $sifre=($VT->filter($_POST["sifre"]));
                $_SESSION["kad"]=$kullanici;
                $kontrol=$VT->Getir("kullanici","WHERE kullanici=? AND sifre=?",array($kullanici,$sifre),"ORDER BY ID ASC",1);
                    if($kontrol!=false)
                    {
                        $_SESSION["kullanici"]=$kontrol[0]["kullanici"];
                        $_SESSION["adsoyad"]=$kontrol[0]["adsoyad"];
                        $_SESSION["mail"]=$kontrol[0]["mail"];
                        $_SESSION["ID"]=$kontrol[0]["ID"];
                        echo '<div class="alert alert-danger> Bilgiler Dogru...</div>';
                        ?>
                        <meta http-equiv="refresh" content="0;url=<?=SITE?>"/>
                           <?php
                        exit();
                    }
                    else
                    {
                        echo '<div class="alert alert-danger>Kulanıcı adı veya sifre hatalıdır...</div>';
                    }
           }
           else
           {
               echo '<div class="alert alert-danger>Boş bıraktığınız alanları doldurunuz...</div>';
           }
        }
        ?>

      <form action="#" method="post">
	 
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adınız...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="sifre" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
            <div class="col-8">
                <a href="<?=SITE?>kayitol"class="btn btn-success" style=""> Kayit Ol </a>

            </div>
            <div class="col-8">
                <br>
                <a href="<?=SITE?>yonetimpaneli/giris-yap"class="btn btn-success" style="">Admin Panele Giriş </a>

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
