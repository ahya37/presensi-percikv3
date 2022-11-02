<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Persensi Karyawan</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/bsb/images/calendar.png') ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/bsb/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/bsb/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/bsb/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/bsb/css/style.css') ?>" rel="stylesheet">
</head>
<style>
    .card {
        margin: 10px;
    }

    .alert-success {
        margin: 10px;
    }

    .alert-danger {
        margin: 10px;
    }
</style>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Absensi<b></b></a>
            <small>Aplikasi Absensi Karyawan</small><br>
            <div style="font-size: 18px;text-align:center; font-weight: bold;"><img src="<?= base_url('assets/bsb/images/calendar.png') ?>" width="50" height="50" /></div>
        </div>
        <div class="card">
            <div class="body">
                <!-- <?= $this->session->flashdata('message') ?> -->
                <form action="<?= base_url('auth') ?>" method="POST">
                    <div class="msg">Silahkan login</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Username" value="<?= set_value('email') ?>" required autofocus>
                        </div>
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div> -->
                        <div class="col-xs-12">
                            <button id="login" name="login" value="sign" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                        </div>
                        <div class="col-xs-6 align-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->session->flashdata('message') ?>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/bsb/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/bsb/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/bsb/plugins/node-waves/waves.js') ?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url('assets/bsb/plugins/jquery-validation/jquery.validate.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/bsb/js/admin.js') ?>"></script>
    <script src="<?= base_url('assets/bsb/js/pages/examples/sign-in.js') ?>"></script>
</body>

</html>