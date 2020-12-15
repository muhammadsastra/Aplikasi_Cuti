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
                <li class="breadcrumb-item"><a href="karyawan.php">Jabatan</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Edit Karyawan</a>
                </li>
            </ol>


            <div class="container-fluid">

<?php
$kd = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$kd'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: karyawan.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){
				$id          = $_POST['id'];
                $nik         = $_POST['nik'];
                $masuk_kerja = $_POST['masuk_kerja'];
                $nama        = $_POST['nama'];
                $jenkel      = $_POST['jenkel'];
                $email       = $_POST['email'];
                $jabatan     = $_POST['jabatan'];
                $departemen  = $_POST['departemen'];
				$alamat      = $_POST['alamat'];
                $no_hp       = $_POST['no_hp'];
                $sisa_cuti   = $_POST['sisa_cuti'];
                $password    = $_POST['password'];
                $rand        = rand(1000000,2000000);
				
				$update = mysqli_query($koneksi, "UPDATE karyawan SET nik='$nik', masuk_kerja='$masuk_kerja', nama='$nama', jenkel='$jenkel', email='$email', jabatan='$jabatan', departemen='$departemen', alamat='$alamat', no_hp='$no_hp', sisa_cuti='$sisa_cuti', password='$password' WHERE id='$id'") or die(mysqli_error());
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
                                    <strong>Edit</strong> Karyawan
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
                                                    <input type="text" id="nik" name="nik" value="<?php echo $row['nik']; ?>" class="form-control" placeholder="NIK" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" id="masuk_kerja" name="masuk_kerja" value="<?php echo $row['masuk_kerja']; ?>" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" placeholder="Tanggal Masuk Kerja" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i>
                                                    </span>
                                                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" placeholder="nama" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-building"></i>
                                                    </span>
                                                    <select id="jenkel" name="jenkel" class="form-control" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki - Laki" >Laki - Laki</option>
                                                    <option value="Perempuan" >Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Email" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-list"></i>
                                                    </span>
                                                <select name="jabatan" id="jabatan" class="form-control" required>
                              <option value=""> -- Pilih Jabatan -- </option>
                              <?php 
                    $query1="select * from jabatan order by id_jab";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['jabatan'];?>"><?php echo $data['jabatan'];?></option>
						    <?php } ?>
                              
                              </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-building"></i>
                                                    </span>
                                               <select name="departemen" id="departemen" class="form-control" required>
                              <option value=""> -- Pilih Departemen -- </option>
                              <?php 
                    $query1="select * from departemen order by id_dep";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    while($data=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
							
							<option value="<?php echo $data['departemen'];?>"><?php echo $data['departemen'];?></option>
						    <?php } ?>
                              
                              </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home"></i>
                                                    </span>
                                                    <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" class="form-control" placeholder="alamat" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i>
                                                    </span>
                                                    <input type="text" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>" class="form-control" placeholder="No Telepon" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-plus"></i>
                                                    </span>
                                                    <input type="text" id="sisa_cuti" name="sisa_cuti" value="<?php echo $row['sisa_cuti']; ?>" class="form-control" placeholder="sisa_cuti" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lock"></i>
                                                    </span>
                                                    <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="password" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input">
                                                <input type="submit" name="update" value="Submit" class="btn btn-sm btn-success">
                                                <a href="karyawan.php" class="btn btn-sm btn-danger"> Batal</a>    
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