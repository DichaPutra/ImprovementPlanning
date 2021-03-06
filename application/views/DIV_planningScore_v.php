
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

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

        <!-- DataTables -->
        <!--<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/responsive.bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>rdatatable/rowReorder.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>rdatatable/responsive.dataTables.min.css">



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
                            <a href="#"><?php echo $namaDivisi; ?></a>
                        </div>
                    </div>

                    <?php include 'sidebar_divisi.php'; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Planning Score
                        <small>Penilaian Rencana</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Scoring</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/DIV_planningScore_c">Planning Score</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">

                                <div class="box-header">
                                    <h3 class="box-title">List Department</h3>
                                    <a href="<?php echo base_url(); ?>/dist/formpenilaian/FormPenilaianDepartemen.xlsx" >
                                        <form method="POST" action="<?php echo base_url(); ?>index.php/DIV_planningScore_c/editScore">

                                        </form>
                                        <!--<button class="btn btn-primary pull-right" style="margin-right: 5px"> <i class="fa fa-file-excel-o" aria-hidden="true" style="margin-right: 10px"></i> Form Penilaian</button>-->
                                    </a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $pesan; ?>
                                    
                                    <!--dropdown pilih tahun-->
                                    <div class="col-md-3  pull-right">
                                        <form method="post" action="<?php echo base_url(); ?>index.php/DIV_planningScore_c">
                                            <select class="form-control" name="tahun" onchange="this.form.submit();">
                                                <?php
                                                foreach ($tahunlist as $thn) {
                                                    ?>
                                                    <option value="<?php echo $thn->periode; ?>" <?php
                                                    if ($tahun == $thn->periode) {
                                                        echo 'selected';
                                                    }
                                                    ?>>
                                                    <?php echo $thn->periode; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </form>
                                    </div>
                                    <br><br>

                                    <h2 class="text-center">Planning Score</h2>
                                    <h4 class="text-center">Periode Th <?php echo $tahun; ?></h4>

                                    <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Divisi</th>
                                                <th class="text-center">Departemen</th>
                                                <th class="text-center">Score</th>
                                                <!--<th class="text-center">Komentar</th>-->
                                                <th class="text-center">Jumlah Planning</th>
                                                <!--<th class="text-center">Input Time</th>-->
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($departemen as $key) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td style="width: 20%; background-color:<?php echo $key->color; ?>" class="text-center"><strong><?php echo $key->namaDivisi; ?></strong></td>
                                                    <td><?php echo $key->namaDepartemen; ?></td>

                                                    <td class="text-center">
                                                        <?php
                                                        if ($key->score != NULL) {
                                                            echo $key->score;
                                                        } else {
                                                            echo '<b>n/a</b>';
                                                        }
                                                        ?>
                                                    </td>
    <!--                                                    <td class="text-center">
                                                    <?php
//                                                        if ($key->komentar != null) {
//                                                            echo "<button type=\"button\" class=\"btn btn-xs btn-default\" data-toggle=\"modal\" data-target=\"#komen$key->id\">Lihat Komentar</button>";
//                                                        } else {
//                                                            echo '<b>n/a</b>';
//                                                        }
                                                    ?>
                                                    </td>-->

                                                    <td class="text-center">
                                                        <?php
                                                        if ($key->jmlhImprovement != NULL) {
                                                            echo $key->jmlhImprovement;
                                                        } else {
                                                            echo '<b>n/a</b>';
                                                        }
                                                        ?>
                                                    </td>
    <!--                                                    <td>
                                                    <?php
//                                                        if ($key->inputTime != NULL) {
//                                                            echo $key->inputTime;
//                                                        } else {
//                                                            echo '<b>-</b>';
//                                                        }
                                                    ?>
                                                    </td>-->
                                                    <td class="text-center">
                                                        <?php
                                                        if ($setting1 == "off") {
                                                            echo '<b>< locked ><b>';
                                                        } else {
                                                            if ($key->score != NULL) {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>index.php/DIV_planningScore_c/viewImprovement/<?php echo $key->id; ?>/<?php echo $tahun; ?>"><button type="button" class="btn btn-sm btn-default">View Planning</button></a>
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editScore<?php echo $key->id; ?>">Edit Score</button>
                                                                <a href="<?php echo base_url(); ?>index.php/DIV_planningScore_c/deleteScore/<?php echo $key->idScore; ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this score?');">❌</button></a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>index.php/DIV_planningScore_c/viewImprovement/<?php echo $key->id; ?>/<?php echo $tahun; ?>"><button type="button" class="btn btn-sm btn-default">View Planning</button></a>
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#inputScore<?php echo $key->id; ?>">Input Score</button>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <!--Modal Lihat Comment-->
                                            <div id="komen<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Komentar</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?php echo $key->komentar; ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal">OK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Edit -->
                                            <div id="editScore<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="<?php echo base_url(); ?>index.php/DIV_planningScore_c/editScore"> 
                                                            <input type="hidden" name="idScore" value="<?php echo $key->idScore; ?>">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Edit Score</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input name="score" type="number" max="100" min="0" maxlength="3" class="form-control" placeholder="Score" value="<?php echo $key->score; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--Modal Input Score-->
                                            <div id="inputScore<?php echo $key->id; ?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="<?php echo base_url(); ?>index.php/DIV_planningScore_c/inputScore"> 
                                                            <input type="hidden" name="idDepartemen" value="<?php echo $key->id; ?>">
                                                            <input type="hidden" name="tahun" value="<?php echo $tahun; ?>">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Input Score</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="email">Score :</label>
                                                                    <input name="score" type="number" max="100" min="0" maxlength="3" class="form-control" placeholder="Score">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Comment : <small>(Optional)</small></label>
                                                                    <textarea name="comments" id="message" class="form-control" rows="6" maxlength="1000"></textarea>
                                                                    <div class=""></div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="modal">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

<?php } ?>
                                        </tbody>
                                    </table>
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

            <!--<script src="plugins/datatables/jquery.dataTables.min.js"></script>-->
        <script src="<?php echo base_url(); ?>rdatatable/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>rdatatable/dataTables.rowReorder.min.js"></script>
        <script src="<?php echo base_url(); ?>rdatatable/dataTables.responsive.min.js"></script>


        <!-- page script -->
        <script>
                                                                    $(document).ready(function () {
                                                                        var table = $('#example').DataTable({
                                                                            rowReorder: {
                                                                                selector: 'td:nth-child(2)'
                                                                            },
                                                                            responsive: true,
                                                                            "order": [[0, "asc"]],
                                                                            "iDisplayLength": 50
                                                                        });
                                                                    });
        </script>
        <script>
            function textCounter(field, field2, maxlimit)
            {
                var countfield = document.getElementById(field2);
                if (field.value.length > maxlimit) {
                    field.value = field.value.substring(0, maxlimit);
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

