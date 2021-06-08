<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<div class="container my-5">
    <h1 class="mb-3">Register</h1>

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

    <form action="/auth/register" method="post">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="full_name">Full Name</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('full_name')) ? ' is-invalid' : ''; ?>" id="full_name" type="text" name="full_name" placeholder="Full name" required autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('full_name'); ?>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="email">Email Address</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('email')) ? ' is-invalid' : ''; ?>" id="email" type="email" name="email" placeholder="Email" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="password">Password</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('password')) ? ' is-invalid' : ''; ?>" id="password" type="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="confirm_password">Confirm Password</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('confirm_password')) ? ' is-invalid' : ''; ?>" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('confirm_password'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="address">Address</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('address')) ? ' is-invalid' : ''; ?>" id="address" type="text" name="address" placeholder="Address" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('address'); ?>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="phone_number">Phone Number</label>
                <input class="form-control form-control-lg<?= ($validation->hasError('phone_number')) ? ' is-invalid' : ''; ?>" id="phone_number" type="text" name="phone_number" placeholder="Phone number" data-inputmask="'mask': '+62 999 9999 9999'" data-mask required>
                <div class="invalid-feedback">
                    <?= $validation->getError('phone_number'); ?>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit">Register</button>
    </form>
    <hr>
    <div class="text-center">
        <p class="mb-1">
            Already have an account? <a href="/auth/login">Login</a>
        </p>
        <a href="/">
            <i class="fas fa-long-arrow-alt-left"></i>
            Back
        </a>
    </div>
</div>

<?= $this->endSection(); ?>