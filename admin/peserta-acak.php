<?php

// $koneksi = new mysqli("localhost", "root", "", "b-klas-voting");
$koneksi = new mysqli("sql210.infinityfree.com", "if0_34881428", "5xXJ3K5mZAo", "if0_34881428_b_klas");


$query = "SELECT * FROM peserta WHERE status = 'Belum ditampilkan' ORDER BY RAND() LIMIT 1";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1 class='nama'>" . $row['nama'] . "</h1>";
    echo "<p class='dawis'>Dawis " . $row['dawis'] . "</p>";
    echo "<img src='../gambar-upload/" . $row['foto'] . "' alt='' class='foto'>";
    echo "<h1 class='judul-penampilan'>" . $row['penampilan'] . "</h1>";
    echo "<div class='aksi'>";
    echo "<button type='button' class='btn btn-danger batal' onclick='tutup(\"acak\")'>Batal</button>";
    echo "<button type='button' class='btn btn-success tampilkan' onclick='tampilkan(\"" . $row['id'] . "\")'>Tampilkan</button>";
    echo "</div>";
}


?>