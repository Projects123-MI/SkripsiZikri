<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('adminLTE/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>Registrasi Akun </a>
        </div>

        <!-- Begin page content -->
        <main class="flex-shrink-0">
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <hr />
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url(); ?>/register/process">
                        <?= csrf_field(); ?>
                        <div class="input-group mb-3">
                            <!-- <label for="username" class="form-label">Username</label> -->
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <!-- <label for="password" class="form-label">Password</label> -->
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <!-- <label for="password_conf" class="form-label">Confirm Password</label> -->
                            <input type="password" class="form-control" id="password_conf" name="password_conf" placeholder="Konfirmasi Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <!-- <label for="name" class="form-label">Name</label> -->
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <!-- <label for="name" class="form-label">Name</label> -->
                            <input type="text" class="form-control" id="name" name="name" value="Guru" placeholder="Leveer Akses Guru" readonly>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                    <br>
                    <div class="col-12">
                        <a href="/login"><button type="submit" class="btn btn-success btn-block">Login</button></a>
                    </div>
                    <hr />

                </div>
            </div>
        </main>
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('adminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('adminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>