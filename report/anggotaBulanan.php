<?php 
 include '../config/controller.php';
 session_start();
  
 if(!isset($_SESSION['username'])){
    header('location:login.php');
} 

$db = new database();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Laporan Anggota Bulanan</title>
</head>

<body>
    <h4 class="mt-3 text-center">Laporan Anggota Bulanan</H2>

        <div class="table-responsive p-1">
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
                </thead>
                <?php
	                 $no = 1;
	                 foreach($db->report_anggota() as $x){ ?>
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


                    <?php 
	            }
	            ?>
        </div>
        <script>
        window.print();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>