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
            <h1>TIDAK ADA PESERTA YANG SEDANG TAMPIL</h1>
            <button type="button" class="btn tampilkan" onclick="buka('overlay')">Tampilkan Peserta</button>
        </div>
    </div>
    <!-- akhir content -->

    <div class="overlay overlay animate__animated animate__fadeIn" style="display: none">
        <div class="pilihan detail animate__animated animate__pulse" style="display: none">
            <i class=" bi bi-x-circle" onclick="tutup('pilihan')"></i>
            <h2>Pilih metode untuk menampilkan</h2>
            <div class=" aksi mt-3">
                <button type="button" class="btn btn-success acak" onclick="buka('acak')">Pilih Acak</button>
                <button type="button" class="btn btn-primary langsung" onclick="buka('langsung')">Pilih
                    Langsung</button>
            </div>
        </div>
        <div class="daftar-peserta" style="display: none">
            <i class=" bi bi-x-circle" onclick="tutup('langsung')"></i>
            <h1 class="text-white">Silahkan pilih peserta untuk ditampilkan</h1>
            <div class="scroll">
                <?php foreach (daftarPeserta() as $peserta): ?>
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
    </div>

    <script>

        let overlay = document.querySelector('.overlay');
        let pilihan = document.querySelector('.pilihan')
        let daftarPeserta = document.querySelector('.daftar-peserta');

        function buka(type) {
            if (type == 'overlay') {
                overlay.style.display = "flex";
                pilihan.style.display = "block";
            } else if (type == 'langsung') {
                pilihan.style.display = "none";
                daftarPeserta.style.display = "flex";
            }
        }

        function tutup(type) {
            if (type == "pilihan") {
                overlay.style.display = "none";
            } else if (type == "langsung") {
                daftarPeserta.style.display = "none";
                pilihan.style.display = "block";
            }
        }

        function tampilkan(id) {
            window.location = `../functions/index.php?id=${id}`;
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>