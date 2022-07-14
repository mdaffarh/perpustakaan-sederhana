<?php 
 
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "db_perpustakaan";
    var $koneksi = "";
	
  function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass,$this->db);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
  }

    // Login
    function login($user,$pass){
      session_start();
          if (isset($_POST['login'])) {
         $ceklogin = mysqli_query($this->koneksi,"SELECT * FROM tb_admin WHERE username='$user' AND password='$pass'");
         $count = mysqli_num_rows($ceklogin);
         if ($count > 0) {
          $_SESSION['username'] = $user;
          header('Location: ../index.php');      
          } else {
              echo "<script>alert('Username atau Password Anda Salah');document.location='../login.php'</script>";
           }  
        }
    }
  
    function logout(){
      session_start();
      unset($_SESSION['stat_login']);
      session_destroy();
      echo "<script>location='../login.php';</script>";
      
    }
 
  // CRUD BUKU
	function tampil_data_buku(){
		$data = mysqli_query($this->koneksi,"select * from tb_buku");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}


  function input_buku($bidang,$judul,$tipe,$penulis,$penerbit,$tahunTerbit,$tanggalMasuk,$stock){
		mysqli_query($this->koneksi,"insert into tb_buku values(NULL,'$bidang','$judul','$tipe','$penulis','$penerbit','$tahunTerbit','$tanggalMasuk','$stock')");
	}


  function hapus_buku($id){
    mysqli_query($this->koneksi,"delete from tb_buku where nomor_buku='$id'");
  }



  function edit($id){
    $data = mysqli_query($this->koneksi,"select * from user where id='$id'");
    while($d = mysqli_fetch_array($data)){
      $hasil[] = $d;
    }
    return $hasil;
  }


  
  function update_buku($id,$bidang,$judul,$tipe,$penulis,$penerbit,$tahunTerbit,$tanggalMasuk,$stock){
    mysqli_query($this->koneksi,"update tb_buku set bidang_pustaka='$bidang', judul='$judul', tipe='$tipe', penulis='$penulis',penerbit='$penerbit',tahun_terbit='$tahunTerbit',tanggal_masuk='$tanggalMasuk',jumlah_buku='$stock' where nomor_buku='$id'");
  }

  // CRUD ANGGOTA
  function cetak($id){
    $data = mysqli_query($this->koneksi,"select * from tb_anggota where nomor_anggota='$id'");
    while($d = mysqli_fetch_array($data)){
      $hasil[] = $d;
    }
    return $hasil;
  }

	function tampil_data_anggota(){
		$data = mysqli_query($this->koneksi,"select * from tb_anggota");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  function hapus_anggota($id){
    mysqli_query($this->koneksi,"delete from tb_anggota where nomor_anggota='$id'");
  }

  function input_anggota($nomorIdentitas,$jenis,$nama,$tanggal,$kelas,$jurusan,$angka,$alamat,$nomor,$pendaftaran){
		mysqli_query($this->koneksi,"insert into tb_anggota values(NULL,'$nomorIdentitas','$jenis','$nama','$tanggal','$kelas','$jurusan','$angka','$alamat','$nomor','$pendaftaran')");
	}

  function update_anggota($nomorAnggota,$nomorIdentitas,$jenis,$nama,$tanggal,$kelas,$jurusan,$angka,$alamat,$nomor,$pendaftaran){
		mysqli_query($this->koneksi,"update tb_anggota set nomor_identitas='$nomorIdentitas',jenis_identitas='$jenis',nama_lengkap='$nama',tanggal_lahir='$tanggal',kelas='$kelas',jurusan='$jurusan',angka='$angka',alamat='$alamat',nomor_telepon='$nomor',tanggal_pendaftaran='$pendaftaran' where nomor_anggota='$nomorAnggota'");
  }

  // CRUD PEMINJAMAN
  function tampil_data_peminjaman(){
		$data = mysqli_query($this->koneksi,"SELECT * FROM tb_peminjaman ORDER BY FIELD(status, 'Dalam Peminjaman', 'Sudah Dikembalikan', 'Peminjaman Selesai')");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  function tampil_nomorAnggota(){
		$data = mysqli_query($this->koneksi,"select nomor_anggota,nama_lengkap from tb_anggota");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  function tampil_nomorBuku(){
		$data = mysqli_query($this->koneksi,"select nomor_buku,judul from tb_buku");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  function input_peminjaman($nomorAnggota,$nomorBuku,$waktuPinjam,$batasWaktu,$waktuKembali,$denda,$status){
		mysqli_query($this->koneksi,"insert into tb_peminjaman values(NULL,'$nomorAnggota','$nomorBuku','$waktuPinjam','$batasWaktu','$waktuKembali','$denda','$status')");
	}

  function hapus_peminjaman($id){
    mysqli_query($this->koneksi,"delete from tb_peminjaman where nomor_peminjaman='$id'");
  }

  function stock($stock){
    $stok = count($stock);
    for($i = 0;$i < $stok;$i++){
      mysqli_query($this->koneksi,"update tb_buku set jumlah_buku=jumlah_buku-1 where nomor_buku ='$stock[$i]'");
    }
  }

  function pengembalian($nomorPeminjaman,$waktuKembali,$status){
		mysqli_query($this->koneksi,"update tb_peminjaman set waktu_kembali='$waktuKembali',status='$status' where nomor_peminjaman='$nomorPeminjaman'");
  }

  function denda($nomorPeminjaman){
    mysqli_query($this->koneksi,"update tb_peminjaman set denda=datediff(waktu_kembali,batas_waktu)*2000 where nomor_peminjaman='$nomorPeminjaman'");
  }

  function stockKembali($stock){
    $stok = count($stock);
    for($i = 0;$i < $stok;$i++){
      mysqli_query($this->koneksi,"update tb_buku set jumlah_buku=jumlah_buku+1 where nomor_buku ='$stock[$i]'");
    }
  }

  function selesai($id,$status){
    mysqli_query($this->koneksi,"update tb_peminjaman set status='$status' where nomor_peminjaman='$id'");
  }

  function update_peminjaman($nomorPeminjaman,$nomorAnggota,$nomorBuku,$waktuPinjam,$batasWaktu,$waktuKembali,$denda,$status){
    mysqli_query($this->koneksi,"update tb_peminjaman set nomor_anggota='$nomorAnggota',nomor_buku='$nomorBuku',waktu_pinjam='$waktuPinjam',batas_waktu='$batasWaktu',waktu_kembali='$waktuKembali',denda='$denda',status='$status' where nomor_peminjaman = '$nomorPeminjaman'");
  }

  // Report
  function report_data_peminjaman(){
		$data = mysqli_query($this->koneksi,"SELECT * FROM tb_peminjaman WHERE waktu_pinjam BETWEEN '2022-03-01' AND '2022-03-31'");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  function report_denda(){
		$data = mysqli_query($this->koneksi,"SELECT * FROM tb_peminjaman WHERE denda > 0 AND waktu_kembali BETWEEN '2022-03-01' AND '2022-03-31'");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  function report_anggota(){
		$data = mysqli_query($this->koneksi,"select * from tb_anggota  WHERE tanggal_pendaftaran BETWEEN '2022-03-01' AND '2022-03-31'");
    $hasil = [];
		while($d = mysqli_fetch_array($data)){
			$hasil[] = $d;
		}
		return $hasil;
	}

  // Dashboard

  function dalamPeminjaman(){
		$data = mysqli_query($this->koneksi,"SELECT COUNT(status) as A FROM tb_peminjaman WHERE status='Dalam Peminjaman'");
    return $data;
	}

  function peminjamanSelesai(){
		$data = mysqli_query($this->koneksi,"SELECT COUNT(status) as A FROM tb_peminjaman WHERE status='Peminjaman Selesai'");
    return $data;
	}

  function jumlahBuku(){
		$data = mysqli_query($this->koneksi,"SELECT count(nomor_buku) as A from tb_buku");
    return $data;
	}

  function jumlahAnggota(){
		$data = mysqli_query($this->koneksi,"SELECT count(nomor_anggota) as A from tb_anggota");
    return $data;
	}

  



}