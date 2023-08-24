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
            <a class="navbar-brand" href="#">
                <img src="../img/1692899163617.png" alt="">
                <span class="">B-KLAS GOT TALENTS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php"><i
                                class="me-1 bi bi-camera-reels-fill"></i> Penampilan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah-peserta.php"><i class="me-1 bi bi-patch-plus"></i> Tambah
                            Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="daftar-peserta.php"><i class="me-1 bi bi-card-list"></i> Daftar
                            Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lihat-skor.php"><i class="me-1 bi bi-table"></i> Lihat Skor</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- content -->
    <div class="container kotak">
        <div class="daftar-peserta">
            <div class="header mt-2">
                <div class="item"></div>
                <div class="item">
                    <h1 class="">Daftar Peserta</h1>
                </div>
                <div class="item input">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Cari peserta" name="keyword" id="keyword" class="item form-control">
                </div>
            </div>
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
                        onclick="buka('<?= $id ?>','<?= $foto ?>', `<?= $nama ?>`, '<?= $dawis ?>', '<?= $penampilan ?>')">
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
    <!-- akhir content -->

    <!-- detail peserta -->
    <div class="overlay animate__animated animate__fadeIn" style="display: none">
        <div class="detail animate__animated animate__pulse">
            <i class="bi bi-x-circle" onclick="tutup('overlay')"></i>
            <i class="sampah bi bi-trash" onclick="hapus()"></i>
            <i class="edit bi bi-pencil-square" onclick="edit()"></i>
            <img class="fotoOverlay" src="" alt="">
            <h1 class="namaOverlay"></h1>
            <h3 class="dawisOverlay">Dawis</h3>
            <h2 class="penampilanOverlay">Judul Penampilan</h2>
        </div>
    </div>
    <!-- akhir detail peserta -->

    <!-- edit peserta -->
    <div class="editPeserta animate__animated animate__fadeIn">
        <div class="wrap animate__animated animate__pulse">
            <h2>Edit Peserta</h2>
            <i class="bi bi-x-circle" onclick="tutup('edit')"></i>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="editId">
                <div class="mt-3">
                    <label class="form-label" for="editNama">Nama: </label>
                    <input class="form-control" type="text" name="nama" id="editNama">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="editDawis">Dawis: </label>
                    <input class="form-control" type="number" name="dawis" id="editDawis">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="editPenampilan">Penampilan: </label>
                    <input class="form-control" type="text" name="penampilan" id="editPenampilan">
                </div>
                <div class="mt-3 foto">
                    <label class="form-label" for="editFoto">Foto: </label>
                    <img class="mb-3" id="fotoLama" src="" alt="">
                    <input class="form-control" type="file" name="foto" id="editFoto">
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary" type="submit" name="edit">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let id = "";
        let foto = "";
        let nama = "";
        let dawis = "";
        let penampilan = "";

        const overlay = document.querySelector('.overlay');
        let fotoSelect = document.querySelector('.fotoOverlay');
        let namaSelect = document.querySelector('.namaOverlay');
        let penampilanSelect = document.querySelector('.penampilanOverlay');
        let dawisSelect = document.querySelector('.dawisOverlay');
        let editPeserta = document.querySelector('.editPeserta');

        function buka(idUser, fotoUser, namaUser, dawisUser, penampilanUser) {
            id = idUser;
            foto = fotoUser;
            nama = namaUser;
            dawis = dawisUser;
            penampilan = penampilanUser;

            fotoSelect.src = "../gambar-upload/" + foto;
            namaSelect.innerHTML = nama;
            penampilanSelect.innerHTML = `"${penampilan}"`;
            dawisSelect.innerHTML = "Dawis " + dawis;

            overlay.style.display = "flex";

        }

        function tutup(type) {
            if (type == "overlay") {
                overlay.style.display = "none";
            } else {
                overlay.style.display = "flex";
                editPeserta.style.display = "none";
            }
        }

        function hapus() {
            window.location.href = "../functions/index.php?nama-hapus=" + nama;
        }

        function edit() {
            overlay.style.display = "none";

            let editId = document.getElementById('editId');
            let editNama = document.getElementById('editNama');
            let editDawis = document.getElementById('editDawis');
            let editPenampilan = document.getElementById('editPenampilan');
            let fotoLama = document.getElementById('fotoLama');

            editId.value = id;
            editNama.value = nama;
            editDawis.value = dawis;
            editPenampilan.value = penampilan;
            fotoLama.src = "../gambar-upload/" + foto;
            editPeserta.style.display = "flex";

        }

        let keyword = document.getElementById('keyword');
        let scroll = document.querySelector('.scroll');
        keyword.addEventListener('keyup', () => {

            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    scroll.innerHTML = xhr.responseText;
                }
            }

            xhr.open("GET", `live-search.php?keyword=${keyword.value}`, true);
            xhr.send();
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>