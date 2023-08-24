<?php

session_start();

$koneksi = new mysqli("localhost", "root", "", "b-klas-voting");
// $koneksi = new mysqli("sql210.infinityfree.com", "if0_34881428", "5xXJ3K5mZAo", "if0_34881428_b_klas");

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

function daftarPesertaWhere($keyword)
{
    global $koneksi;

    $query = "SELECT * FROM peserta WHERE nama LIKE ? OR dawis LIKE ? OR penampilan LIKE ?";

    $stmt = $koneksi->prepare($query);

    $keywordParam = "%$keyword%";
    $stmt->bind_param("sss", $keywordParam, $keywordParam, $keywordParam);

    $stmt->execute();

    $result = $stmt->get_result();
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $stmt->close();

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

    $namaFoto = "";

    $stmt->bind_result($namaFoto);

    $stmt->fetch();

    $stmt->close();

    if ($namaFoto) {
        unlink("../gambar-upload/$namaFoto");
    }

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

    // setcookie("id", hash("sha256", $id), time() + 86400);
    setcookie("id", $id, time() + 86400, "/");
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

    setcookie("id", "", time() - 3600, "/");
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

function getPesertaBelumDitampilkanWhere($keyword)
{
    global $koneksi;

    $query = "SELECT * FROM peserta WHERE status = 'Belum ditampilkan' AND (nama LIKE ? OR dawis LIKE ? OR penampilan LIKE ?)";

    $stmt = $koneksi->prepare($query);

    $keywordParam = "%$keyword%";
    $stmt->bind_param("sss", $keywordParam, $keywordParam, $keywordParam);

    $stmt->execute();

    $result = $stmt->get_result();
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $stmt->close();

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


function masuk($data)
{
    global $koneksi;

    $nama = $data['nama'];

    $query = "INSERT INTO user VALUES (NULL, ?)";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("s", $nama);
    $stmt->execute();

    setcookie("nama", hash("sha256", $nama), time() + 86400, "/");
    header("Location: index.php");
}

function cekMasuk()
{
    global $koneksi;

    if (isset($_COOKIE['nama'])) {
        $namaCookie = $_COOKIE['nama'];

        $query = "SELECT * FROM user";
        $result = $koneksi->query($query);
        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        foreach ($rows as $user) {
            if ($namaCookie == hash("sha256", $user['nama'])) {
                return true;
            }
        }

    }

    return false;
}

function getIdUser($nama)
{
    global $koneksi;

    $query = "SELECT * FROM user";
    $result = $koneksi->query($query);
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    foreach ($rows as $user) {
        if ($nama == hash("sha256", $user['nama'])) {
            return $user['id'];
        }
    }
}

function beriUlasan($namaUser, $idPeserta, $skor, $komentar)
{
    global $koneksi;

    $idUser = getIdUser($namaUser);

    $query = "INSERT INTO penilaian VALUES (NULL, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);

    $stmt->bind_param("siis", $idUser, $idPeserta, $skor, $komentar);
    $stmt->execute();

    header("Location: ../index.php");
}

function validBeriUlasan($namaUser, $idPeserta)
{
    global $koneksi;

    $idUser = getIdUser($namaUser);

    $query = "SELECT * FROM penilaian WHERE id_user = $idUser AND id_peserta = $idPeserta";
    $result = $koneksi->query($query);
    $rows = [];

    if ($result->num_rows > 0) {
        return false;
    }

    return true;

}

function getRataRataUlasan($idPeserta)
{
    global $koneksi;

    $query = "SELECT ROUND(AVG(Skor), 1) AS rata_rata_skor FROM penilaian WHERE id_peserta = $idPeserta";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rataRataUlasan = $row['rata_rata_skor'];
        if ($rataRataUlasan == null) {
            return 0;
        }
        return $rataRataUlasan;
    }
}

function dataPenilaianPeserta()
{
    global $koneksi;

    $query = "SELECT 
                p.id_peserta,
                peserta.nama AS nama_peserta,
                SUM(p.skor) AS total_skor,
                ROUND(AVG(p.skor), 1) AS rata_rata_skor,
                COUNT(p.id_user) AS jumlah_vote
              FROM 
                penilaian p
              JOIN
                peserta ON p.id_peserta = peserta.id
              GROUP BY
                p.id_peserta
              ORDER BY rata_rata_skor DESC";

    $result = $koneksi->query($query);
    $dataPenilaian = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dataPenilaian[] = $row;
        }
    }

    return $dataPenilaian;
}

function registerUser($username, $password)
{
    global $koneksi;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO login (username, password) VALUES (?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


function login($data)
{

    global $koneksi;

    // username = admin;
    // password = bklaslossss;

    $username = $data['username'];
    $password = $data['password'];

    $query = "SELECT id, username, password FROM login WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['login'] = true;
            header('Location: ../admin/index.php');
            exit;
        } else {
            header('Location: login.php');
        }
    } else {
        return false;
    }

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

if (isset($_POST['masuk'])) {
    masuk($_POST);
}

if (isset($_GET['id-peserta'])) {
    $namaUser = $_GET['nama-user'];
    $idPeserta = $_GET['id-peserta'];
    $skor = $_GET['bintang'];
    $komentar = $_GET['komentar'];

    beriUlasan($namaUser, $idPeserta, $skor, $komentar);
}

if (isset($_POST['login-admin'])) {
    login($_POST);
}


?>