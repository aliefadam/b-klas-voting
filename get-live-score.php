<?php
include('functions/index.php');
$id = $_GET['id'];
$skor = getRataRataUlasan($id);
echo $skor;
?>