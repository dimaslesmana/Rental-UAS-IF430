<?= $this->extend('layouts/dashboard/template'); ?>

<?= $this->section('dashboard-content'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card card-primary shadow-sm">
                        <div class="card-header border-0">
                            <h3 class="card-title">Order List</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="order-list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>4583761235</td>
                                        <td>uJaJxmalwkHN</td>
                                        <th>Sedang Dikirim</th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card card-primary shadow-sm">
                        <div class="card-header border-0">
                            <h3 class="card-title">Details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">0</span>
                                    <span class="text-muted">TOTAL ORDER</span>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-cash"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold"><?= number_to_currency(0, 'IDR'); ?></span>
                                    <span class="text-muted">TOTAL INCOME</span>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold"><?= $user_count; ?></span>
                                    <span class="text-muted">REGISTERED USER</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>