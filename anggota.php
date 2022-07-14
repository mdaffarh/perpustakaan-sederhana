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
    <title>Data Anggota</title>
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
                            <a href="buku.php" class="nav-link"><i class="bi bi-bookshelf me-2"></i>Data Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active"><i class="bi bi-people me-2"></i>Data
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
                    Data Anggota
                </h2>
                <hr>

                <div class="btn-group" role="group">
                    <div><button class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addAnggota">Tambah
                            Data</button></div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mt-2 w-100 border border-dark ">
                        <thead class="text-center table-primary align-middle">
                            <th>No</th>
                            <th>Nomor Anggota</th>
                            <th>Nomor Identitas</th>
                            <th>Jenis Identitas</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Opsi</th>
                        </thead>
                        <?php
	                 $no = 1;
	                 foreach($db->tampil_data_anggota() as $x){ ?>
                        <tbody>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $x['nomor_anggota']; ?></td>
                            <td class="text-center"><?php echo $x['nomor_identitas']; ?></td>
                            <td class="text-center"><?php echo $x['jenis_identitas']; ?></td>
                            <td class="text-center"><?php echo $x['nama_lengkap']; ?></td>
                            <td class="text-center"><?php echo $x['tanggal_lahir']; ?></td>
                            <td class="text-center"><?php echo $x['kelas']; ?> <?php echo $x['jurusan']; ?>
                                <?php echo $x['angka']; ?></td>
                            <td class="text-center"><?php echo $x['alamat']; ?></td>
                            <td class="text-center"><?php echo $x['nomor_telepon']; ?></td>
                            <td class="text-center"><?php echo $x['tanggal_pendaftaran']; ?></td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <button id="tombolUbah" type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editAnggota"
                                        data-nomorAnggota="<?php echo $x['nomor_anggota']; ?>"
                                        data-nomorID="<?php echo $x['nomor_identitas']; ?>"
                                        data-jenisID="<?php echo $x['jenis_identitas']; ?>"
                                        data-nama="<?php echo $x['nama_lengkap']; ?>"
                                        data-tanggal="<?php echo $x['tanggal_lahir']; ?>"
                                        data-kelas="<?php echo $x['kelas']; ?>"
                                        data-jurusan="<?php echo $x['jurusan']; ?>"
                                        data-angka="<?php echo $x['angka']; ?>"
                                        data-alamat="<?php echo $x['alamat']; ?>"
                                        data-nomor="<?php echo $x['nomor_telepon']; ?>"
                                        data-pendaftaran="<?php echo $x['tanggal_pendaftaran']; ?>" title="Edit Data"
                                        data-bs-toggles="tooltip" data-bs-placement="top"> <i
                                            class="bi bi-pencil-square"></i>
                                    </button>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"
                                        title="Hapus Data" data-bs-toggles="tooltip" data-bs-placement="top"><i
                                            class="bi bi-trash-fill"></i>
                                    </a>
                                    <a href="report/kartuAnggota.php?nomor_anggota=<?php echo $x['nomor_anggota']; ?>"
                                        class="btn btn-primary" title="Cetak Kartu Anggota" id="printKartuAnggota"
                                        data-bs-toggles="tooltip" data-bs-placement="top" target="__blank"><i
                                            class="bi bi-printer"></i></a>
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

    <!-- Kartu Anggota -->
    <!-- <div class="modal fade" id="kartuAnggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kartu Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="kartuAnggotaCetak">
                    <div class="border border-dark p-2">
                        <p class="fw-bolder">Kartu Anggota Perpustakaan SMK NEGERI 1 CIBINONG</p>
                        <p class="mb-0"> <span class="fw-bolder">Nomor Anggota</span> : 12</p>
                        <p class="mb-0"> <span class="fw-bolder">NIK</span> : 2342342342342342</p>
                        <p class="mb-0"> <span class="fw-bolder">Nama Lengkap</span> : M Daffa RH</p>
                        <p class="mb-0"> <span class="fw-bolder">Tanggal Lahir</span> : 2004-01-30 </p>
                        <p class="mb-0"> <span class="fw-bolder">Kelas</span> : XI RPL 1</p>
                        <p class="mb-0"> <span class="fw-bolder">Alamat</span> : Depok</p>
                        <p class="mb-0"> <span class="fw-bolder">Nomor Telepon</span> : 089644708799</p>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="javascript:demoFromHTML()" id="tombolCetak" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    </div> -->

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
                        action="config/process.php?nomor_anggota=<?php echo $x['nomor_anggota']; ?>&aksiAnggota=hapus">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-outline-primary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Data -->
    <div class="modal fade py-5" id="addAnggota" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
        <div class="modal-dialog py-5">
            <div class="modal-content bordered border-primary border-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="addData">Tambah Data Anggota</h5>
                </div>
                <form action="config/process.php?aksiAnggota=tambah" method="POST">
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Tanggal Pendaftaran</span>
                            <input type="Date" class="form-control bordered border-primary" name="tanggal_pendaftaran"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Nomor
                                Identitas</span>
                            <input type="tel" maxlength="16" class="form-control bordered border-primary" name="nomorId"
                                id="nomorId" required>
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-select border-primary" name="jenis_identitas" id="jenisId" required>
                                <option selected disabled>Jenis Identitas</option>
                                <option value="NIS">NIS</option>
                                <option value="NISN">NISN</option>
                                <option value="NIK">NIK</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Nama Lengkap</span>
                            <input type="text" class="form-control bordered border-primary" name="nama" id="nama"
                                required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Tanggal Lahir</span>
                            <input type="Date" class="form-control bordered border-primary" name="tanggal_lahir"
                                id="tanggal" value="2000-01-01" required>
                        </div>


                        <div class="input-group mb-3">
                            <select class="form-select border-primary" name="kelas" id="kelas" required>
                                <option selected disabled>Kelas</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                            <select class="form-select border-primary" name="jurusan" required>
                                <option selected disabled>Jurusan</option>
                                <option value="TP">TP</option>
                                <option value="TKRO">TKRO</option>
                                <option value="TKJ">TKJ</option>
                                <option value="DPIB">DPIB</option>
                                <option value="BKP">BKP</option>
                                <option value="TOI">TOI</option>
                                <option value="TFLM">TFLM</option>
                                <option value="SIJA">SIJA</option>
                                <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                            </select>
                            <select class="form-select border-primary" name="angka" required>
                                <option selected disabled>Angka</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Alamat</span>
                            <input type="text" class="form-control bordered border-primary" name="alamat" id="alamat"
                                required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Nomor Telepon</span>
                            <input type="tel" maxlength="15" class="form-control bordered border-primary" name="telepon"
                                id="telepon" required>
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
    <div class="modal fade py-5" id="editAnggota" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
        <div class="modal-dialog py-5">
            <div class="modal-content bordered border-primary border-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="addData">Edit Data Anggota</h5>
                </div>
                <form action="config/process.php?aksiAnggota=update" method="POST">
                    <div class="modal-body">
                        <input type="text" name="nomor_anggota" id="nomorAnggota" hidden>
                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Tanggal Pendaftaran</span>
                            <input type="Date" class="form-control bordered border-primary" name="tanggal_pendaftaran"
                                id="tanggal_pendaftaran" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Nomor
                                Identitas</span>
                            <input type="tel" maxlength="16" class="form-control bordered border-primary" name="nomorId"
                                id="nomorIdUpdate" required>
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-select border-primary" name="jenis_identitas" id="jenisIdUpdate"
                                required>
                                <option selected disabled>Jenis Identitas</option>
                                <option value="NIS">NIS</option>
                                <option value="NISN">NISN</option>
                                <option value="NIK">NIK</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Nama Lengkap</span>
                            <input type="text" class="form-control bordered border-primary" name="nama" id="namaUpdate"
                                required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Tanggal Lahir</span>
                            <input type="Date" class="form-control bordered border-primary" name="tanggal_lahir"
                                id="tanggalUpdate" value="2000-01-01" required>
                        </div>


                        <div class="input-group mb-3">
                            <select class="form-select border-primary" name="kelas" id="kelasUpdate" required>
                                <option selected disabled>Kelas</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                            <select class="form-select border-primary" name="jurusan" id="jurusanUpdate" required>
                                <option selected disabled>Jurusan</option>
                                <option value="TP">TP</option>
                                <option value="TKRO">TKRO</option>
                                <option value="TKJ">TKJ</option>
                                <option value="DPIB">DPIB</option>
                                <option value="BKP">BKP</option>
                                <option value="TOI">TOI</option>
                                <option value="TFLM">TFLM</option>
                                <option value="SIJA">SIJA</option>
                                <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                            </select>
                            <select class="form-select border-primary" name="angka" id="angkaUpdate" required>
                                <option selected disabled>Angka</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <!-- <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Kelas</span>
                            <input type="text" class="form-control bordered border-primary" name="kelas"
                                id="kelasUpdate" required>
                        </div> -->

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Alamat</span>
                            <input type="text" class="form-control bordered border-primary" name="alamat"
                                id="alamatUpdate" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text bordered border-primary bg-light">Nomor Telepon</span>
                            <input type="tel" maxlength="15" class="form-control bordered border-primary" name="telepon"
                                id="teleponUpdate" required>
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

        let nomorAnggota = $(this).data("nomoranggota");
        let nomorID = $(this).data("nomorid");
        let jenis = $(this).data("jenisid");
        let nama = $(this).data("nama");
        let tanggal = $(this).data("tanggal");
        let kelas = $(this).data("kelas");
        let jurusan = $(this).data("jurusan");
        let angka = $(this).data("angka");
        let alamat = $(this).data("alamat");
        let telepon = $(this).data("nomor");
        let pendaftaran = $(this).data("pendaftaran");


        $("#nomorAnggota").val(nomorAnggota);
        $("#nomorIdUpdate").val(nomorID);
        $("#jenisIdUpdate").val(jenis);
        $("#namaUpdate").val(nama);
        $("#tanggalUpdate").val(tanggal);
        $("#kelasUpdate").val(kelas);
        $("#jurusanUpdate").val(jurusan);
        $("#angkaUpdate").val(angka);
        $("#alamatUpdate").val(alamat);
        $("#teleponUpdate").val(telepon);
        $("#tanggal_pendaftaran").val(pendaftaran);


    });
    </script>

    <!-- Kartu Anggota -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script>
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#kartuAnggotaCetak')[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function(element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function(dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('kartuAnggota.pdf');
            }, margins
        );
    }
    </script>

</body>

</html>