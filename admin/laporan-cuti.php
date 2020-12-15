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
                <li class="breadcrumb-item"><a href="laporan-cuti.php">Laporan Cuti</a>
                </li>
            </ol>


            <div class="container-fluid">

                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Input</strong> Karyawan
                                </div>
                                <div class="card-body">
                                <div class="col-lg-12">
              <form action='laporan-cuti.php' method="POST">
            <div class="col-lg-3">
           <input type='text'  class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" style="margin-bottom: 4px;" name='tglawal' placeholder='Cari dari tanggal' autocomplete="off" required />  </div> <div class="col-lg-3"> <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" autocomplete="off" style="margin-bottom: 4px;" name='tglakhir' placeholder='Sampai Tanggal' required /> </div>
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='laporan-cuti.php' class="btn btn-sm btn-success" > Refresh</a>
           </form>
          	</div>
                 <div class="print-area table-responsif" id="print-area-2">
                
                    <?php
                    $query1="select * from cuti ";
                    
                   if(isset($_POST['tglawal']) && isset($_POST['tglakhir'])){
	               $tglawal=$_POST['tglawal'];
                   $tglakhir=$_POST['tglakhir'];
	               $query1="SELECT * FROM  cuti 
	               where (tanggal_cuti between '$tglawal'
	               and '$tglakhir')";
                  
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table style="margin-top: 20px;" id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                      <th>No</th>
                        <th>Id</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Tanggal Cuti</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah Cuti</th>
                        <th>Jenis Cuti</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                        
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++;
                     ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><?php echo $data['id']; ?></center></td>
                    <td><?php echo $data['nik']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tanggal_cuti']; ?></td>
                    <td><?php echo $data['tanggal_masuk']; ?></td>
                    <td><?php echo $data['jumlah_cuti']; ?></td>
                    <td><?php echo $data['jenis_cuti']; ?></td>
                    <td><?php echo $data['keperluan']; ?></td>
                    <td><?php echo $data['status']; ?></td>

                    <!-- <td><center><div id="thanks"><a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak Gaji" href="cetak-per-perusahaan.php?hal=edit&kd=<?php //echo $data['no_lhv'];?>"><span class="glyphicon glyphicon-print"></span></a></td></tr></div> -->
                    
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
  </div>
   <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
   
    <div class="text-right">
                  <a href="cetak-cuti.php?kd=<?php echo $_POST['tglawal'];?>&&kode=<?php echo $_POST['tglakhir'];?>" target="_blank" class="btn btn-sm btn-info">Export PDF  <i class="fa fa-download"></i></a>
                  <a href="javascript:printDiv('print-area-2');" class="btn btn-sm btn-danger" >Cetak  <i class="fa fa-print"></i></a>
              
                </div>
                <?php  } else { echo "";} ?>
                <br />
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
        function printDiv(elementId) {
    var a = document.getElementById('print-area-2').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
        </script>

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