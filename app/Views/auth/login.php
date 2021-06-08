<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<div class="container my-5">
    <h1 class="mb-3">Login</h1>

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