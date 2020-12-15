<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Template, tutorial, PHP, HTML, CSS, HakkoBlogs">
    <meta name="author" content="Hakko Bio Richard">
    <meta name="keyword" content="Template, tutorial, PHP, HTML, CSS, HakkoBlogs">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>Sistem Informasi Cuti Kepegawaian</title>

    <!-- Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
<!--
.style1 {color: #666666}
.style2 {border-radius: 0; font-weight: normal;}
.style3 {color: #FFCC00}
-->
    </style>
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
						  <marquee>
							<span class="style3">Untuk Informasi mengenai prosedur, dasar hukum dan hal lainnya mengenai Permohonan dan Pemberian Cuti PNS silahkan <a href="http://sicakep.pangkalpinangkota.go.id/infocuti/">[klik disini]</a> </span>
						  </marquee>
                            <h1 align="center"><img src="img/kinerja.png" width="286" height="162"></h1>
                            <h1 align="center">Login Admin</h1>
                            <p align="center" class="text-muted">Sistem Informasi Cuti Kepegawaian (sicakep)</p>
                            <p align="center"><strong>Badan Kepegawaian dan Pengembangan Sumber Daya Manusia Daerah </strong><strong>Kota Pangkalpinang</strong></p>
                            <form action="proseslogin.php" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>                                </span>
                                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" id="username">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>                                </span>
                                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" id="password">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" class="btn btn-primary px-4" value="Login" name="login" id="login"/>
                                </div>
                                 <div class="col-6 text-right style1">
                                    <a href="index.php" class="btn px-0 style2">Login Pegawai </a></div>
                                 	
                        
                     
                            </form>
                      </div>
                    </div>
					<div align="center"><span class="text-primary"><strong>BKPSDMD Kota Pangkalpinang ©2020</strong></span>
                <!--    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a type="button" class="btn btn-primary active mt-3">Register Now!</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div align="center">
    <!-- Bootstrap and necessary plugins -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/tether/dist/js/tether.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </div>
</body>
 
</html>