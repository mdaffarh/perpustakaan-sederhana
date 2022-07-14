<?php 
 include 'config/controller.php';
 session_start();
  
 if(!isset($_SESSION['username'])){
    header('location:login.php');
} 

$db = new database();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="assets/js/dashboard.js"></script>
    <link rel="stylesheet" href="assets/css/dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <title>Dashboard</title>
</head>

<body>
    <header class="navbar navbar-dark bg-primary sticky-top flex-md-nowrap">
        <a class="fs-4 navbar-brand col-md-3 col-lg-2 px-3" href="index.php">Perpustakaan</a>
        <button class="m-2 navbar-toggler position-absolute top-0 end-0 d-md-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="w-100"></span>

        <div class="nav-item text-nowrap">
            <a class="nav-link px-3 text-light" data-bs-toggle="modal" data-bs-target="#modalLogout"
                style="cursor: pointer">Log Out</a>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu"
                class="sidebar bg-primary bg-opacity-10 collapse col-md-3 col-lg-2 d-md-block position-fixed">
                <div class="position-sticky pt-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link active"><i class="bi bi-house-door me-2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="peminjaman.php" class="nav-link"><i class="bi bi-book me-2"></i>Peminjaman Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="buku.php" class="nav-link"><i class="bi bi-bookshelf me-2"></i>Data Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="anggota.php" class="nav-link"><i class="bi bi-people me-2"></i>Data Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a href="report.php" class="nav-link"><i class="bi bi-journal me-2"></i></i>Report</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-md-9 ms-sm-auto col-lg-10 mt-5">
                <h2 class="fs-1 fw-normal text-capitalize">
                    Welcome
                    <span class="fw-bolder"><?php echo $_SESSION['username']?></span>
                </h2>
                <hr />
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $result = $db->dalamPeminjaman();
                            while ($row = $result->fetch_assoc()) {
                            ?>
                            <h5 class="card-title">Dalam Peminjaman</h5>
                            <h1><?php echo $row['A'] ?></h1>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card">
                        <?php
                            $result = $db->peminjamanSelesai();
                            while ($row = $result->fetch_assoc()) {
                            ?>
                        <div class="card-body">
                            <h5 class="card-title">Peminjaman Selesai</h5>
                            <h1><?php echo $row['A']; ?></h1>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card">
                        <?php
                            $result = $db->jumlahBuku();
                            while ($row = $result->fetch_assoc()) {
                            ?>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Judul Buku</h5>
                            <h1><?php echo $row['A']; ?></h1>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card">
                        <?php
                            $result = $db->jumlahAnggota();
                            while ($row = $result->fetch_assoc()) {
                            ?>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Anggota</h5>
                            <h1><?php echo $row['A']; ?></h1>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda akan Logout !</h5>
                </div>
                <div class="modal-footer">
                    <form method="post" action="config/process.php?aksi=logout">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-outline-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>