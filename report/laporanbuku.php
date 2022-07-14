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

    <title>Laporan Buku</title>
</head>

<body>
    <h4 class="mt-3 text-center">Laporan Buku</H2>

        <div class="table-responsive p-1">
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