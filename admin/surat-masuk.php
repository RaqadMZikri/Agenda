<?php
    require '../functions.php';
    session_start();

    if(!isset($_SESSION["login"])) {
        header("location:../index.php");
        exit;
    }

       // ADD
       if(isset($_POST['add'])) {
         
        $id = $_POST['id'];
        $no_agenda = $_POST['no_agenda'];
        $jenis_surat = $_POST['jenis_surat'];
        $tanggal_kirim = $_POST['tanggal_kirim'];
        $tanggal_terima	 = $_POST['tanggal_terima'];
        $no_surat = $_POST['no_surat'];
        $pengirim = $_POST['pengirim'];
        $perihal = $_POST['perihal'];

        $directory = "assets/lampiran/";
        $lampiran = $_FILES['lampiran']['name'];
        move_uploaded_file($_FILES['lampiran']['tmp_name'],$directory.$lampiran);

        $addtotable = mysqli_query($conn, "INSERT INTO surat_masuk (id, no_agenda , jenis_surat, tanggal_kirim, tanggal_terima, no_surat , pengirim, perihal, lampiran) VALUES ('$id', '$no_agenda', '$jenis_surat', '$tanggal_kirim', '$tanggal_terima','$no_surat', '$pengirim', '$perihal', '$lampiran')");
          IF($addtotable) {
            echo '<script>alert("Berhasil Memasukkan Data")</script>';
          }else {
            echo '<script>alert("Gagal Memasukkan Data")</script>';
          }
      }

      // UPDATE
        if(isset($_POST['updatepetugas'])) {
            $no_agenda = $_POST['no_agenda'];
            $id = $_POST['id'];
            $jenis_surat = $_POST['jenis_surat'];
            $tanggal_kirim = $_POST['tanggal_kirim'];
            $tanggal_terima	 = $_POST['tanggal_terima'];
            $no_surat = $_POST['no_surat'];
            $pengirim = $_POST['pengirim'];
            $perihal = $_POST['perihal'];

            $directory = "assets/lampiran";
            $lampiran = $_FILES['lampiran']['name'];
            move_uploaded_file($_FILES['lampiran']['tmp_name'],$directory.$lampiran);

          $update = mysqli_query($conn, "UPDATE  surat_masuk  SET no_agenda =  '$no_agenda',  jenis_surat = '$jenis_surat', tanggal_kirim = '$tanggal_kirim', tanggal_terima = '$tanggal_terima', no_surat =  '$no_surat', pengirim = '$pengirim', perihal = '$perihal', lampiran = '$lampiran' WHERE  id = '$id'");
          IF($update) {
            echo '<script>alert("Berhasil Memperbarui Data")</script>';
          }else {
            echo '<script>alert("Gagal Memperbarui Data")</script>';
          }
        }

        // DELETE
        if(isset($_POST['deletepetugas'])) {
          $id = $_POST['id'];
          $hapus = mysqli_query($conn, "DELETE FROM surat_masuk WHERE  id = '$id'");
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
    <title>Surat Masuk - Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
     <!-- bootstrap 5 css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
 <!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                        <li class="breadcrumb-item active">Surat Masuk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> Surat Masuk
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
            <th>No Agenda</th>
            <th>Jenis Surat</th>
            <th>Tanggal Kirim</th>
            <th>Tanggal Terima</th>
            <th>No Surat</th>
            <th>Pengirim</th>
            <th>Perihal</th>
            <th>Lampiran</th>
            <th> ACTION  </th>
            <th> OPTION  </th>
            </tr>
    </thead>
    
    <tbody>
    <?php
          $i =1;
           $ambilsemuadata = mysqli_query($conn, "SELECT * FROM surat_masuk");
           while($data=mysqli_fetch_array($ambilsemuadata)) {
            $id = $data['id'];
            $no_agenda = $data['no_agenda'];
            $jenis_surat = $data['jenis_surat'];
            $tanggal_kirim = $data['tanggal_kirim'];
            $tanggal_terima	 = $data['tanggal_terima'];
            $no_surat = $data['no_surat'];
            $pengirim = $data['pengirim'];
            $perihal = $data['perihal'];
            $lampiran = $data['lampiran'];
          ?>

        <tr class="text-center">
              <td><?=$i++;?></td>
              <td><?=$jenis_surat;?></td>
             <td><?=$tanggal_kirim;?></td>
             <td><?=$tanggal_terima;?></td>
             <td><?=$no_surat;?></td>
             <td><?=$pengirim;?></td>
             <td><?=$perihal;?></td>
             <td>
                <p><?=$lampiran;?></p>
            </td>
            
         <td>
         <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#edit<?=$id;?>">
  EDIT
</button>
<button type="button" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#delete<?=$id;?>">
  DELETE
</button>    
<td>
  <a href="disposisi.php?no_agenda=<?=$no_agenda?>&no_surat=<?=$no_surat?>&tanggal_kirim=<?=$tanggal_kirim;?>&tanggal_terima=<?=$tanggal_terima;?>&perihal=<?=$perihal;?>&pengirim=<?=$pengirim;?>" class=" btn btn-success m-2">DISPOSISI</a>

</td>
                                </td>
                                                        </tr>
    <!-- Modal Edit -->
<div class="modal fade" id="edit<?=$id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Surat Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          <input type="hidden"  id="id" name="id" value="<?=$id;?>">
          <input type="number" name="no_agenda" class="form-control mb-2" placeholder="No Agenda" autocomplete="off" required value="<?=$no_agenda;?>">
          <input type="text" name="jenis_surat" class="form-control mb-2" placeholder="Jenis Surat" autocomplete="off" required value="<?=$jenis_surat;?>">
          <label for="tanggal_kirim">Tanggal Kirim</label>
          <input type="text" name="tanggal_kirim" id="tanggal_kirim" class="form-control mb-2"  autocomplete="off" required value="<?=$tanggal_kirim;?>">
          <label for="tanggal_terima">Tanggal Terima</label>
          <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control mb-2"  autocomplete="off" required value="<?=$tanggal_terima;?>">
          <input type="text" name="no_surat" class="form-control mb-2" placeholder="No Surat" autocomplete="off" required value="<?=$no_surat;?>">
          <select name="pengirim" id="Pengirim" class="form-control mb-2">
        <option ><?=$pengirim;?></option>
        <?php
                $ambilsemuadatalevel = mysqli_query($conn, "SELECT  * FROM petugas" );
                while(  $fetcharray = mysqli_fetch_array($ambilsemuadatalevel)) {
                    $username = $fetcharray['username'];
                 
                

                ?>
                <option value="<?=$username;?>"><?=$username;?></option>
          <?php
                } ;
            ?>
      </select>
          <textarea name="perihal" class="form-control mb-2" placeholder="Perihal" autocomplete="off"  value="" ><?=$perihal;?></textarea>
          <label for="lampiran">  <?=$lampiran;?> </label>
          <input type="file" name="lampiran" id="lampiran">
     
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="hidden" name="id" value="<?=$id;?>">
        <button type="submit" class="btn btn-warning" name="updatepetugas">Update</button>
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
      <form method="POST" >
      <div class="modal-body">
        Apakah anda yakin ingin menghapus no. surat <?=$no_surat;?> dengan pengirim atas nama <?=$pengirim;?>
        <input type="hidden" name="id" value="<?=$id;?>">
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="deletepetugas">Delete </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Masuk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden" name="id">
        <label for="no agenda">No Agenda</label>
      <input type="number" name="no_agenda" id="no agenda" class="form-control mb-2" autocomplete="off" required value="<?=$i;?>">
      <input type="text" name="jenis_surat" class="form-control mb-2" placeholder="Jenis Surat" autocomplete="off" required>
      <label for="tanggal_kirim">Tanggal Kirim</label>
      <input type="text" name="tanggal_kirim" id="tanggal_kirim" class="form-control mb-2"  autocomplete="off" required value="<?php echo date("l m-d-y");?>">
      <label for="tanggal_terima">Tanggal Terima</label>
      <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control mb-2"  autocomplete="off" required>
      <input type="text" name="no_surat" class="form-control mb-2" placeholder="No Surat" autocomplete="off" required>
      <select name="pengirim" id="Pengirim" class="form-control mb-2">
        <option>Pengirim</option>
        <?php
                $ambilsemuadatalevel = mysqli_query($conn, "SELECT  * FROM petugas" );
                while(  $fetcharray = mysqli_fetch_array($ambilsemuadatalevel)) {
                    $username = $fetcharray['username'];
                 
                

                ?>
                <option value="<?=$username;?>"><?=$username;?></option>
          <?php
                } ;
            ?>
      </select>
      <textarea name="perihal" class="form-control mb-2" placeholder="Perihal" autocomplete="off" required></textarea>
      <label for="lampiran">  Lampiran : </label>
      <input type="file" name="lampiran" id="lampiran" >
     
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="add">Save </button>
      </div>

    </div>
    </form>
  </div>
</div>
</html>