<!doctype html>
<?php include('../functions/index.php') ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../css/admin-home.css">

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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
                    <li class="nav-item">
                        <a class="nav-link" href="tambah-peserta.php">Tambah Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftar-peserta.php">Daftar Peserta</a>
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
                        <button type="button" class="btn btn-danger btn-sm btn-berhenti" onclick="hentikan('<?= $id ?>')"><i
                                class="bi bi-stop-fill me-1"></i>Hentikan</button>
                    </div>
                    <h1 class="nama">
                        <?= $nama ?>
                    </h1>
                    <p class="dawis">Dawis
                        <?= $dawis ?>
                    </p>
                    <img class="foto shadow-lg" src="../gambar-upload/<?= $foto ?>" alt="">
                    <h1 class="judul-penampilan">"
                        <?= $penampilan ?> "
                    </h1>
                    <div class="live-skor">
                        <div class="skor">
                            <span>Skor =
                                <?= (getRataRataUlasan($id) == "" ? 0 : getRataRataUlasan($id)) ?>
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
                            <i class="bi bi-star<?= $starClasses[0] ?> satu"></i>
                            <i class="bi bi-star<?= $starClasses[1] ?> dua"></i>
                            <i class="bi bi-star<?= $starClasses[2] ?> tiga"></i>
                            <i class="bi bi-star<?= $starClasses[3] ?> empat"></i>
                            <i class="bi bi-star<?= $starClasses[4] ?> lima"></i>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <!-- jika tidak ada peserta yang tampil -->
                <h1>TIDAK ADA PESERTA YANG SEDANG TAMPIL</h1>
                <button type="button" class="btn tampilkan" onclick="buka('overlay')">Tampilkan Peserta</button>
            <?php endif; ?>
        </div>
    </div>
    <!-- akhir content -->

    <div class="overlay overlay animate__animated animate__fadeIn" style="display: none">
        <div class="pilihan detail animate__animated animate__pulse" style="display: none">
            <i class=" bi bi-x-circle" onclick="tutup('pilihan')"></i>
            <h2>Pilih metode untuk menampilkan</h2>
            <div class=" aksi mt-3">
                <button type="button" class="btn btn-success btn-acak" onclick="buka('acak')">Pilih Acak</button>
                <button type="button" class="btn btn-primary btn-langsung" onclick="buka('langsung')">Pilih
                    Langsung</button>
            </div>
        </div>
        <div class="daftar-peserta" style="display: none">
            <i class="close bi bi-x-circle" onclick="tutup('langsung')"></i>
            <div class="header mt-2">
                <div class="item"></div>
                <div class="item">
                    <h1 class="text-white">Pilih Peserta</h1>
                </div>
                <div class="item input">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Cari peserta" name="keyword" id="keyword" class="item form-control">
                </div>
            </div>
            <div class="scroll">
                <?php foreach (getPesertaBelumDitampilkan() as $peserta): ?>
                    <?php
                    $id = $peserta['id'];
                    $foto = $peserta['foto'];
                    $nama = $peserta['nama'];
                    $dawis = $peserta['dawis'];
                    $penampilan = $peserta['penampilan'];
                    ?>
                    <div class="box"
                        onclick="tampilkan('<?= $id ?>','<?= $foto ?>', `<?= $nama ?>`, '<?= $dawis ?>', '<?= $penampilan ?>')">
                        <div class="gambar">
                            <img src="../gambar-upload/<?= $peserta['foto'] ?>" alt="">
                        </div>
                        <div class="deskripsi">
                            <h3>
                                <?php $nama = $peserta['nama']; ?>
                                <?=
                                    $namaDepan = explode(' ', $nama)[0];
                                ?>
                            </h3>
                            <p>Dawis
                                <?= $peserta['dawis'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="acak" style="display: none"></div>
    </div>

    <script>

        let overlay = document.querySelector('.overlay');
        let pilihan = document.querySelector('.pilihan')
        let daftarPeserta = document.querySelector('.daftar-peserta');
        let acak = document.querySelector('.acak');

        function buka(type) {
            if (type == 'overlay') {
                overlay.style.display = "flex";
                pilihan.style.display = "block";
            } else if (type == 'langsung') {
                pilihan.style.display = "none";
                daftarPeserta.style.display = "flex";
            } else if (type == 'acak') {
                acak.style.display = "flex";
                pilihan.style.display = "none";

                // Tampilkan animasi loading
                acak.innerHTML = `<h1 class="pilih-acak">Memilih Acak</h1>
                                <div class="lds-roller">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>`;

                // Tunggu selama 2 detik sebelum mengambil peserta acak
                setTimeout(function () {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            acak.innerHTML = xhttp.responseText;
                        }
                    };

                    xhttp.open("GET", "peserta-acak.php", true);
                    xhttp.send();
                }, 3000);
            }

        }

        function tutup(type) {
            if (type == "pilihan") {
                overlay.style.display = "none";
            } else if (type == "langsung") {
                daftarPeserta.style.display = "none";
                pilihan.style.display = "block";
            } else if (type == "acak") {
                acak.style.display = "none";
                pilihan.style.display = "block";
            }
        }

        function tampilkan(id) {
            console.log(id);
            window.location = `../functions/index.php?id-tampilkan=${id}`;
        }

        function hentikan(id) {
            window.location = `../functions/index.php?id-hentikan=${id}`;
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
            fetch('../get-live-score.php').then(response => response.json())
                .then(data => {
                    document.querySelector('.live-skor .skor span').textContent = 'Skor = ' + data.score;
                    updateStarRating(data.score);
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }

        setInterval(updateLiveScore, 1000);


        let keyword = document.getElementById('keyword');
        let scroll = document.querySelector('.scroll');
        keyword.addEventListener('keyup', () => {

            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    scroll.innerHTML = xhr.responseText;
                }
            }

            xhr.open("GET", `live-search.php?keyword-tampilkan=${keyword.value}`, true);
            xhr.send();
        })

    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>