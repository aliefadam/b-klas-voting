<?php
// Ambil skor dari sumber data Anda, misalnya dari database
include('functions/index.php');
$id = $_COOKIE['id'];
$skor = getRataRataUlasan($id);

header('Content-Type: application/json');
if ($skor = 0) {

}
echo json_encode(['score' => $skor]);
?>