<!doctype html>
<?php include('../functions/index.php') ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B-KLAS GOT TALENTS | DAFTAR PESERTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../css/admin-daftar-peserta.css">

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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah-peserta.php">Tambah Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="daftar-peserta.php">Daftar Peserta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- content -->
    <div class="container kotak">
        <div class="daftar-peserta">
            <h1>Daftar Peserta</h1>
            <div class="scroll">
                <?php foreach (daftarPeserta() as $peserta): ?>
                    <?php
                    $foto = $peserta['foto'];
                    $nama = $peserta['nama'];
                    $dawis = $peserta['dawis'];
                    $penampilan = $peserta['penampilan'];
                    ?>
                    <div class="box" onclick="buka('<?= $foto ?>', '<?= $nama ?>', '<?= $dawis ?>', '<?= $penampilan ?>')">
                        <div class="gambar">
                            <img src="../gambar-upload/<?= $peserta['foto'] ?>" alt="">
                        </div>
                        <div class="deskripsi">
                            <h3>
                                <?= $peserta['nama'] ?>
                            </h3>
                            <p>Dawis
                                <?= $peserta['dawis'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- akhir content -->

    <!-- detail peserta -->
    <div class="overlay" style="display: none">
        <div class="detail">
            <img class="fotoOverlay" src="" alt="">
            <h1 class="namaOverlay"></h1>
            <h2 class="penampilanOverlay">Judul Penampilan</h2>
            <h3 class="dawisOverlay">Dawis</h3>
        </div>
    </div>
    <!-- akhir detail peserta -->

    <script>
        let foto = "";
        let nama = "";
        let dawis = "";
        let penampilan = "";

        const overlay = document.querySelector('.overlay');
        let fotoSelect = document.querySelector('.fotoOverlay');
        let namaSelect = document.querySelector('.namaOverlay');
        let penampilanSelect = document.querySelector('.penampilanOverlay');
        let dawisSelect = document.querySelector('.dawisOverlay');

        function buka(fotoUser, namaUser, dawisUser, penampilanUser) {
            foto = fotoUser;
            nama = namaUser;
            dawis = dawisUser;
            penampilan = penampilanUser;
            overlay.style.display = "flex";

            fotoSelect.src = "../gambar-upload/" + foto;
            namaSelect.innerHTML = nama;

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>