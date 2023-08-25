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

<script>
    let bintangSatu = document.querySelector('.satu');
    let bintangDua = document.querySelector('.dua');
    let bintangTiga = document.querySelector('.tiga');
    let bintangEmpat = document.querySelector('.empat');
    let bintangLima = document.querySelector('.lima');
    let bintangDiklik = 0;

    let overlay = document.querySelector('.overlay');
    let nilai = document.querySelector('.nilai');

    bintangDuaTutup = false;

    let idPeserta = "";
    let namaUser = "";
    let komentar = document.getElementById('komentarInput');

    function kirimUlasan() {
        if (bintangDiklik === 0) {
            Swal.fire({
                icon: 'error',
                text: 'Silahkan berikan bintang terlebih dahulu',
            })
        } else {
            window.location = `functions/index.php?id-peserta=${idPeserta}&nama-user=${namaUser}&bintang=${bintangDiklik}&komentar=${komentar.value}`;
        }
    }

    function buka(type, id, nama) {
        idPeserta = id;
        namaUser = nama;
        if (type == "nilai") { overlay.style.display = "flex"; }
    }

    function tutup(type) {
        if (type == "nilai") {
            bintangSatu.style.color = "";
            bintangDua.style.color = "";
            bintangTiga.style.color = "";
            bintangEmpat.style.color = "";
            bintangLima.style.color = "";
            bintangDiklik = 0;
            overlay.style.display = "none";
        }
    }

    function bintang(jumlah) {
        bintangDiklik = jumlah;

        if (jumlah == 1) {
            bintangSatu.style.transition = " 300ms"; bintangSatu.style.transform = "scale(1.2)";
            bintangDua.style.transform = "scale(1)"; bintangTiga.style.transform = "scale(1)";
            bintangEmpat.style.transform = "scale(1)"; bintangLima.style.transform = "scale(1)";
            bintangSatu.style.color = "yellow"; bintangDua.style.color = ""; bintangTiga.style.color = "";
            bintangEmpat.style.color = ""; bintangLima.style.color = "";
        } else if (jumlah == 2) {
            bintangDua.style.transition = "300ms"; bintangSatu.style.transform = "scale(1.2)";
            bintangDua.style.transform = "scale(1.2)"; bintangTiga.style.transform = "scale(1)";
            bintangEmpat.style.transform = "scale(1)"; bintangLima.style.transform = "scale(1)";
            bintangSatu.style.color = "yellow"; bintangDua.style.color = "yellow"; bintangTiga.style.color = "";
            bintangEmpat.style.color = ""; bintangLima.style.color = "";
        } else if (jumlah == 3) {
            bintangTiga.style.transition = "300ms"; bintangSatu.style.transform = "scale(1.2)";
            bintangDua.style.transform = "scale(1.2)"; bintangTiga.style.transform = "scale(1.2)";
            bintangEmpat.style.transform = "scale(1)"; bintangLima.style.transform = "scale(1)";
            bintangSatu.style.color = "yellow"; bintangDua.style.color = "yellow";
            bintangTiga.style.color = "yellow"; bintangEmpat.style.color = ""; bintangLima.style.color = "";
        } else
            if (jumlah == 4) {
                bintangEmpat.style.transition = "300ms"; bintangSatu.style.transform = "scale(1.2)";
                bintangDua.style.transform = "scale(1.2)"; bintangTiga.style.transform = "scale(1.2)";
                bintangEmpat.style.transform = "scale(1.2)"; bintangLima.style.transform = "scale(1)";
                bintangSatu.style.color = "yellow"; bintangDua.style.color = "yellow";
                bintangTiga.style.color = "yellow"; bintangEmpat.style.color = "yellow"; bintangLima.style.color = "";
            } else if (jumlah == 5) {
                bintangLima.style.transition = "300ms";
                bintangSatu.style.transform = "scale(1.2)"; bintangDua.style.transform = "scale(1.2)";
                bintangTiga.style.transform = "scale(1.2)"; bintangEmpat.style.transform = "scale(1.2)";
                bintangLima.style.transform = "scale(1.2)"; bintangSatu.style.color = "yellow";
                bintangDua.style.color = "yellow"; bintangTiga.style.color = "yellow";
                bintangEmpat.style.color = "yellow"; bintangLima.style.color = "yellow";
            }
    }

    function updateStarRating(total) {
        var starClasses = ['', '', '', '', ''];

        if (total >= 1 && total <= 1.9) {
            if (total > 1 && total <= 1.9) {
                starClasses[0] = '-fill';
                starClasses[1] = '-half';
            } else {
                starClasses[0] = '-fill';
                starClasses[1] = '';
            }
        } else if (total >= 2 && total <= 2.9) {
            if (total > 2 && total <= 2.9) {
                starClasses[0] = '-fill';
                starClasses[1] = '-fill';
                starClasses[2] = '-half';
            } else {
                starClasses[0] = '-fill';
                starClasses[1] = '-fill';
                starClasses[2] = '';
            }
        } else if (total >= 3 && total <= 3.9) {
            if (total > 3 && total <= 3.9) {
                starClasses[0] = '-fill';
                starClasses[1] = '-fill';
                starClasses[2] = '-fill';
                starClasses[3] = '-half';
            } else {
                starClasses[0] = '-fill';
                starClasses[1] = '-fill';
                starClasses[2] = '-fill';
                starClasses[3] = '';
            }
        } else if (total >= 4 && total <= 4.9) {
            if (total > 4 && total <= 4.9) {
                starClasses[0] = '-fill';
                starClasses[1] = '-fill';
                starClasses[2] = '-fill';
                starClasses[3] = '-fill';
                starClasses[4] = '-half';
            } else {
                starClasses[0] = '-fill';
                starClasses[1] = '-fill';
                starClasses[2] = '-fill';
                starClasses[3] = '-fill';
                starClasses[4] = '';
            }
        } else if (total >= 5) {
            starClasses = ['-fill', '-fill', '-fill', '-fill', '-fill'];
        }

        var starElements = document.querySelectorAll('.live-skor .bintang i');
        for (var i = 0; i < starClasses.length; i++) {
            starElements[i].className = 'bi bi-star' + starClasses[i] + ' ' + (i + 1);
        }
    }

    function updateLiveScore() {
        let id = <?= $id ?>;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status == 200) {
                document.querySelector('.live-skor .skor span').innerHTML = "Rating : " + xhr.responseText;
                updateStarRating(xhr.responseText);
            }
        }

        xhr.open("GET", `get-live-score.php?id=${id}`, true);
        xhr.send();
    }

        // setInterval(updateLiveScore, 1000);
</script>