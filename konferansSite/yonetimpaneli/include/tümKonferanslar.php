

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tüm konferanslar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?=SITE?>">AnaSayfa</a></li>
                        <li class="breadcrumb-item active">Tüm konferanslar</li>
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

            </div>

            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 50px">Sıra</th>
                            <th style="width: 100px">Konferans Adı</th>
                            <th>Konusu ve Makale</th>
                            <th style="width: 50px">Yeri</th>
                            <th style="width: 100px">Konuşmacı</th>
                            <th style="width: 130px">Tarih</th>
                            <th style="width: 130px">Ekleyen Kişi</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ID=$_SESSION["ID"];
                        $kad=$_SESSION["kad"];
                        $veriler=$VT->Getir("konferanslar","","","ORDER BY ID ASC");
                        if($veriler!=false)
                        {


                            $sira=0;
                            for($i=0;$i<count($veriler);$i++)
                            {
                                $sira++;

                                ?>
                                <tr>
                                    <td><?=$sira?></td>
                                    <td>
                                        <?php
                                        echo stripslashes($veriler[$i]['adi']);
                                        ?>
                                    </td>
                                    <td> <?php
                                        echo mb_substr(strip_tags(stripslashes($veriler[$i]["konusu"])),0,10000,"UTF-8")."...";
                                        ?>
                                    </td>
                                    <td>
                                        <?=$veriler[$i]["yer"]?>
                                    </td>
                                    <td>
                                        <?=$veriler[$i]["konusmaci"]?>
                                    </td>

                                    <td><?=$veriler[$i]["tarih"]?></td>
                                    <td><?=$veriler[$i]["kad"]?></td>

                                </tr>
                                <?php
                            }


                        }
                        ?>
                        <tr>

                        </tr>
                        </tbody>

                        <tfoot>
                        <tr>
                            <th style="width: 50px">Sıra</th>
                            <th style="width: 50px">Konferans Adı</th>
                            <th>Konusu ve Makale</th>
                            <th style="width: 50px">Yeri</th>
                            <th style="width: 100px">Konuşmacı</th>
                            <th style="width: 130px">Tarih</th>
                            <th style="width: 130px">Ekleyen Kişi</th>


                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php

/*else
{
    ?>
    <meta http-equiv="refresh" content="0; url=<?=SITE?>">
    <?php
}*/
?>