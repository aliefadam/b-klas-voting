<!DOCTYPE html>
<?php include('../functions/index.php') ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B-KLAS GOT TALENTS | PENAMPILAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="../css/admin-login.css">

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
    <div class="container kotak">
        <h1>B-KLAS GOT TALENTS</h1>
        <h3>CREATE ADMIN</h3>
        <form action="" method="POST">
            <div class="mt-4 item">
                <label for="username" class="form-label">Username</label>
                <?php 
                    echo '<input type="text" name="username" id="username" class="form-control" value="' . (isset($_POST["create-admin"])?$_POST["username"]:"") . '">'
                ?>
            </div>
            <div class="mt-4 item">
                <label for="password" class="form-label">Password</label>
                <?php 
                    echo '<input type="password" name="password" id="password" class="form-control" value="' . (isset($_POST["create-admin"])?$_POST["password"]:"") . '">'
                ?>
                
            </div>
            <div class="mt-4 item">
                <label for="verifyPassword" class="form-label">Verify Password</label>
                <?php 
                    echo '<input type="password" name="verifyPassword" id="verifyPassword" class="form-control" value="' . (isset($_POST["create-admin"])?$_POST["verifyPassword"]:"") . '">'
                ?>
            </div>
            <?php
                echo (isset($_POST["create-admin"])? '<p class="text-danger text-center">password tidak cocok</p>':"")
            ?>
            <div class="mt-4 item">
                <button class="btn btn-masuk btn-success" name="create-admin">Daftar</button>
            </div>
        </form>
    </div>
</body>

</html>