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
    <title>Data Buku</title>
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
                            <a href="index.php" class="nav-link"><i class="bi bi-house-door me-2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="peminjaman.php" class="nav-link"><i class="bi bi-book me-2"></i>Peminjaman Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active"><i class="bi bi-bookshelf me-2"></i>Data Buku</a>
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

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
                <h2 class="fs-1 fw-normal">
                    Data Buku
                </h2>
                <hr>

                <div class="btn-group" role="group">
                    <div><button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBuku">Tambah
                            Data</button></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mt-2 w-100 border border-dark ">
                        <thead class="text-center table-primary align-middle">
                            <th>No</th>
                            <th>Nomor Buku</th>
                            <th>Bidang Pustaka</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Buku</th>
                            <th>Opsi</th>
                        </thead>
                        <?php
	                 $no = 1;
	                 foreach($db->tampil_data_buku() as $x){ ?>
                        <tbody>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $x['nomor_buku']; ?></td>
                            <td class="text-center"><?php echo $x['bidang_pustaka']; ?></td>
                            <td class="text-center"><?php echo $x['judul']; ?></td>
                            <td class="text-center"><?php echo $x['tipe']; ?></td>
                            <td class="text-center"><?php echo $x['penulis']; ?></td>
                            <td class="text-center"><?php echo $x['penerbit']; ?></td>
                            <td class="text-center"><?php echo $x['tahun_terbit']; ?></td>
                            <td class="text-center"><?php echo $x['tanggal_masuk']; ?></td>
                            <td class="text-center"><?php echo $x['jumlah_buku']; ?></td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <button id="tombolUbah" type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editBuku" data-nomorBuku="<?php echo $x['nomor_buku']; ?>"
                                        data-bidang="<?php echo $x['bidang_pustaka']; ?>"
                                        data-judul="<?php echo $x['judul']; ?>" data-tipe="<?php echo $x['tipe']; ?>"
                                        data-penulis="<?php echo $x['penulis']; ?>"
                                        data-penerbit="<?php echo $x['penerbit']; ?>"
                                        data-tahun="<?php echo $x['tahun_terbit']; ?>"
                                        data-tanggal="<?php echo $x['tanggal_masuk']; ?>"
                                        data-stock="<?php echo $x['jumlah_buku']; ?>" title="Edit Data"
                                        data-bs-toggles="tooltip" data-bs-placement="top"> <i
                                            class="bi bi-pencil-square"></i>
                                    </button>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"
                                        title="Hapus Data" data-bs-toggles="tooltip" data-bs-placement="top"><i
                                            class="bi bi-trash-fill"></i>
                                    </a>
                                </div>


                            </td>
                            <?php 
	            }
	            ?>
                </div>

                </tbody>

                </table>
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda akan Menghapus Data Ini !</h5>
                </div>
                <div class="modal-footer">
                    <form method="post"
                        action="config/process.php?nomor_buku=<?php echo $x['nomor_buku']; ?>&aksi=hapus">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-outline-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade py-5" id="addBuku" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
        <div class="modal-dialog py-5">
            <div class="modal-content bordered border-primary border-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="addData">Tambah Data Buku</h5>
                </div>
                <form action="config/process.php?aksi=tambah" method="POST">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <select class="form-select border-primary" aria-label="Default select example"
                                name="bidang_pustaka" id="bidang_pustaka" required>
                                <option selected disabled>Bidang Pustaka</option>
                                <option value="Umum">Umum</option>
                                <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                                <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif
                                </option>
                                <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                <option value="Desain Pemodelan dan Informasi Bangunan">Desain Pemodelan dan Informasi
                                    Bangunan</option>
                                <option value="Bisnis Konstruksi Properti">Bisnis Konstruksi Properti</option>
                                <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                                <option value="Teknik Fabrikasi Logam dan Manufraktur">Teknik Fabrikasi Logam dan
                                    Manufraktur</option>
                                <option value="Sistem Informasi, Jaringan dan Aplikasi">Sistem Informasi, Jaringan dan
                                    Aplikasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Multimedia">Multimedia</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light" id="judulLabel">Judul
                                Buku</span>
                            <input type="text" class="form-control bordered border-primary" aria-label="judul"
                                aria-describedby="judulLabel" name="judul" id="judul" required>
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-select border-primary" aria-label="Default select example" name="tipe"
                                id="tipe" required>
                                <option selected disabled>Tipe Pustaka Buku</option>
                                <option value="Buku Paket">Buku Paket</option>
                                <option value="Novel">Novel</option>
                                <option value="Cergam">Cergam</option>
                                <option value="Komik">Komik</option>
                                <option value="Antologi">Antologi</option>
                                <option value="Dongeng">Dongeng</option>
                                <option value="Biografi">Biografi</option>
                                <option value="Fotografi">Fotografi</option>
                                <option value="Karya Ilmiah">Karya Ilmiah</option>
                                <option value="Tafsir">Tafsir</option>
                                <option value="Kamus">Kamus</option>
                                <option value="Panduan">Panduan</option>
                                <option value="Atlas">Atlas</option>
                                <option value="Majalah">Majalah</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="PenulisLabel">Penulis</span>
                            <input type="text" class="form-control bordered border-primary" aria-label="penulisLabel"
                                aria-describedby="penulisLabel" name="penulis" id="penulis" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="penerbitLabel">Penerbit</span>
                            <input type="text" class="form-control bordered border-primary" aria-label="penerbitLabel"
                                aria-describedby="penerbitLabel" name="penerbit" id="penerbit" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light" id="tahun_terbitLabel">Tahun
                                Terbit</span>
                            <input type="number" min="1900" max="2022" class="form-control bordered border-primary"
                                aria-label="tahun_terbitLabel" aria-describedby="tahun_terbitLabel" name="tahun_terbit"
                                id="tahun_terbit" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="tanggal_masukLabel">Tanggal Masuk</span>
                            <input type="date" class="form-control bordered border-primary"
                                aria-label="tanggal_masukLabel" aria-describedby="tanggal_masukLabel"
                                name="tanggal_masuk" id="tanggal_masuk" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="tahun_terbitLabel">Jumlah Buku</span>
                            <input type="number" min="1" class="form-control bordered border-primary" name="jumlah_buku"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-outline-primary" value="Submit">
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade py-5" id="editBuku" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
        <div class="modal-dialog py-5">
            <div class="modal-content bordered border-primary border-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="addData">Edit Data Buku</h5>
                </div>
                <form action="config/process.php?aksi=update" method="POST">
                    <div class="modal-body">
                        <input type="text" name="nomor_buku" id="nomor" hidden>
                        <div class="input-group mb-3">
                            <select class="form-select border-primary" aria-label="Default select example"
                                name="bidang_pustaka" id="bidang_pustakaUpdate" required>
                                <option selected disabled>Bidang Pustaka</option>
                                <option value="Umum">Umum</option>
                                <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                                <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif
                                </option>
                                <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                <option value="Desain Pemodelan dan Informasi Bangunan">Desain Pemodelan dan Informasi
                                    Bangunan</option>
                                <option value="Bisnis Konstruksi Properti">Bisnis Konstruksi Properti</option>
                                <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                                <option value="Teknik Fabrikasi Logam dan Manufraktur">Teknik Fabrikasi Logam dan
                                    Manufraktur</option>
                                <option value="Sistem Informasi, Jaringan dan Aplikasi">Sistem Informasi, Jaringan dan
                                    Aplikasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Multimedia">Multimedia</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light" id="judulLabel">Judul
                                Buku</span>
                            <input type="text" class="form-control bordered border-primary" aria-label="judul"
                                aria-describedby="judulLabel" name="judul" id="judulUpdate" required>
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-select border-primary" aria-label="Default select example" name="tipe"
                                id="tipeUpdate" required>
                                <option selected disabled>Tipe Pustaka Buku</option>
                                <option value="Buku Paket">Buku Paket</option>
                                <option value="Novel">Novel</option>
                                <option value="Cergam">Cergam</option>
                                <option value="Komik">Komik</option>
                                <option value="Antologi">Antologi</option>
                                <option value="Dongeng">Dongeng</option>
                                <option value="Biografi">Biografi</option>
                                <option value="Fotografi">Fotografi</option>
                                <option value="Karya Ilmiah">Karya Ilmiah</option>
                                <option value="Tafsir">Tafsir</option>
                                <option value="Kamus">Kamus</option>
                                <option value="Panduan">Panduan</option>
                                <option value="Atlas">Atlas</option>
                                <option value="Majalah">Majalah</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="PenulisLabel">Penulis</span>
                            <input type="text" class="form-control bordered border-primary" aria-label="penulisLabel"
                                aria-describedby="penulisLabel" name="penulis" id="penulisUpdate" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="penerbitLabel">Penerbit</span>
                            <input type="text" class="form-control bordered border-primary" aria-label="penerbitLabel"
                                aria-describedby="penerbitLabel" name="penerbit" id="penerbitUpdate" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light" id="tahun_terbitLabel">Tahun
                                Terbit</span>
                            <input type="text" class="form-control bordered border-primary"
                                aria-label="tahun_terbitLabel" aria-describedby="tahun_terbitLabel" name="tahun_terbit"
                                id="tahunTerbit" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="tanggal_masukLabel">Tanggal Masuk</span>
                            <input type="date" class="form-control bordered border-primary"
                                aria-label="tanggal_masukLabel" aria-describedby="tanggal_masukLabel"
                                name="tanggal_masuk" id="tanggal_masukUpdate" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light"
                                id="tahun_terbitLabel">Jumlah Buku</span>
                            <input type="number" min="1" class="form-control bordered border-primary" name="jumlah_buku"
                                id="jumlah_buku" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="btn btn-outline-primary" value="Submit">
                    </div>
            </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="assets/js/jquery.js"></script>

    <script>
    //Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggles="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $(document).on("click", "#tombolUbah", function() {
        let nomorBuku = $(this).data("nomorbuku");
        let bidang = $(this).data("bidang");
        let judul = $(this).data("judul");
        let tipe = $(this).data("tipe");
        let penulis = $(this).data("penulis");
        let penerbit = $(this).data("penerbit");
        let tahunTerbit = $(this).data("tahun");
        let tanggalMasuk = $(this).data("tanggal");
        let stock = $(this).data("stock");


        $("#nomor").val(nomorBuku);
        $("#bidang_pustakaUpdate").val(bidang);
        $("#judulUpdate").val(judul);
        $("#tipeUpdate").val(tipe);
        $("#penulisUpdate").val(penulis);
        $("#penerbitUpdate").val(penerbit);
        $("#tahunTerbit").val(tahunTerbit);
        $("#tanggal_masukUpdate").val(tanggalMasuk);
        $("#jumlah_buku").val(stock);

    });
    </script>


</body>

</html>