<?php
    require '../functions.php';
    session_start();

    if(!isset($_SESSION["login"])) {
        header("location:../index.php");
        exit;
    }

    $tanggal_kirim = $_GET['tanggal_kirim'];
    $tanggal_terima = $_GET['tanggal_terima'];
    $perihal = $_GET['perihal'];
    $pengirim = $_GET['pengirim'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Disposisi - User</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
     <!-- bootstrap 5 css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- custom css -->
<!-- <link rel="stylesheet" href="style.css" /> -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
/>
<!----======== Datatables ======== -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>$(document).ready(function () {
     $('#example').DataTable();
});</script>
 <!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">User</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>

                        <a class="nav-link" href="surat-masuk.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-envelope-circle-check"></i></div>
                            Surat Masuk
                        </a>
                        <a class="nav-link" href="surat-keluar.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-paper-plane"></i></div>
                            Surat Keluar
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?=$_SESSION['username'];?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Petugas</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Petugas
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>                                    
                                        <th>No Agenda</th>
                                        <th>No Surat</th>
                                        <th>Kepada</th>
                                        <th>Keterangan</th>
                                        <th>Status Surat</th>
                                        <th>Tanggapan</th>
                                        <th> OPTION  </th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
          $i =1;
           $ambilsemuadata = mysqli_query($conn, "SELECT * FROM disposisi d, surat_masuk s WHERE d.no_disposisi = s.id");
           while($data=mysqli_fetch_array($ambilsemuadata)) {
            $no_agenda = $data['no_agenda'];
            $no_disposisi = $data['no_disposisi'];
            $no_surat = $data['no_surat'];
            $kepada = $data['kepada'];
            $keterangan = $data['keterangan'];
            $status_surat = $data['status_surat'];
            $tanggapan = $data['tanggapan'];
          ?>

        <tr class="text-center">
              <td><?=$i++;?></td>
              <td><?=$no_agenda;?></td>
              <td><?=$no_surat;?></td>
              <td><?=$kepada;?></td>
             <td><?=$keterangan;?></td>
             <td><?=$status_surat;?></td>
             <td><?=$tanggapan;?></td>
            
        
         <td>     
  <a href="print.php?no_agenda=<?=$no_agenda?>&no_surat=<?=$no_surat?>&tanggal_kirim=<?=$tanggal_kirim;?>&tanggal_terima=<?=$tanggal_terima;?>&perihal=<?=$perihal;?>&kepada=<?=$kepada;?>&status_surat=<?=$status_surat;?>&pengirim=<?=$pengirim;?>" class=" btn btn-primary " target="_blank">PRINT</a>
          </td>
    </tr>
               <?php 
                  } ;
                    ?>
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>
</html>