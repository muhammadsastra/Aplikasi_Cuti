<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
 <?php 
 include "session.php";
 ?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   
   <?php include "header.php"; ?>

    <div class="app-body">
   <?php include "menu.php"; ?>

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Dashboard</li>

                <!-- Breadcrumb Menu-->
              <!--  <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn" href="#"><i class="icon-speech"></i></a>
                        <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                        <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                    </div>
                </li>-->
            </ol>


            <div class="container-fluid">





                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="card">
                            <?php $tampil=mysqli_query($koneksi, "select * from cuti order by id desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                                <div class="card-body p-3 clearfix">
                                    <i class="fa fa-book bg-primary p-3 font-2xl mr-3 float-left"></i>
                                    <div class="h5 text-primary mb-0 mt-2"><?php echo $total; ?></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs">Total Cuti</div>
                                </div>
                                <div class="card-footer px-3 py-2">
                                    <a class="font-weight-bold font-xs btn-block text-muted" href="cuti.php">Detail Cuti <i class="fa fa-angle-right float-right font-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-6 col-lg-3">
                            <div class="card">
                             <?php $tampil1=mysqli_query($koneksi, "select * from cuti where status='Approve'");
                        $total1=mysqli_num_rows($tampil1);
                    ?>
                                <div class="card-body p-3 clearfix">
                                    <i class="fa fa-calendar-check-o bg-info p-3 font-2xl mr-3 float-left"></i>
                                    <div class="h5 text-info mb-0 mt-2"><?php echo $total1; ?></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs">Approve Cuti</div>
                                </div>
                                <div class="card-footer px-3 py-2">
                                    <a class="font-weight-bold font-xs btn-block text-muted" href="cuti.php">Detail Cuti Approve <i class="fa fa-angle-right float-right font-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-6 col-lg-3">
                            <div class="card">
                            <?php $tampil2=mysqli_query($koneksi, "select * from cuti where status='Reject'");
                        $total2=mysqli_num_rows($tampil2);
                    ?>
                                <div class="card-body p-3 clearfix">
                                    <i class="fa fa-calendar-minus-o bg-warning p-3 font-2xl mr-3 float-left"></i>
                                    <div class="h5 text-warning mb-0 mt-2"><?php echo $total2 ?></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs">Reject Cuti</div>
                                </div>
                                <div class="card-footer px-3 py-2">
                                    <a class="font-weight-bold font-xs btn-block text-muted" href="cuti.php">Detail Cuti Reject <i class="fa fa-angle-right float-right font-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->

                        <div class="col-6 col-lg-3">
                            <div class="card">
                            <?php $tampil3=mysqli_query($koneksi, "select * from karyawan order by nik");
                        $total3=mysqli_num_rows($tampil3);
                    ?>
                                <div class="card-body p-3 clearfix">
                                    <i class="fa fa-bell bg-danger p-3 font-2xl mr-3 float-left"></i>
                                    <div class="h5 text-danger mb-0 mt-2"><?php echo $total3; ?></div>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs">Total Pegawai </div>
                                </div>
                                <div class="card-footer px-3 py-2">
                                    <a class="font-weight-bold font-xs btn-block text-muted" href="karyawan.php">Detail Pegawai <i class="fa fa-angle-right float-right font-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                    <!--/.row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Validation states</strong> Form
                                </div>
                                <div class="card-body">
                                    <div id="chartdiv" style="width: 100%; height: 310px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <!-- <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Icon/Text</strong>Groups
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" id="input1-group1" name="input1-group1" class="form-control" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="email" id="input2-group1" name="input2-group1" class="form-control" placeholder="Email">
                                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-euro"></i>
                                                    </span>
                                                    <input type="text" id="input3-group1" name="input3-group1" class="form-control" placeholder="..">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Buttons</strong>Groups
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                                    </span>
                                                    <input type="text" id="input1-group2" name="input1-group2" class="form-control" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="email" id="input2-group2" name="input2-group2" class="form-control" placeholder="Email">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary">Submit</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary"><i class="fa fa-facebook"></i>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="input3-group2" name="input3-group2" class="form-control" placeholder="Search">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary"><i class="fa fa-twitter"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Dropdowns</strong>Groups
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="input1-group3" name="input1-group3" class="form-control" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="email" id="input2-group3" name="input2-group3" class="form-control" placeholder="Email">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary">Action</button>
                                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="input3-group3" name="input3-group3" class="form-control" placeholder="..">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Separated link</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                                </div>
                            </div>
                        </div> -->
                    </div>

            </div>
            <!-- /.conainer-fluid -->
        </main>
</div>

    </div>

    <?php  include "footer.php"; ?>

    <!-- Bootstrap and necessary plugins -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/pace.min.js"></script>


    <!-- GenesisUI main scripts -->

    <script src="../js/app.js"></script>





    <!-- Plugins and scripts required by this views -->

    <!-- Custom scripts required by this view -->
  <script src="../amcharts/amcharts.js"></script>
  <script src="../amcharts/serial.js"></script>
  <script src="../amcharts/dataloader.min.js"></script>
        <script>
  var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "dataLoader": {
      "url": "data.php"
    },
    "pathToImages": "http://www.amcharts.com/lib/images/",
    "categoryField": "category",
    "dataDateFormat": "YYYY-MM-DD",
    "startDuration": 1,
    "categoryAxis": {
      "parseDates": true
    },
    "graphs": [ {
      "valueField": "value1",
      "bullet": "round",
      "bulletBorderColor": "#FFFFFF",
      "bulletBorderThickness": 2,
      "lineThickness ": 2,
      "lineAlpha": 0.5
    }, {
      "valueField": "value2",
      "bullet": "round",
      "bulletBorderColor": "#FFFFFF",
      "bulletBorderThickness": 2,
      "lineThickness ": 2,
      "lineAlpha": 0.5
    } ]
  } );
  </script>

</body>

</html>