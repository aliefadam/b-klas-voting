<!doctype html>
<?php
include('functions/index.php');

if (!cekMasuk()) {
    header('Location: login.php');
    exit;
}


?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B-KLAS GOT TALENTS | PENAMPILAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="css/home.css">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">B-KLAS GOT TALENTS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Penampilan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- content -->
    <div class="container kotak">
        <div class="penampilan">
            <?php if (!empty(getPesertaDitampilkan())): ?>
                <?php if (getPesertaDitampilkan()['status'] == "Sedang ditampilkan"): ?>
                    <?php
                    $id = getPesertaDitampilkan()['id'];
                    $nama = getPesertaDitampilkan()['nama'];
                    $dawis = getPesertaDitampilkan()['dawis'];
                    $penampilan = getPesertaDitampilkan()['penampilan'];
                    $foto = getPesertaDitampilkan()['foto'];
                    ?>
                    <!-- jika ada peserta yang tampil -->
                    <div class="keterangan">
                        <p><i class="bi bi-circle-fill me-2"></i>Sedang Tampil</p>
                        <?php if (validBeriUlasan($_COOKIE['nama'], $id)): ?>
                            <button type="button" class="btn btn-sm btn-primary nilai"
                                onclick="buka('nilai', '<?= $id ?>', '<?= $_COOKIE['nama'] ?>')"><i class="bi bi-star-fill"></i>
                                Beri Nilai</button>
                        <?php endif; ?>
                    </div>
                    <h1 class="nama">
                        <?= $nama ?>
                    </h1>
                    <p class="dawis">Dawis
                        <?= $dawis ?>
                    </p>
                    <img class="foto shadow-lg" src="gambar-upload/<?= $foto ?>" alt="">
                    <h1 class="judul-penampilan">"
                        <?= $penampilan ?> "
                    </h1>
                    <div class="live-skor">
                        <div class="skor">
                            <span>Skor =
                                <?= getRataRataUlasan($id) ?>
                            </span>
                        </div>
                        <div class="bintang">
                            <?php
                            $total = getRataRataUlasan($id);
                            $starClasses = ['', '', '', '', ''];
                            if ($total >= 1 && $total <= 1.9) {
                                if ($total > 1 && $total <= 1.9) {
                                    $starClasses[0] = '-fill';
                                    $starClasses[1] = '-half';
                                } else {
                                    $starClasses[0] = '-fill';
                                    $starClasses[1] = '';
                                }
                            } elseif ($total >= 2 && $total <= 2.9) {
                                if ($total > 2 && $total <= 2.9) {
                                    $starClasses[0] = '-fill';
                                    $starClasses[1] = '-fill';
                                    $starClasses[2] = '-half';
                                } else {
                                    $starClasses[0] = '-fill';
                                    $starClasses[1] = '-fill';
                                    $starClasses[2] = '';
                                }
                            } elseif ($total >= 3 && $total <= 3.9) {
                                if ($total > 3 && $total <= 3.9) {
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
                            } elseif ($total >= 4 && $total <= 4.9) {
                                if ($total > 4 && $total <= 4.9) {
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
                            } elseif ($total >= 5) {
                                $starClasses = ['-fill', '-fill', '-fill', '-fill', '-fill'];
                            }
                            ?>
                            <i class="bi bi-star<?= $starClasses[0] ?> bintang-satu"></i>
                            <i class="bi bi-star<?= $starClasses[1] ?> bintang-dua"></i>
                            <i class="bi bi-star<?= $starClasses[2] ?> bintang-tiga"></i>
                            <i class="bi bi-star<?= $starClasses[3] ?> bintang-empat"></i>
                            <i class="bi bi-star<?= $starClasses[4] ?> bintang-lima"></i>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <!-- jika tidak ada peserta yang tampil -->
                <h1 class="keterangan-tampil">TIDAK ADA PESERTA YANG SEDANG TAMPIL</h1>
                <h1 class="keterangan-tampil-2">MOHON MENUNGGU INFORMASI DARI PANITIA</h1>
            <?php endif; ?>
        </div>
    </div>
    <!-- akhir content -->

    <!-- beri nilai -->
    <div class="overlay animate__animated animate__fadeIn" style="display: none">
        <div class="nilai detail animate__animated animate__pulse">
            <i class="close bi bi-x-circle" onclick="tutup('nilai')"></i>
            <h2>Berikan Ulasan</h2>
            <div class="bintang">
                <i class="bi bi-star-fill satu" onclick="bintang(1)"></i>
                <i class="bi bi-star-fill dua" onclick="bintang(2)"></i>
                <i class="bi bi-star-fill tiga" onclick="bintang(3)"></i>
                <i class="bi bi-star-fill empat" onclick="bintang(4)"></i>
                <i class="bi bi-star-fill lima" onclick="bintang(5)"></i>
            </div>
            <div class="komentar">
                <textarea class="form-control" name="" id="komentarInput" placeholder="Berikan Komentar"></textarea>
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-success btn-kirim" onclick="kirimUlasan()">Berikan Ulasan</button>
            </div>
        </div>
    </div>
    <!-- akhir beri nilai -->

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
            window.location = `functions/index.php?id-peserta=${idPeserta}&nama-user=${namaUser}&bintang=${bintangDiklik}&komentar=${komentar.value}`;
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
        function buka(type, id, nama) {
            idPeserta = id;
            namaUser = nama;
            if (type == "nilai") { overlay.style.display = "flex"; }
        }
        function tutup(type) {
            if (type == "nilai") {
                overlay.style.display = "none";
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

            // Update kelas-kelas bintang sesuai dengan kalkulasi di atas
            var starElements = document.querySelectorAll('.live-skor .bintang i');
            for (var i = 0; i < starClasses.length; i++) {
                starElements[i].className = 'bi bi-star' + starClasses[i] + ' ' + (i + 1);
            }
        }

        function updateLiveScore() {
            fetch('get-live-score.php').then(response => response.json())
                .then(data => {
                    document.querySelector('.live-skor .skor span').textContent = 'Skor = ' + data.score;
                    updateStarRating(data.score);
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }

        setInterval(updateLiveScore, 5000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>