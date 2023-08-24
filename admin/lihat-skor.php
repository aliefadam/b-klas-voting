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
    <link rel="stylesheet" href="../css/admin-lihat-skor.css">

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
            <a class="navbar-brand" href="#">
                <img src="../img/1692899163617.png" alt="">
                <span class="">B-KLAS GOT TALENTS</span>
            </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
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
                        <a class="nav-link" href="daftar-peserta.php"><i class="me-1 bi bi-card-list"></i> Daftar
                            Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lihat-skor.php"><i class="me-1 bi bi-table"></i> Lihat Skor</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- content -->
    <div class="container kotak">
        <div class="data">
            <h1>Hasil Penilaian Peserta</h1>
            <div class="scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Total Skor</th>
                            <th>Rata - rata</th>
                            <th>Jumlah Orang Vote</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach (dataPenilaianPeserta() as $peserta): ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $peserta['nama_peserta'] ?>
                                </td>
                                <td>
                                    <?= $peserta['total_skor'] ?>
                                </td>
                                <td>
                                    <?= $peserta['rata_rata_skor'] ?>
                                </td>
                                <td>
                                    <?= $peserta['jumlah_vote'] ?> Orang
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- akhir content -->
</body>

</html>