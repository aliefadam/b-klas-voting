<?php
include '../functions/index.php';

$hasil = getPesertaDitampilkan();

$html = '';

if (!empty($hasil) && $hasil['status'] == "Sedang ditampilkan") {
    $id = $hasil['id'];
    $nama = $hasil['nama'];
    $dawis = $hasil['dawis'];
    $penampilan = $hasil['penampilan'];
    $foto = $hasil['foto'];
    $skor = getRataRataUlasan($id);

    $html .= '<div class="keterangan">';
    $html .= '<p><i class="bi bi-circle-fill me-2"></i>Sedang Tampil</p>';

    if (validBeriUlasan($_COOKIE['nama'], $id)) {
        $html .= '<button type="button" class="btn btn-sm btn-primary nilai" onclick="buka(\'nilai\', \'' . $id . '\', \'' . $_COOKIE['nama'] . '\')"><i class="bi bi-star-fill"></i> Beri Nilai</button>';
    }

    $html .= '</div>';
    $html .= '<h1 class="nama">' . $nama . '</h1>';
    $html .= '<p class="dawis">Dawis ' . $dawis . '</p>';
    $html .= '<img class="foto shadow-lg" src="gambar-upload/' . $foto . '" alt="">';
    $html .= '<h1 class="judul-penampilan">"' . $penampilan . '"</h1>';
    $html .= '<div class="live-skor">';
    $html .= '<div class="skor"><span>Rating : ' . $skor . '</span></div>';

    $starClasses = ['', '', '', '', ''];
    if ($skor >= 1 && $skor <= 1.9) {
        if ($skor > 1 && $skor <= 1.9) {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-half';
        } else {
            $starClasses[0] = '-fill';
            $starClasses[1] = '';
        }
    } elseif ($skor >= 2 && $skor <= 2.9) {
        if ($skor > 2 && $skor <= 2.9) {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-fill';
            $starClasses[2] = '-half';
        } else {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-fill';
            $starClasses[2] = '';
        }
    } elseif ($skor >= 3 && $skor <= 3.9) {
        if ($skor > 3 && $skor <= 3.9) {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-fill';
            $starClasses[2] = '-fill';
            $starClasses[3] = '-half';
        } else {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-fill';
            $starClasses[2] = '-fill';
            $starClasses[3] = '';
        }
    } elseif ($skor >= 4 && $skor <= 4.9) {
        if ($skor > 4 && $skor <= 4.9) {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-fill';
            $starClasses[2] = '-fill';
            $starClasses[3] = '-fill';
            $starClasses[4] = '-half';
        } else {
            $starClasses[0] = '-fill';
            $starClasses[1] = '-fill';
            $starClasses[2] = '-fill';
            $starClasses[3] = '-fill';
            $starClasses[4] = '';
        }
    } elseif ($skor >= 5) {
        $starClasses = ['-fill', '-fill', '-fill', '-fill', '-fill'];
    }

    $html .= '<div class="bintang">';
    $html .= '<i class="bi bi-star' . $starClasses[0] . ' bintang-satu"></i>';
    $html .= '<i class="bi bi-star' . $starClasses[1] . ' bintang-dua"></i>';
    $html .= '<i class="bi bi-star' . $starClasses[2] . ' bintang-tiga"></i>';
    $html .= '<i class="bi bi-star' . $starClasses[3] . ' bintang-empat"></i>';
    $html .= '<i class="bi bi-star' . $starClasses[4] . ' bintang-lima"></i>';
    $html .= '</div></div>';
} else {
    // Jika tidak ada peserta yang tampil
    $html = '<div class="tidak-ada-peserta">';
    $html .= '<i class="bi bi-question-octagon"></i>';
    $html .= '<h1>TIDAK ADA PESERTA YANG SEDANG TAMPIL</h1>';
    $html .= '</div>';

}

// Kembalikan hasil dalam format HTML
header('Content-Type: text/html');
echo $html;
?>