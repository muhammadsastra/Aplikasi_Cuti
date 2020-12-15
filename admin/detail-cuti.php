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
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="cuti.php">Cuti</a>
                </li>
                <li class="breadcrumb-item">Detail Cuti
                </li>
            </ol>


            <div class="container-fluid">





                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Detail</strong> Cuti
                                </div>
                                <div class="card-body">
                                 <?php
            $query = mysqli_query($koneksi, "SELECT * FROM cuti WHERE nik='$_GET[id]'");
            $data  = mysqli_fetch_array($query);
            ?>
                   <table id="example" class="table table-hover table-bordered">
                      <tr>
                      <td>Id</td>
                      <td><?php echo $data['id']; ?></td>
                      </tr>
                      <tr>
                      <td>NIP</td>
                      <td><?php echo $data['nik']; ?></td>
                      </tr>
                      <tr>
                      <td>Nama</td>
                      <td><?php echo $data['nama']; ?></td>
                      </tr>
                      <tr>
                      <td>Tanggal Cuti</td>
                      <td><?php echo $data['tanggal_cuti']; ?></td>
                      </tr>
                      <tr>
                      <td>Sampai dengan</td>
                      <td><?php echo $data['tanggal_masuk']; ?></td>
                      </tr>
                      <tr>
                      <td>Jumlah Cuti</td></td>
                      <td><?php echo $data['jumlah_cuti']; ?></td>
                      </tr>
                      <tr>
                      <td>Jenis Cuti</td>
                      <td><?php echo $data['jenis_cuti']; ?></td>
                      </tr>
                      <tr>
                      <td>Keperluan</td></td>
                      <td><?php echo $data['keperluan']; ?></td>
                      </tr>
                      <tr>
                      <td>Periode</td></td>
                      <td><?php echo $data['periode']; ?></td>
                      </tr>
                      <tr>
                      <td>Status</td></td>
                      <td><?php 
                            if($data['status'] == 'Process'){
								echo '<span class="badge badge-success">PROCESS</span>';
							}
                            else if ($data['status'] == 'Approve' ){
								echo '<span class="badge badge-primary">APPROVED</span>';
							}
                            else if ($data['status'] == 'Reject' ){
								echo '<span class="badge badge-info">REJECTED</span>';
							}
                             ?></td>
                      </tr>
                      </table>
                      <div class="text-right">
                  <a href="cuti.php" class="btn btn-sm btn-warning">Kembali <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>
                  <!-- </div>-->
                                    
                                </div>
                               
                            </div>
                        </div>
                        
                        
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
    <script src="../datatables/jquery.dataTables.min.js"></script>
    <script src="../datatables/dataTables.bootstrap.min.js"></script>

    <!-- GenesisUI main scripts -->

    <script src="../js/app.js"></script>
<script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data-karyawan.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>




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