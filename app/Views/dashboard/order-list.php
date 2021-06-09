<?= $this->extend('layouts/dashboard/template'); ?>

<?= $this->section('dashboard-content'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">View Order List</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary shadow-sm">
                        <div class="card-header border-0">
                            <h3 class="card-title">List of Order</h3>
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
                                        <th>User Email</th>
                                        <th>Products</th>
                                        <th>Duration <small class="font-italic">(in days)</small></th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $i => $order) : ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>
                                            <td><?= $order['order_id']; ?></td>
                                            <td><?= $order['user_email']; ?></td>
                                            <td><?= $order['product_name']; ?></td>
                                            <td><?= $order['duration_in_days']; ?></td>
                                            <td><?= $order['total_price']; ?></td>
                                            <td>
                                                <?php switch ($order['status']):
                                                    case 'sedang_dikirim': ?>
                                                        <span>Sedang Dikirim</span>
                                                        <?php break; ?>
                                                    <?php
                                                    case 'sudah_dikirim': ?>
                                                        <span>Sudah Dikirim</span>
                                                        <?php break; ?>
                                                    <?php
                                                    case 'siap_di_pickup': ?>
                                                        <span>Siap di Pick-up</span>
                                                        <?php break; ?>
                                                    <?php
                                                    case 'selesai': ?>
                                                        <span>Selesai</span>
                                                        <?php break; ?>
                                                <?php endswitch; ?>
                                            </td>
                                            <td>
                                                <?php if ($order['status'] != 'selesai') : ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary">Change Status</button>
                                                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <form action="/order/changestatus" method="post" class="dropdown-item">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">
                                                                <input type="hidden" name="order_status" value="sudah_dikirim">
                                                                <button type="submit" class="btn btn-sm btn-info btn-block">Sudah Dikirim</button>
                                                            </form>
                                                            <form action="/order/changestatus" method="post" class="dropdown-item">
                                                                <?= csrf_field(); ?>
                                                                <input type="hidden" name="order_id" value="<?= $order['order_id']; ?>">
                                                                <input type="hidden" name="order_status" value="selesai">
                                                                <button type="submit" class="btn btn-sm btn-info btn-block">Selesai</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-success" disabled>Rent Done</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>User Email</th>
                                        <th>Products</th>
                                        <th>Duration <small class="font-italic">(in days)</small></th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>