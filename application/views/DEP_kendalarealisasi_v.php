<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Improvement Planning</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

        <!--Font Awesome--> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/fontawesome/css/font-awesome.min.css">
        <!--Ionicons--> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/ionicons/css/ionicons.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">



    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="#" class="logo" style="background-color: #1A2226;">
                    <!--<img style="margin: 0 auto; height: 80%; margin-top: 2%" class="img-responsive" src="dist/img/pakerin.gif">-->

                    <!--mini logo for sidebar mini 50x50 pixels--> 
                    <span class="logo-mini"><b style="font-size: small; color: white;">I</b><b style="font-size: small; color: #3597E0;">Plan</b></span>
                    <!--logo for regular state and mobile devices--> 
                    <span class="logo-sm">
                        <b style="font-size: small; color: white;">IMPROVEMENT</b>
                        <b style="font-size: small; color: #3597E0;"> PLANNING</b> 
                    </span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>-->
                                    <?php
                                    echo date('l, d-m-Y');
                                    ;
                                    ?>
                                </a>
                            </li>
                            <!-- Logout -->
                            <!--                            <li class="dropdown user user-menu">
                                                             Logout Button 
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #357CA5;">
                                                                 hidden-xs hides the username on small devices so only the image appears. 
                                                                <span class="hidden-xs"><i class="fa fa-power-off" aria-hidden="true"></i></span>
                                                            </a>
                                                        </li>-->
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>dist/img/pakerin.gif" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $nama; ?></p>
                            <!-- Status -->
                            <a href="#"><?php echo $namaDepartemen; ?></a>
                        </div>
                    </div>

                    <?php include 'sidebar_dept.php'; ?>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Kendala Realisasi
                        <small></small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Input Kendala</h3> 

                                    <a href="<?php echo base_url(); ?>index.php/DEP_kendalarealisasi_c/cetakPDF/<?php echo $iddepartemen; ?>/<?php echo $tahun; ?>">
                                        <button class="btn btn-default pull-right"> <i class="fa fa-print" aria-hidden="true"></i>  PDF</button>
                                    </a>
                                    <!--<button class="btn btn-default pull-right"> <i class="fa fa-print" aria-hidden="true"></i>  PDF</button>-->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $pesan; ?>
                                    <h2 class="text-center">Kendala Realisasi</h2>
                                    <h4 class="text-center">Tahun <?php echo date('Y'); ?></h4>
                                    <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Program Improvement</th>
                                                <th>Progress</th>
                                                <th>Kendala Realisasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($improvement as $key) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo sprintf("%04s", $key->id); ?>-<?php echo sprintf("%03s", $key->Departemen_id); ?>-<?php echo $key->periode; ?></td>
                                                    <td>
                                                        <!--<button type="button" class="btn btn-sm btn-primary" >Edit</button>-->
                                                        <a data-toggle="modal" data-target="#Detil<?php echo $key->id; ?>"><?php echo $key->judul_improvement; ?></a>
                                                        <?php
                                                        if ($key->periode != date('Y')) {
                                                            echo "<span class=\"label label-warning\">Lanjutan</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="width: 20%" >
                                                        <div class="progress text-center" >
                                                            <?php
                                                            if ($key->persentaseCapaian == NULL || $key->persentaseCapaian == 0) {
                                                                $persentase = "0%";
                                                                echo "0%";
//                                                                echo "<span class=\"label label-danger\">Belum Ada Progress</span>";
                                                            } elseif ($key->persentaseCapaian == "100") {
                                                                $persentase = $key->persentaseCapaian . "%";
                                                                echo "<div class=\"progress-bar progress-bar-success progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"5\" aria-valuemin=\"0\" aria-valuemax=\"6\" style=\"width: $persentase; \">" . $persentase;
                                                            } else {
                                                                $persentase = round($key->persentaseCapaian, 2) . "%";
                                                                echo "<div class=\"progress-bar progress-bar-warning progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"5\" aria-valuemin=\"0\" aria-valuemax=\"6\" style=\"width: $persentase; \">" . $persentase;
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>


                                                            <!--<td><?php // echo $key->persentaseCapaian;   ?></td>-->

                                                    <td class="text-center" style="width: 10%">
                                                        <?php
                                                        if ($key->kendalaRealisasi == NULL) {
                                                            echo '<b>n/a</b>';
                                                        } else {
                                                            ?>
                                                            <a data-toggle="modal" data-target="#Kendala<?php echo $key->id; ?>">
                                                                <button class="btn btn-info btn-xs">Lihat Kendala</button>
                                                            </a>
                                                            <?php
                                                            //echo $key->kendalaRealisasi;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="width: 125px">
                                                        <?php
                                                        if ($key->kendalaRealisasi == NULL) {
                                                            ?>
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addKendala<?php echo $key->id; ?>">ADD</button>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal<?php echo $key->id; ?>">Edit</button>
                                                            <a href="<?php echo base_url(); ?>index.php/DEP_kendalarealisasi_c/deleteKendala/<?php echo $key->id; ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus kendala tersebut?');">&#x274c</button></a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <!--Modal Kendala-->
                                            <div id="Kendala<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <input type="hidden" name="idImprovement" value="<?php echo $key->id; ?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title text-center">Kendala</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-justify"><?php echo $key->kendalaRealisasi; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Kendala<?php echo $key->id; ?>">OK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end of modal detil improvement-->

                                            <!--Modal Detil Improvement-->
                                            <div id="Detil<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <input type="hidden" name="idImprovement" value="<?php echo $key->id; ?>">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title text-center">Detail Improvement</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>
                                                                Judul Improvement : 
                                                            </label>
                                                            <p class="text-justify"><?php echo $key->judul_improvement; ?></p><hr>
                                                            <label>
                                                                Detail Improvement :  <br>
                                                            </label>
                                                            <xmp style="white-space:pre-wrap; word-wrap:break-word;"><?php echo $key->improvement; ?></xmp>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Detil<?php echo $key->id; ?>">OK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end of modal detil improvement-->

                                            <!--Modal add Kendala-->
                                            <div id="addKendala<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="<?php echo base_url(); ?>index.php/DEP_kendalarealisasi_c/addKendala"> 
                                                            <input type="hidden" name="idImprovement" value="<?php echo $key->id; ?>">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Add Kendala</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="">Kendala</label>
                                                                    <textarea name="kendala" class="form-control" rows="4" maxlength="1000"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#addKendala<?php echo $key->id; ?>">Cancel</button>
                                                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal">OK</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit Kendala-->
                                            <div id="myModal<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="<?php echo base_url(); ?>index.php/DEP_kendalarealisasi_c/editKendala"> 
                                                            <input type="hidden" name="idImprovement" value="<?php echo $key->id; ?>">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Edit Kendala</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Kendala</label>
                                                                    <textarea name="editanKendala" class="form-control" rows="4" maxlength="1000"><?php echo $key->kendalaRealisasi; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal<?php echo $key->id; ?>">Cancel</button>
                                                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal">OK</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>

                                    <br>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">

                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2017 TIM KPI <a href="http://pakerin.co.id">PT. PAKERIN</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->


        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>


        <!-- page script -->
        <script>
            $(function () {
                $("#example").DataTable();
            });
        </script>
        <script>
            function textCounter(field,field2,maxlimit)
            {
                var countfield = document.getElementById(field2);
                if ( field.value.length > maxlimit ) {
                    field.value = field.value.substring( 0, maxlimit );
                    return false;
                } else {
                    countfield.value = maxlimit - field.value.length;
                }
            }
        </script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
    </body>
</html>

