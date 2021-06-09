<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<div class="container">
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Rents</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rents</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-small text-muted mb-0">Showing <?= count($products); ?> results</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($products as $product) : ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <div class="mb-3 position-relative">
                                        <div class="badge text-white badge-"></div><a class="d-block" href="/rents/detail/<?= $product['id']; ?>"><img class="img-fluid w-100" src="/assets/img/products/<?= $product['image']; ?>" alt="<?= $product['name']; ?>"></a>
                                        <div class="product-overlay">
                                            <ul class="mb-0 list-inline">
                                                <form action="/rents/addCart" method="post">
                                                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                                    <button class="btn btn-dark btn-sm" type="submit">Add to cart</button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6><a class="reset-anchor" href="#"><?= $product['name']; ?></a></h6>
                                    <p class="small text-muted"><?= number_to_currency($product['price'], 'IDR'); ?> / day</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- PAGINATION-->
                    <?= $pager->links('products', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>