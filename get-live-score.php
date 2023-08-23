<?php
// Ambil skor dari sumber data Anda, misalnya dari database
include('functions/index.php');
$id = 18;
$skor = getRataRataUlasan($id); // Pastikan ini berfungsi sesuai kebutuhan Anda

// Kembalikan skor sebagai respons JSON
header('Content-Type: application/json');
echo json_encode(['score' => $skor]);
?>