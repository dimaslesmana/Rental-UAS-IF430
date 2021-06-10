<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Order</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container my-5">
    <?php if (!empty($rent_list)) : ?>
        <?php foreach ($rent_list as $rent) : ?>
            <div class="row mb-4">
                <div class="col card p-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row mb-4">
                                    <div class="col-4">
                                        <p class="text-muted font-weight-bold card-text">#<?= $rent['order_id']; ?></p>
                                        <h5 class="text-black card-title">Rent Duration: <small class="text-primary"><?= $rent['duration_in_days']; ?><?= $rent['duration_in_days'] > 1 ? ' days' : ' day'; ?></small></h5>
                                    </div>
                                    <div class="col-4">
                                        <ul class="list-group list-group-flush">
                                            <?php $price = explode(',', $rent['product_price']);
                                            foreach (explode(',', $rent['product_name']) as $i => $product) : ?>
                                                <li class="list-group-item"><?= $product; ?> <span class="badge badge-primary badge-pill"><?= number_to_currency($price[$i], 'IDR'); ?> / day</span></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="col-4 text-right">
                                        <p class="card-text">Total Price</p>
                                        <h5 class="card-text"><?= number_to_currency($rent['total_price'], 'IDR'); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text"><small class="text-muted"><?= date_format(date_create($rent['created_at']), "F d, Y - H:i:s"); ?></small></p>
                            </div>
                            <div class="col-6 text-right">
                                <?php switch ($rent['status']):
                                    case 'sedang_dikirim': ?>
                                        <button class="btn btn-primary" disabled>Sedang Dikirim</button>
                                        <?php break; ?>
                                    <?php
                                    case 'sudah_dikirim': ?>
                                        <button class="btn btn-info" disabled>Sudah Dikirim</button>
                                        <form action="/order/changestatus" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="order_id" value="<?= $rent['order_id']; ?>">
                                            <input type="hidden" name="order_status" value="siap_di_pickup">
                                            <button class="btn btn-primary" type="submit">Siap di Pick-up</button>
                                        </form>
                                        <?php break; ?>
                                    <?php
                                    case 'siap_di_pickup': ?>
                                        <button class="btn btn-primary" disabled>Sudah di Pick-up</button>
                                        <?php break; ?>
                                    <?php
                                    case 'selesai': ?>
                                        <button class="btn btn-success" disabled>Selesai</button>
                                        <?php break; ?>
                                <?php endswitch; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="row mb-4">
            <div class="col card p-2">
                <div class="card-body text-center">
                    <h4>You don't have any order</h4>
                    <a href="/rents" target="_blank">View Product List</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


<?= $this->endSection(); ?>