<?php

$koneksi = new mysqli("localhost", "root", "", "b-klas-voting");

function tambahPeserta($data, $data_gambar)
{
    $nama = $data['nama'];
    $dawis = $data['dawis'];
    $penampilan = $data['penampilan'];
    $status = "Belum ditampilkan";

    $ekstensiFoto = $data_gambar['foto']['name'];
    $ekstensiFoto = explode(".", $ekstensiFoto);
    $ekstensiFoto = end($ekstensiFoto);
    $namaFoto = date('ymdhis') . ".$ekstensiFoto";

    move_uploaded_file($data_gambar['foto']['tmp_name'], "../gambar-upload/$namaFoto");

    global $koneksi;

    $query = "INSERT INTO peserta VALUES (NULL, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("sisss", $nama, $dawis, $penampilan, $namaFoto, $status);
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

    // Mengambil nama file gambar dari database
    $query = "SELECT foto FROM peserta WHERE nama = ?";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("s", $nama);
    $stmt->execute();

    // Mengikat hasil query ke dalam variabel $namaFoto
    $stmt->bind_result($namaFoto);

    // Mengambil nilai dari query
    $stmt->fetch();

    // Tutup pernyataan SELECT sebelum melanjutkan
    $stmt->close();

    // Menghapus file gambar jika ada
    if ($namaFoto) {
        unlink("../gambar-upload/$namaFoto");
    }

    // Menghapus data peserta dari database
    $query = "DELETE FROM peserta WHERE nama = ?";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("s", $nama);
    $stmt->execute();

    header('Location: ../admin/daftar-peserta.php');
}



function edit($data)
{
    global $koneksi;

    $id = $data['id'];
    $nama = $data['nama'];
    $dawis = $data['dawis'];
    $penampilan = $data['penampilan'];

    // ketika user tidak mengedit foto
    if ($_FILES['foto']['name'] == "") {
        $query = "UPDATE peserta SET nama = ?, dawis = ?, penampilan = ? WHERE id = ?";
        $stmt = $koneksi->prepare($query);

        $stmt->bind_param("siss", $nama, $dawis, $penampilan, $id);
        $stmt->execute();
    }
    // ketika user melakukan edit foto
    else {


        $ekstensiFoto = $_FILES['foto']['name'];
        $ekstensiFoto = explode(".", $ekstensiFoto);
        $ekstensiFoto = end($ekstensiFoto);
        $namaFoto = date('ymdhis') . ".$ekstensiFoto";

        move_uploaded_file($_FILES['foto']['tmp_name'], "../gambar-upload/$namaFoto");

        $queryCari = "SELECT * FROM peserta WHERE id = '$id'";
        $result = $koneksi->query($queryCari);
        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        $namaFotoLama = $rows[0]['foto'];

        unlink("../gambar-upload/$namaFotoLama");

        $query = "UPDATE peserta SET nama = ?, dawis = ?, penampilan = ?, foto = ? WHERE id = ?";
        $stmt = $koneksi->prepare($query);

        $stmt->bind_param("sisss", $nama, $dawis, $penampilan, $namaFoto, $id);
        $stmt->execute();
    }


    header('Location: ../admin/daftar-peserta.php');

}

function tampilkanPeserta($id)
{
    global $koneksi;

    $skorAwal = 0;
    $status = "Sedang ditampilkan";

    $query = "INSERT INTO penampilan VALUES (NULL, ?, ?)";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("ii", $id, $skorAwal);
    $stmt->execute();

    $query = "UPDATE peserta SET `status` = ? WHERE id = ?";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("si", $status, $id);
    $stmt->execute();

    header('Location: ../admin/index.php');

}

function hentikanPeserta($id)
{
    global $koneksi;

    $status = "Sudah ditampilkan";

    $query = "UPDATE peserta SET `status` = ? WHERE id = ? ";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("si", $status, $id);
    $stmt->execute();

    header('Location: ../admin/index.php');
}

function getPesertaBelumDitampilkan()
{
    global $koneksi;

    $query = "SELECT * FROM peserta WHERE status = 'Belum ditampilkan'";
    $result = $koneksi->query($query);
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    return $rows;
}

function getPesertaDitampilkan()
{
    global $koneksi;
    $status = "Sedang ditampilkan";

    $query = "SELECT * FROM penampilan INNER JOIN peserta ON penampilan.id_peserta = peserta.id WHERE `status` = '$status'";
    $result = $koneksi->query($query);
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    if (empty($rows)) {
        return $rows;
    }
    return $rows[0];
}

if (isset($_POST['tambah-peserta'])) {
    tambahPeserta($_POST, $_FILES);
}

if (isset($_GET['nama-hapus'])) {
    $nama = $_GET['nama-hapus'];
    hapus($nama);
}

if (isset($_POST['edit'])) {
    edit($_POST);
}

if (isset($_GET['id-tampilkan'])) {
    tampilkanPeserta($_GET['id-tampilkan']);
}

if (isset($_GET['id-hentikan'])) {
    hentikanPeserta($_GET['id-hentikan']);
}




?>