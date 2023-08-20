<?php

$koneksi = new mysqli("localhost", "root", "", "b-klas-voting");

function tambahPeserta($data, $data_gambar)
{
    $nama = $data['nama'];
    $dawis = $data['dawis'];
    $penampilan = $data['penampilan'];

    $ekstensiFoto = $data_gambar['foto']['name'];
    $ekstensiFoto = explode(".", $ekstensiFoto);
    $ekstensiFoto = end($ekstensiFoto);
    $namaFoto = date('ymdhis') . ".$ekstensiFoto";

    move_uploaded_file($data_gambar['foto']['tmp_name'], "../gambar-upload/$namaFoto");

    global $koneksi;

    $query = "INSERT INTO peserta VALUES (NULL, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("siss", $nama, $dawis, $penampilan, $namaFoto);
    $stmt->execute();
    header("Location: ../admin/tambah-peserta.php");
}

function daftarPeserta()
{

    global $koneksi;

    $query = "SELECT * FROM peserta";
    $result = $koneksi->query($query);
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function hapus($nama)
{
    global $koneksi;

    $query = "DELETE FROM peserta WHERE nama = ?";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("s", $nama);
    $stmt->execute();

    header('Location: ../admin/daftar-peserta.php');
}

function edit() {
    // aksi database
    session_start();
    $nama = $_POST["nama"];
    $dawis = $_POST["dawis"];
    $penampilan = $_POST["penampilan"];
    $foto = $_POST["foto"];

    $_SESSION["nama"] = $nama;
    $_SESSION["dawis"] = $dawis;
    $_SESSION["penampilan"] = $penampilan;
    $_SESSION["foto"] = $foto;

    header('Location: ../admin/daftar-peserta.php');

}

if (isset($_POST['tambah-peserta'])) {
    tambahPeserta($_POST, $_FILES);
}

if (isset($_GET['nama-hapus'])) {
    $nama = $_GET['nama-hapus'];
    hapus($nama);
}

if(isset($_POST['edit'])) {
    edit();
}




?>