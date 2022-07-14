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

    <title>Kartu Anggota</title>
</head>

<body>
    <?php
    $nomor_anggota = $_GET['nomor_anggota'];
	                 $no = 1;
	                 foreach($db->cetak($nomor_anggota) as $x){ ?>
    <div class="border border-dark p-2 m-1 col-5">
        <p class="fw-bolder text-center text-nowrap">Kartu Perpustakaan SMK NEGERI 1 CIBINONG</p>
        <hr>
        <p class="mb-0"> <span class="fw-bolder">Nomor Anggota</span> : <?php echo $x['nomor_anggota']; ?></p>
        <p class="mb-0"> <span class="fw-bolder"><?php echo $x['jenis_identitas']; ?></span> :
            <?php echo $x['nomor_identitas']; ?></p>
        <p class="mb-0"> <span class="fw-bolder">Nama Lengkap</span> : <?php echo $x['nama_lengkap']; ?></p>
        <p class="mb-0"> <span class="fw-bolder">Tanggal Lahir</span> : <?php echo $x['tanggal_lahir']; ?> </p>
        <p class="mb-0"> <span class="fw-bolder">Kelas</span> : <?php echo $x['kelas']; ?> <?php echo $x['jurusan']; ?>
            <?php echo $x['angka']; ?></p>
        <p class="mb-0"> <span class="fw-bolder">Alamat</span> : <?php echo $x['alamat']; ?></p>
        <p class="mb-0"> <span class="fw-bolder">Nomor Telepon</span> : <?php echo $x['nomor_telepon']; ?></p>
    </div>
    <?php 
	            }
	            ?>
    <script>
    window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>