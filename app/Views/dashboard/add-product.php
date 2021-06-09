<?= $this->extend('layouts/dashboard/template'); ?>

<?= $this->section('dashboard-content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Add Product</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Add New Console</h3>
                </div>
                <form action="/dashboard/products/add/save" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="console_name">Console Name</label>
                                    <input type="text" class="form-control<?= ($validation->hasError('console_name')) ? ' is-invalid' : ''; ?>" id="console_name" name="console_name" placeholder="Console name" required autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('console_name'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="rent_price">Rent Price <small class="font-italic">(per day)</small></label>
                                    <input type="text" class="form-control<?= ($validation->hasError('rent_price')) ? ' is-invalid' : ''; ?>" id="rent_price" name="rent_price" placeholder="Rent price" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('rent_price'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="console_quantity">Quantity</label>
                                    <input type="text" class="form-control<?= ($validation->hasError('console_quantity')) ? ' is-invalid' : ''; ?>" id="console_quantity" name="console_quantity" placeholder="Quantity" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('console_quantity'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="console_description">Description</label>
                                    <textarea class="form-control<?= ($validation->hasError('console_description')) ? ' is-invalid' : ''; ?>" rows="5" id="console_description" name="console_description" placeholder="Description" required></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('console_description'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <img src="/assets/img/products/placeholder.png" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="console_image">Console Image</label>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="console_image">Choose image</label>
                                        <input type="file" class="custom-file-input<?= ($validation->hasError('console_image')) ? ' is-invalid' : ''; ?>" id="console_image" name="console_image" accept=".jpg,.jpeg,.png">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('console_image'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>