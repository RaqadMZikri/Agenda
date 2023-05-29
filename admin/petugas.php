<?php
    require '../functions.php';
    session_start();

    if(!isset($_SESSION["login"])) {
        header("location:../index.php");
        exit;
    }

       // ADD
       if(isset($_POST['addnew'])) {
         
        $id = $_POST['id'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hak = $_POST['hak'];
      
        $addtotable = mysqli_query($conn, "INSERT INTO petugas (id, nama_depan , nama_belakang, username,  password , hak) VALUES ('$id', '$nama_depan', '$nama_belakang', '$username', '$password', '$hak')");
        IF($addtotable) {
        echo '<script>alert("Berhasil Memasukkan Data")</script>';
        }else {
        echo '<script>alert("Gagal Memasukkan Data")</script>';
        }
    }

      // UPDATE
        if(isset($_POST['update'])) {

            $id = $_POST['id'];
            $nama_depan = $_POST['nama_depan'];
            $nama_belakang = $_POST['nama_belakang'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hak = $_POST['hak'];

          $update = mysqli_query($conn, "UPDATE  petugas  SET nama_depan =  '$nama_depan',  nama_belakang = '$nama_belakang', username = '$username',  password =  '$password', hak = '$hak' WHERE  id = '$id'");
          IF($update) {
            echo '<script>alert("Berhasil Memperbarui Data")</script>';
          }else {
            echo '<script>alert("Gagal Memperbarui Data")</script>';
          }
        }

        // DELETE
        if(isset($_POST['delete'])) {
          $id = $_POST['id'];
          $hapus = mysqli_query($conn, "DELETE FROM petugas WHERE  id = '$id'");
          IF($hapus) {
            echo '<script>alert("Berhasil Menghapus Data")</script>';
          }else {
            echo '<script>alert("Gagal Menghapus Data")</script>';
          }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Petugas - Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
     <!-- bootstrap 5 css -->
     <link rel="stylesheet" type="text/css" href="C:/Users/A V I T A/Downloads/bootstrap-5.0.2-dist.zip/bootstrap-5.0.2-dist/css/boostrap.min.css">
     <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
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

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Admin</a>
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
                        <a class="nav-link" href="petugas.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Petugas
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
                                <!-- Button to Tambah -->
             <button type="button" class="btn btn-primary plus float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
        </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>               
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Username</th>
                                        <th>Hak</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
          $i =1;
           $ambilsemuadata = mysqli_query($conn, "SELECT * FROM petugas p, hak h WHERE p.hak = h.hak ORDER BY id ASC");
           while($data=mysqli_fetch_array($ambilsemuadata)) {
            $id = $data['id'];
            $nama_depan = $data['nama_depan'];
            $nama_belakang = $data['nama_belakang'];
            $username = $data['username'];
            $password = $data['password'];
            $hak = $data['hak'];
           
          ?>

        <tr class="text-center">
              <td><?=$i++;?></td>
              <td><?=$nama_depan;?></td>
              <td><?=$nama_belakang;?></td>
             <td><?=$username;?></td>
             <td><?=$hak;?></td>
            <td>
         <button type="button" class="btn btn-warning me-4" data-bs-toggle="modal" data-bs-target="#edit<?=$id;?>">
  EDIT
</button>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$id;?>">
  DELETE
</button>
                                </td>
                                                        </tr>
    <!-- Modal Edit -->
<div class="modal fade" id="edit<?=$id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <form method="POST">
          <input type="hidden"  id="id" name="id" value="<?=$id;?>">
          <input type="text" name="nama_depan" class="form-control mb-2" placeholder="Nama Depan" autocomplete="off" required value="<?=$nama_depan;?>">
          <input type="text" name="nama_belakang" class="form-control mb-2" placeholder="Nama Belakang" autocomplete="off" required value="<?=$nama_belakang;?>">
          <input type="text" name="username" class="form-control mb-2" placeholder="Username" autocomplete="off" required value="<?=$username;?>">
          <input type="password" name="password" class="form-control mb-2" placeholder="Password" autocomplete="off" required value="<?=$password;?>">
          <select name="hak" class="form-control ">
        <option ><?=$hak; ?></option>
            <?php
                $ambilsemuadatalevel = mysqli_query($conn, "SELECT  * FROM hak" );
                while(  $fetcharray = mysqli_fetch_array($ambilsemuadatalevel)) {
                    $hak = $fetcharray['hak'];
                 
                ?>
                <option value="<?=$hak;?>"><?=$hak;?></option>
          <?php
                } ;
            ?>
        </select>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="id" value="<?=$id;?>">
        <button type="submit" class="btn btn-warning" name="update">Update</button>
    </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal delete -->
<div class="modal fade" id="delete<?=$id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Petugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">
        Apakah anda yakin ingin menghapus petugas  <?=$username;?> ?
        <input type="hidden" name="id" value="<?=$id;?>">
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="delete">Delete </button>
      </div>

    </div>
    </form>
  </div>
</div>
                                                        <?php 
                                    } ;
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
    <script src="C:/A V I T A/Downloads/bootstrap-5.0.2-dist.zip/bootstrap-5.0.2-dist/js/boostrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>
  <!-- Modal Tambah -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Keluar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <input type="hidden" name="id">
          <input type="text" name="nama_depan" class="form-control mb-2" placeholder="Nama Depan" autocomplete="off" required >
          <input type="text" name="nama_belakang" class="form-control mb-2" placeholder="Nama Belakang" autocomplete="off" required >
          <input type="text" name="username" class="form-control mb-2" placeholder="Username" autocomplete="off" required >
          <input type="password" name="password" class="form-control mb-2" placeholder="Password" autocomplete="off" required >
          <select name="hak" class="form-control ">
        <option >Hak</option>
            <?php
                $ambilsemuadatalevel = mysqli_query($conn, "SELECT  * FROM hak" );
                while(  $fetcharray = mysqli_fetch_array($ambilsemuadatalevel)) {
                    $hak = $fetcharray['hak'];
                 
                

                ?>
                <option value="<?=$hak;?>"><?=$hak;?></option>
          <?php
                } ;
            ?>
        </select>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="addnew">Save </button>
      </div>

    </div>
    </form>
  </div>
</div>
</html>