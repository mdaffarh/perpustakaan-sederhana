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

    <title>Laporan Peminjaman Bulanan </title>
</head>

<body>
    <h4 class="mt-3 text-center">Laporan Peminjaman Bulanan</H2>
        <div class="table-responsive p-1">
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
                </thead>
                <?php
	                 $no = 1;
	                 foreach($db->report_data_peminjaman() as $x){ ?>
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
                    <?php 
	            }
	            ?>
                </tbody>
            </table>
        </div>
        <script>
        window.print();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>

</html>