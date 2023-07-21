<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Sans-serif';
            src: url('../public/assets/font/Montserrat.ttf');
        }

        @font-face {
            font-family: 'Serif';
            src: url('../public/assets/font/Noto.ttf');
        }

        body {
            font-family: 'Sans-serif', Fallback, sans-serif;
            background-image: url('../public/assets/img/bg.avif');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
        }

        h1 {
            font-family: 'Serif', Fallback, serif;
        }

        p {
            font-size: 0.8em;
        }
    </style>
</head>

<body>
    <div class="container shadow">
        <p class="fs-5 text-end pe-3 pt-3 mb-5"><?= $tanggal ?></p>
        <img src="../public/assets/img/logoSMKnew.png" alt="Logo SMK" class="d-block mx-auto mb-3">
        <div class="text-center mb-5">
            <p class="fs-1 fw-light mb-1">Selamat Datang di</p>
            <h1>SMK MITRA KARYA MANDIRI KETANGGUNGAN</h1>
        </div>
        <div class="text-center pt-5 mb-5">
            <h4 class="fw-light">Silahkan mengisi buku tamu terlebih dahulu.</h4>
        </div>
        <div class="row justify-content-center pb-5">
            <div class="col-12 col-md-6">
                <?php if (!empty(session()->getFlashdata('sukses'))) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5><?= session()->getFlashdata('sukses'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?php if (!empty(session()->getFlashdata('gagal'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5><?= session()->getFlashdata('gagal'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <form action=<?= base_url('/') ?> method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label fs-5">Nama Anda</label>
                        <input type="text" class="form-control form-control-lg" id="nama" name="nama" required autofocus autocomplete="off" placeholder="Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label fs-5">No HP</label>
                        <input type="number" class="form-control form-control-lg" id="no_hp" name="no_hp" required autofocus autocomplete="off" placeholder="081234567890">
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label fs-5">Keperluan</label>
                        <input type="text" class="form-control form-control-lg" id="keperluan" name="keperluan" required placeholder="Keperluan Anda">
                    </div>
                    <div class="mb-3">
                        <label for="dengan" class="form-label fs-5">Dengan siapa</label>
                        <select class="form-select form-select-lg mb-3" id="dengan" name="dengan" required>
                            <optgroup label="Kepala Sekolah">
                                <option selected value="MOHAMAD TAUFIK, S.Pd">MOHAMAD TAUFIK, S.Pd
                                </option>
                            </optgroup>
                            <optgroup label="Waka">
                                <option value="SITI LESTARI, S.Pd">SITI LESTARI, S.Pd</option>
                                <option value="FIKA NURROZIQOH, S.Pd">FIKA NURROZIQOH, S.Pd</option>
                                <option value="HENDRY FIRMANSYAH, S.Pd">HENDRY FIRMANSYAH, S.Pd</option>
                                <option value="NURJANAH, S.Pd">NURJANAH, S.Pd </option>
                            </optgroup>
                            <optgroup label="Guru">
                                <option value="IIP FITROHPIYAH, S.Kep.Ns">IIP FITROHPIYAH, S.Kep.Ns</option>
                                <option value="FAFUR SAHMUHSI, Amd.AK">FAFUR SAHMUHSI, Amd.AK</option>
                                <option value="DYAH RETNO INDRIASTUTI, S.Farm">DYAH RETNO INDRIASTUTI, S.Farm</option>
                                <option value="AFINA SAFITRI">AFINA SAFITRI</option>
                                <option value="IDA ROUDOTUN NISA, S.PdI">IDA ROUDOTUN NISA, S.PdI</option>
                                <option value="AULIA ULFA, S.Pd">AULIA ULFA, S.Pd</option>
                                <option value="MAFRUHIN ARDIAN N, S.Pd">MAFRUHIN ARDIAN N, S.Pd</option>
                                <option value="DASTRA, SE">DASTRA, SE</option>
                                <option value="AAH WARNIAH EFFENDI, S.PdI">AAH WARNIAH EFFENDI, S.PdI</option>
                            </optgroup>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary d-block ms-auto">Submit</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6">
                <p class="text-center border-top pt-3">Created with ❤️ by <a href="https://www.madep.id/" class="text-decoration-none">madep.id</a></p>
            </div>
        </div>
    </div>

    <script src="../public/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>