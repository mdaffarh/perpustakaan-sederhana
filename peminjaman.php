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
    <title>Data Peminjaman</title>
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
                            <a href="#" class="nav-link  active"><i class="bi bi-book me-2"></i>Peminjaman Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="buku.php" class="nav-link"><i class="bi bi-bookshelf me-2"></i>Data Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="anggota.php" class="nav-link"><i class="bi bi-people me-2"></i>Data
                                Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a href="report.php" class="nav-link"><i class="bi bi-journal me-2"></i></i>Report</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
                <h2 class="fs-1 fw-normal">
                    Data Peminjaman
                </h2>
                <hr>

                <div class="btn-group" role="group">
                    <div><button class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addPeminjaman">Tambah
                            Data</button></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mt-2 w-100 border border-dark ">
                        <thead class="text-center table-primary align-middle">
                            <th>No</th>
                            <th>Nomor Peminjaman</th>
                            <th>Nomor Anggota</th>
                            <th>Nomor Buku</th>
                            <th>Waktu Pinjam</th>
                            <th>Batas Waktu</th>
                            <th>Waktu Kembali</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </thead>
                        <?php
	                 $no = 1;
	                 foreach($db->tampil_data_peminjaman() as $x){ ?>
                        <tbody class="align-middle">
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $x['nomor_peminjaman']; ?></td>
                            <td class="text-center"><?php echo $x['nomor_anggota']; ?></td>
                            <td class="text-center"><?php echo $x['nomor_buku']; ?></td>
                            <td class="text-center"><?php echo $x['waktu_pinjam']; ?></td>
                            <td class="text-center"><?php echo $x['batas_waktu']; ?></td>
                            <td class="text-center"><?php echo $x['waktu_kembali']; ?></td>
                            <td class="text-center"><?php echo $x['denda']; ?></td>
                            <td class="text-center fw-bold"><?php echo $x['status']; ?></td>

                            <td class="text-center col-1">
                                <div class="btn-group">
                                    <button title="Pengembalian Buku" id="tombolPengembalian" type="button"
                                        class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengembalian"
                                        data-bs-toggles="tooltip" data-bs-placement="top"
                                        data-nomorPeminjaman="<?php echo $x['nomor_peminjaman']; ?>"
                                        data-batasWaktu="<?php echo $x['batas_waktu']; ?>"
                                        data-nomorBuku="<?php echo $x['nomor_buku']; ?>"><i
                                            class="bi bi-arrow-down-square"></i></button>
                                    <button id="tombolSelesai" type="button" class="btn btn-success"
                                        data-bs-toggle="modal"
                                        data-nomorPeminjaman="<?php echo $x['nomor_peminjaman']; ?>"
                                        data-bs-target="#selesai" data-bs-toggles="tooltip" data-bs-placement="top"
                                        title="Selesaikan Peminjaman"><i class="bi bi-check-square"></i>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button id="tombolUbah" type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editPeminjaman" title="Edit Data" data-bs-toggles="tooltip"
                                        data-bs-placement="top"
                                        data-nomorPeminjaman="<?php echo $x['nomor_peminjaman']; ?>"
                                        data-nomorAnggota="<?php echo $x['nomor_anggota']; ?>"
                                        data-nomorBuku="<?php echo $x['nomor_buku']; ?>"
                                        data-waktuPinjam="<?php echo $x['waktu_pinjam']; ?>"
                                        data-batasWaktu="<?php echo $x['batas_waktu']; ?>"
                                        data-waktuKembali="<?php echo $x['waktu_kembali']; ?>"
                                        data-denda="<?php echo $x['denda']; ?>"
                                        data-status="<?php echo $x['status']; ?>"> <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-toggles="tooltip"
                                        data-bs-target="#modalDelete" data-bs-placement="top" title="Hapus Data"><i
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


    // Jquery Pengembalian
    $(document).on("click", "#tombolPengembalian", function() {

        let nomorPeminjaman = $(this).data("nomorpeminjaman");
        let batasWaktu = $(this).data("bataswaktu");
        let nomorBuku = $(this).data("nomorbuku");

        $("#nomor_peminjaman").val(nomorPeminjaman);
        $("#batas_waktu").val(batasWaktu);
        $("#nomor_buku").val(nomorBuku);
        $("#tanggal_kembali").val(batasWaktu);

    });
    $(document).on("click", "#tombolSelesai", function() {

        let nomorPeminjaman = $(this).data("nomorpeminjaman");

        $("#nomorPeminjaman").val(nomorPeminjaman);

    });

    // Jquery Edit
    $(document).on("click", "#tombolUbah", function() {

        let nomorPeminjaman = $(this).data("nomorpeminjaman");
        let nomorAnggota = $(this).data("nomoranggota");
        let nomorBuku = $(this).data("nomorbuku");
        let waktuPinjam = $(this).data("waktupinjam");
        let batasWaktu = $(this).data("bataswaktu");
        let waktuKembali = $(this).data("waktukembali");
        let denda = $(this).data("denda");
        let status = $(this).data("status");


        $("#nomorPeminjamanUpdate").val(nomorPeminjaman);
        $("#nomorAnggotaUpdate").val(nomorAnggota);
        $("#nomorBukuUpdate").val(nomorBuku);
        $("#waktuPinjamUpdate").val(waktuPinjam);
        $("#batasWaktuUpdate").val(batasWaktu);
        $("#tanggalKembaliUpdate").val(waktuKembali);
        $("#dendaUpdate").val(denda);
        $("#statusUpdate").val(status);

    });
    </script>


</body>

<!-- Modal Pengembalian -->
<div class="modal fade py-5" id="pengembalian" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog py-5 ">
        <div class="modal-content bordered border-primary border-2">
            <div class="modal-header">
                <h5 class="modal-title">Pengembalian</h5>
            </div>
            <form action="config/process.php?aksiPeminjaman=pengembalian" method="POST">
                <div class="modal-body">
                    <input type="text" name="nomor_peminjaman" id="nomor_peminjaman" hidden>
                    <input type="date" name="batas_waktu" id="batas_waktu" hidden>
                    <input type="text" name="nomor_buku" id="nomor_buku" hidden>

                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Tanggal Kembali</span>
                        <input type="date" class="form-control bordered border-primary" name="tanggal_kembali"
                            id="tanggal_kembali" required>
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
<div class="modal fade py-5" id="editPeminjaman" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog py-5 ">
        <div class="modal-content bordered border-primary border-2">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Data Peminjaman</h5>
            </div>
            <form action="config/process.php?aksiPeminjaman=update" method="POST">
                <div class="modal-body">
                    <input type="text" name="nomorPeminjaman" id="nomorPeminjamanUpdate" hidden>

                    <!-- <div class="input-group mb-3">
                        <select class="form-select border-primary" name="nomorAnggota" required>
                            <option selected disabled>Nomor Anggota</option>
                            <option id="nomorAnggotaUpdate"></option>
                        </select>
                    </div> -->
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Nomor Anggota</span>
                        <input type="number" class="form-control bordered border-primary" name="nomorAnggota"
                            id="nomorAnggotaUpdate" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Nomor Buku</span>
                        <input type="text" class="form-control bordered border-primary" name="nomorBuku"
                            id="nomorBukuUpdate" required>
                    </div>

                    <!-- <div class="overflow-auto mb-3" style="height: 200px;">
                        <span class="bordered border-primary bg-light">Pilih Buku</span>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input nomorBuku" type="checkbox" name="nomorBuku[]"
                                    id="nomorBukuUpdate">
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                    </div> -->
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Waktu Pinjam</span>
                        <input type="date" class="form-control bordered border-primary" name="waktu_pinjam"
                            id="waktuPinjamUpdate" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Batas Waktu</span>
                        <input type="date" class="form-control bordered border-primary" name="batas_waktu"
                            id="batasWaktuUpdate" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Tanggal Kembali</span>
                        <input type="date" class="form-control bordered border-primary" name="tanggal_kembali"
                            id="tanggalKembaliUpdate" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Denda</span>
                        <input type="number" class="form-control bordered border-primary" name="denda" id="dendaUpdate"
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bordered border-primary bg-light">Status</span>
                        <input type="text" class="form-control bordered border-primary" name="status" id="statusUpdate"
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

<!-- Modal Selesai -->
<div class="modal fade" id="selesai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selesaikan Peminjaman?</h5>
            </div>
            <div class="modal-body">
                <p>Pastikan Peminjam Sudah Membayar Denda dan Kartu Anggota Telah Dikembalikan</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="config/process.php?aksiPeminjaman=selesai">
                    <input type="text" name="nomor_peminjaman" id="nomorPeminjaman" hidden>
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
                    action="config/process.php?nomor_peminjaman=<?php echo $x['nomor_peminjaman']; ?>&aksiPeminjaman=hapus">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-primary">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade py-5" id="addPeminjaman" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog py-5 ">
        <div class="modal-content bordered border-primary border-2">
            <div class="modal-header">
                <h5 class="modal-title" id="addData">Tambah Data Peminjaman</h5>
            </div>
            <form action="config/process.php?aksiPeminjaman=tambah" method="POST">
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <select class="form-select border-primary" name="nomorAnggota" required>
                            <option selected disabled>Nomor Anggota</option>
                            <?php
	                                foreach($db->tampil_nomorAnggota() as $x){ ?>
                            <option value="<?php echo $x['nomor_anggota']; ?>"><?php echo $x['nomor_anggota']; ?>
                                (<?php echo $x['nama_lengkap']; ?>)</option>
                            <?php } ?>
                        </select>
                    </div>




                    <div class="overflow-auto mb-3" style="height: 200px;">
                        <span class="bordered border-primary bg-light">Pilih Buku</span>
                        <?php
	                                foreach($db->tampil_nomorBuku() as $x){ ?>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input nomorBuku" type="checkbox"
                                    value="<?php echo $x['nomor_buku']; ?>" name="nomorBuku[]">
                                <label class="form-check-label"><?php echo $x['nomor_buku']; ?>
                                    (<?php echo $x['judul']; ?>)</label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

        </div>
        </form>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text bordered border-primary bg-light">Waktu Pinjam</span>
        <input type="date" class="form-control bordered border-primary" name="waktuPinjam" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bordered border-primary bg-light">Batas Waktu</span>
        <input type="date" class="form-control bordered border-primary" name="batasWaktu" required>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-outline-primary" value="Submit">
    </div>
</div>


</html>