<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/dataTables.bootstrap5.min.css">
    <style>
        @font-face {
            font-family: 'Sans-serif';
            src: url('../public/assets/font/Montserrat.ttf');
        }

        body {
            font-family: 'Sans-serif', Fallback, sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href=<?= base_url('/') ?>>Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container vh-100">
        <div class="text-center py-5">
            <h1>Rekap Data Buku Tamu</h1>
        </div>
        <a href=<?= base_url('/export') ?> class="btn btn-success mb-3">Export XLS</a>
        <table class="table table-bordered table-striped table-hover" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Keperluan</th>
                    <th>Dengan Siapa</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                <?php
                foreach ($data as $row) {
                ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->no_hp; ?></td>
                        <td><?= $row->keperluan; ?></td>
                        <td><?= $row->dengan; ?></td>
                        <td><?= $row->tanggal; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../public/assets/js/jquery.js"></script>
    <script src="../public/assets/js/jquery.dataTables.min.js"></script>
    <script src="../public/assets/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>