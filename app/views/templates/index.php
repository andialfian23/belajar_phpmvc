<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="<?= BASEURL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/badge.css">
    <script src="<?= BASEURL ?>js/vendor.min.js" type="text/javascript"></script>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL ?>">PHPMVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>Mahasiswa">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL ?>About">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php require $main; ?>


    <script src="<?= BASEURL ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASEURL ?>js/script.js"></script>

</body>

</html>