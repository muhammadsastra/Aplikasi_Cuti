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
                <li class="breadcrumb-item"><a href="#">Edit Cuti</a>
                </li>
            </ol>


            <div class="container-fluid">

<?php
$kd = $_GET['id'];
$no = $_GET['no'];
			$sql = mysqli_query($koneksi, "SELECT * FROM cuti WHERE nik='$kd' and id='$no'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: cuti.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){
				$id            = $_POST['id']; 
                $nik           = $_POST['nik'];
                $nama          = $_POST['nama'];
                $tanggal_cuti  = $_POST['tanggal_cuti'];
                $tanggal_masuk = $_POST['tanggal_masuk'];
                $jumlah_cuti   = $_POST['jumlah_cuti'];
                $jenis_cuti    = $_POST['jenis_cuti'];
                $keperluan     = $_POST['keperluan'];
				$periode       = $_POST['periode'];
                $status        = $_POST['status'];
                $rand          = rand(1000000,2000000);
				
				$update = mysqli_query($koneksi, "UPDATE cuti SET nik='$nik', nama='$nama', tanggal_cuti='$tanggal_cuti', tanggal_masuk='$tanggal_masuk', jumlah_cuti='$jumlah_cuti', jenis_cuti='$jenis_cuti', keperluan='$keperluan', periode='$periode', status='$status' WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
?>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Edit</strong> Cuti
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data" name="input" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-key"></i>
                                                    </span>
                                                    <input type="text" id="id" name="id" value="<?php echo $row['id']; ?>" class="form-control" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-building"></i>
                                                    </span>
                                               <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $row['nik']; ?>" readonly="readonly" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i>
                                                    </span>
                                              <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" readonly="readonly" />
                                               
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" id="tanggal_cuti" value="<?php echo $row['tanggal_cuti']; ?>" name="tanggal_cuti" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Cuti" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" id="tanggal_masuk" value="<?php echo $row['tanggal_masuk']; ?>" name="tanggal_masuk" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Masuk" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-plus"></i>
                                                    </span>
                                                    <select name="jumlah_cuti" id="jumlah_cuti" class="form-control" required>
                                                    <option value="">-- Pilih Jumlah Cuti --</option>
                                                    <option value="1">1 Hari</option>
                                                    <option value="2">2 Hari</option>
                                                    <option value="3">3 Hari</option>
                                                    <option value="4">4 Hari</option>
                                                    <option value="5">5 Hari</option>
                                                    <option value="6">6 Hari</option>
                                                    <option value="7">7 Hari</option>
                                                    <option value="8">8 Hari</option>
                                                    <option value="9">9 Hari</option>
                                                    <option value="10">10 Hari</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-list"></i>
                                                    </span>
                                                <select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
                              <option value=""> -- Pilih Jenis Cuti -- </option>
                              <?php 
                    $query1="select * from jenis_cuti order by id";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['jenis'];?>"><?php echo $data['jenis'];?></option>
						    <?php } ?>
                              
                              </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="text" id="keperluan" <?php echo $row['keperluan']; ?> name="keperluan" class="form-control" placeholder="Keperluan" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                                    </span>
                                                    <select id="periode" name="periode" class="form-control" required>
                                                    <option value="">-- Pilih Periode Tahun Cuti --</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="hidden" id="status" name="status" value="<?php echo $row['status']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input">
                                                <input type="submit" name="update" value="Submit" class="btn btn-sm btn-success">
                                                <a href="cuti.php" class="btn btn-sm btn-danger"> Batal</a>    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
     <script src="../datepicker/bootstrap-datepicker.js"></script>


    <!-- GenesisUI main scripts -->

    <script src="../js/app.js"></script>

<script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	
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