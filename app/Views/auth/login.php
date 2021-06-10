<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Login</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container my-5">
    <?php if (session()->getFlashdata('alert_error')) : ?>
        <div class="alert alert-danger text-center">
            <?= session()->getFlashdata('alert_error'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('alert_success')) : ?>
        <div class="alert alert-success text-center">
            <?= session()->getFlashdata('alert_success'); ?>
        </div>
    <?php endif; ?>

    <form action="/auth/login" method="post">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="form-group col">
                <label for="email">Email Address</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('email')) ? ' is-invalid' : ''; ?>" id="email" type="email" name="email" placeholder="Email" required autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="password">Password</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('password')) ? ' is-invalid' : ''; ?>" id="password" type="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <div class="g-recaptcha" data-sitekey="<?= getenv('RECAPTCHA_SITE_KEY'); ?>"></div>
            </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Login</button>
    </form>
    <hr>
    <div class="text-center">
        <p class="mb-1">
            Doesn't have an account? <a href="/auth/register">Register</a>
        </p>
        <a href="/">
            <i class="fas fa-long-arrow-alt-left"></i>
            Back
        </a>
    </div>
</div>

<?= $this->endSection(); ?>