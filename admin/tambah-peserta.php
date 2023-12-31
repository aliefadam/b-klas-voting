<!doctype html>
<html lang="en">
<?php include('../functions/index.php') ?>

<head>
    <link rel="icon" href="../img/1692899163617.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B-KLAS GOT TALENTS | TAMBAH PESERTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../css/admin-tambah-peserta.css">

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
                        <a class="nav-link active" href="tambah-peserta.php"><i class="me-1 bi bi-patch-plus"></i>
                            Tambah
                            Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftar-peserta.php"><i class="me-1 bi bi-card-list"></i> Daftar
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

    <?php if (isset($_SESSION['notifikasi'])): ?>
        <?php $pesan = $_SESSION['notifikasi']; ?>
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: "<?= $pesan ?>",
                icon: 'success',
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Baik',
            });
        </script>
        <?php $_SESSION['notifikasi'] = []; ?>
    <?php endif; ?>

    <!-- content -->
    <div class="container kotak">
        <div class="form">
            <h1>Tambah Peserta</h1>
            <form action="../functions/index.php" method="post" enctype="multipart/form-data">
                <div class="mt-2">
                    <label for="nama" class="form-label">Nama Peserta</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div class="mt-2">
                    <label for="dawis" class="form-label">Dasa Wisma</label>
                    <input type="number" name="dawis" id="dawis" class="form-control" required>
                </div>
                <div class="mt-2">
                    <label for="penampilan" class="form-label">Judul Penampilan</label>
                    <input type="text" name="penampilan" id="penampilan" class="form-control" required>
                </div>
                <div class="mt-2">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="mt-4">
                    <button class="btn btn-tambah" type="submit" name="tambah-peserta">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <!-- akhir content -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>