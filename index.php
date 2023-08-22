<!doctype html>
<?php include('functions/index.php') ?>
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
                        <button type="button" class="btn btn-primary nilai" onclick="beriNilai()"><i
                                class="bi bi-star-fill"></i> Beri Nilai</button>
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
                <?php endif; ?>
            <?php else: ?>
                <!-- jika tidak ada peserta yang tampil -->
                <h1 class="keterangan-tampil">TIDAK ADA PESERTA YANG SEDANG TAMPIL</h1>
                <h1>MOHON MENUNGGU INFORMASI DARI PANITIA</h1>
            <?php endif; ?>
        </div>
    </div>
    <!-- akhir content -->

    <!-- beri nilai -->
    <div class="overlay">
        <div class="nilai">
            <div class="bintang">
                <i class="bi bi-star-fill satu" onclick="bintang(1)"></i>
                <i class="bi bi-star-fill dua" onclick="bintang(2)"></i>
                <i class="bi bi-star-fill tiga" onclick="bintang(3)"></i>
                <i class="bi bi-star-fill empat" onclick="bintang(4)"></i>
                <i class="bi bi-star-fill lima" onclick="bintang(5)"></i>
            </div>
            <div class="komentar">
                <textarea class="form-control" name="" id="" placeholder="Berikan Komentar"></textarea>
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-success btn-kirim">Berikan Ulasan</button>
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

        bintangDuaTutup = false;


        function bintang(jumlah) {
            bintangDiklik = jumlah;

            if (jumlah == 1) {
                bintangSatu.style.transition = "300ms";
                bintangSatu.style.transform = "scale(1.2)";
                bintangDua.style.transform = "scale(1)";
                bintangTiga.style.transform = "scale(1)";
                bintangEmpat.style.transform = "scale(1)";
                bintangLima.style.transform = "scale(1)";

                bintangSatu.style.color = "yellow";
                bintangDua.style.color = "";
                bintangTiga.style.color = "";
                bintangEmpat.style.color = "";
                bintangLima.style.color = "";
            } else if (jumlah == 2) {
                bintangDua.style.transition = "300ms";
                bintangSatu.style.transform = "scale(1.2)";
                bintangDua.style.transform = "scale(1.2)";
                bintangTiga.style.transform = "scale(1)";
                bintangEmpat.style.transform = "scale(1)";
                bintangLima.style.transform = "scale(1)";

                bintangSatu.style.color = "yellow";
                bintangDua.style.color = "yellow";
                bintangTiga.style.color = "";
                bintangEmpat.style.color = "";
                bintangLima.style.color = "";
            } else if (jumlah == 3) {
                bintangTiga.style.transition = "300ms";
                bintangSatu.style.transform = "scale(1.2)";
                bintangDua.style.transform = "scale(1.2)";
                bintangTiga.style.transform = "scale(1.2)";
                bintangEmpat.style.transform = "scale(1)";
                bintangLima.style.transform = "scale(1)";

                bintangSatu.style.color = "yellow";
                bintangDua.style.color = "yellow";
                bintangTiga.style.color = "yellow";
                bintangEmpat.style.color = "";
                bintangLima.style.color = "";
            } else if (jumlah == 4) {
                bintangEmpat.style.transition = "300ms";
                bintangSatu.style.transform = "scale(1.2)";
                bintangDua.style.transform = "scale(1.2)";
                bintangTiga.style.transform = "scale(1.2)";
                bintangEmpat.style.transform = "scale(1.2)";
                bintangLima.style.transform = "scale(1)";

                bintangSatu.style.color = "yellow";
                bintangDua.style.color = "yellow";
                bintangTiga.style.color = "yellow";
                bintangEmpat.style.color = "yellow";
                bintangLima.style.color = "";
            } else if (jumlah == 5) {
                bintangLima.style.transition = "300ms";
                bintangSatu.style.transform = "scale(1.2)";
                bintangDua.style.transform = "scale(1.2)";
                bintangTiga.style.transform = "scale(1.2)";
                bintangEmpat.style.transform = "scale(1.2)";
                bintangLima.style.transform = "scale(1.2)";

                bintangSatu.style.color = "yellow";
                bintangDua.style.color = "yellow";
                bintangTiga.style.color = "yellow";
                bintangEmpat.style.color = "yellow";
                bintangLima.style.color = "yellow";
            }
        }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>