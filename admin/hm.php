<?php
session_start();

if( !isset($_SESSION['saya_admin']) )
{
	header('location:./../'.$_SESSION['akses']);
	exit();
}

$kode_alternatif2 = ( isset($_SESSION['kode_alternatif']) ) ? $_SESSION['kode_alternatif'] : '';
$hak_akses2 = ( isset($_SESSION['hak_akses']) ) ? $_SESSION['hak_akses'] : '';
$nama2 = ( isset($_SESSION['username']) ) ? $_SESSION['username'] : '';
$nama_alternatif2 = ( isset($_SESSION['nama_alternatif']) ) ? $_SESSION['nama_alternatif'] : '';
$id_periode2 = ( isset($_SESSION['id_periode']) ) ? $_SESSION['id_periode'] : '';
$tempat_lahir2 = ( isset($_SESSION['tempat_lahir']) ) ? $_SESSION['tempat_lahir'] : '';
$tanggal_lahir2 = ( isset($_SESSION['tanggal_lahir']) ) ? $_SESSION['tanggal_lahir'] : '';
$alamat_alternatif2 = ( isset($_SESSION['alamat_alternatif']) ) ? $_SESSION['alamat_alternatif'] : '';
$no2 = ( isset($_SESSION['no']) ) ? $_SESSION['no'] : '';
$email2 = ( isset($_SESSION['email']) ) ? $_SESSION['email'] : '';
$foto_user2 = ( isset($_SESSION['foto_user']) ) ? $_SESSION['foto_user'] : '';


// require_once('../restrict.php'); 
require_once('../Connections/koneksi.php'); 
include 'functions.php';
include '../views/config.php';
require_once('require/header.php');

?>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
            <img src="https://i.ibb.co/xg4rmPF/Whats-App-Image-2021-12-08-at-17-41-23.jpg" width="60" height="60" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		
		
		<!--**********************************
            Header start
        ***********************************-->
        <?php require_once('require/navbar.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php require_once('require/sidebar.php'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<!-- Add Project -->
				<!-- <div class="modal fade" id="addProjectSidebar">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Project</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Project Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Deadline</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Client Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> -->
			

        <?php
              if(isset($_GET["page"]) && $_GET["page"] != "home"){
                  if(file_exists(htmlentities($_GET["page"]).".php")){
                            include(htmlentities($_GET["page"]).".php");
                      }else{
                            include("404.php");
                      }
                }else{
                    include("home.php");
              } 
              ?>



      </div>
		</div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php require_once('require/footer.php'); ?>     