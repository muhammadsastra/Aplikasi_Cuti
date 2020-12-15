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
                <li class="breadcrumb-item"><a href="jabatan.php">Jabatan</a>
                </li>
            </ol>


            <div class="container-fluid">





                <div class="animated fadeIn">
                 <?php
             if(isset($_GET['hal']) == 'hapus'){
				$id = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_jab='$id'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jab='$id'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
                <div class="row">
                    
              <div class="col-lg-4">
              <form action='jabatan.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari berdasarkan Jabatan' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='jabatan.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
              </div>
                <br />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data</strong> Jabatan
                                </div>
                                <div class="card-body">
                   <div class="text-left">
                  <a href="input-jabatan.php" class="btn btn-sm btn-danger"><i class="fa fa-plus"></i> Input Data </a><br /><br />
              
                </div>             
                                      <?php
                    $query1="select * from jabatan";
                    
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM jabatan 
	               where id_jab like '%$qcari%'
	               or jabatan like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Id Jabatan </center></th>
                        <th><center>Jabatan </center></th>
                        <th><center>Aksi</center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['id_jab']; ?></center></td>
                    <td><center><?php echo $data['jabatan'];?></center></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit" href="edit-jabatan.php?hal=edit&kd=<?php echo $data['id_jab'];?>"><span class="fa fa-pencil"></span></a>  
                        <a onclick="return confirm ('Yakin hapus <?php echo $data['jabatan'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Admin" href="jabatan.php?hal=hapus&kd=<?php echo $data['id_jab'];?>"><span class="fa fa-trash"></a></center></td></tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
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