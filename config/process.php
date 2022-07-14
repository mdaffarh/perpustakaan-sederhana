<?php 
include 'controller.php';
$db = new database();
//  CRUD PEMINJAMAN
$aksiPeminjaman = $_GET['aksiPeminjaman'];
 if($aksiPeminjaman == "tambah"){
	 $denda = 0;
	 $status = "Dalam Peminjaman";
 	$db->input_peminjaman($_POST['nomorAnggota'],implode(",", $_POST['nomorBuku']),$_POST['waktuPinjam'],$_POST['batasWaktu'],$_POST['batasWaktu'],$denda,$status);
	 $db->stock($_POST['nomorBuku']);
 	header("location:../peminjaman.php");
 }elseif($aksiPeminjaman == "hapus"){ 	
 	$db->hapus_peminjaman($_GET['nomor_peminjaman']);
	header("location:../peminjaman.php");
 }elseif($aksiPeminjaman == "pengembalian"){
	$status = "Sudah Dikembalikan";
	$arraybuku=str_split($_POST['nomor_buku']);
	$db->stockKembali($arraybuku);
	$db->pengembalian($_POST['nomor_peminjaman'],$_POST['tanggal_kembali'],$status);
	$db->denda($_POST['nomor_peminjaman']);
	header("location:../peminjaman.php");
 }elseif($aksiPeminjaman == "selesai"){
	 $status = "Peminjaman Selesai";
	 $db->selesai($_POST['nomor_peminjaman'],$status);
	 header("location:../peminjaman.php");
 }elseif($aksiPeminjaman == "update"){
	$db->update_peminjaman($_POST['nomorPeminjaman'],$_POST['nomorAnggota'], $_POST['nomorBuku'],$_POST['waktu_pinjam'],$_POST['batas_waktu'],$_POST['tanggal_kembali'],$_POST['denda'],$_POST['status']);
	header("location:../peminjaman.php");
}

// CRUD BUKU
$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
 	$db->input_buku($_POST['bidang_pustaka'],$_POST['judul'],$_POST['tipe'],$_POST['penulis'],$_POST['penerbit'],$_POST['tahun_terbit'],$_POST['tanggal_masuk'],$_POST['jumlah_buku']);
 	header("location:../buku.php");
 }elseif($aksi == "hapus"){ 	
 	$db->hapus_buku($_GET['nomor_buku']);
	header("location:../buku.php");
 }elseif($aksi == "update"){
 	$db->update_buku($_POST['nomor_buku'],$_POST['bidang_pustaka'],$_POST['judul'],$_POST['tipe'],$_POST['penulis'],$_POST['penerbit'],$_POST['tahun_terbit'],$_POST['tanggal_masuk'],$_POST['jumlah_buku']);
 	header("location:../buku.php");
 }elseif($aksi == "login"){
	 $db->login($_POST['user'],$_POST['pass']);
 }elseif($aksi == "logout"){
	 $db->logout();

 }

// CRUD ANGGOTA
$aksiAnggota = $_GET['aksiAnggota'];
 if($aksiAnggota == "tambah"){
 	$db->input_anggota($_POST['nomorId'],$_POST['jenis_identitas'],$_POST['nama'],$_POST['tanggal_lahir'],$_POST['kelas'],$_POST['jurusan'],$_POST['angka'],$_POST['alamat'],$_POST['telepon'],$_POST['tanggal_pendaftaran']);
 	header("location:../anggota.php");
 }elseif($aksiAnggota == "hapus"){ 	
 	$db->hapus_anggota($_GET['nomor_anggota']);
	header("location:../anggota.php");
 }elseif($aksiAnggota == "update"){
 	$db->update_anggota($_POST['nomor_anggota'],$_POST['nomorId'],$_POST['jenis_identitas'],$_POST['nama'],$_POST['tanggal_lahir'],$_POST['kelas'],$_POST['jurusan'],$_POST['angka'],$_POST['alamat'],$_POST['telepon'],$_POST['tanggal_pendaftaran']);
 	header("location:../anggota.php");
 }


?>