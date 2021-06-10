<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<section class="hero text-white pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(/assets/img/hero-background.jpg); height: 75vh;">
    <div class="container-fluid py-5">
        <div class="row px-4 px-lg-5">
            <div class="col-lg-6">
                <p class="small text-uppercase mb-2">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="/rents">Browse collections</a>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES-->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                    <div class="media align-items-end">
                        <svg class="svg-icon svg-icon-big svg-icon-light">
                            <use xlink:href="#delivery-time-1"> </use>
                        </svg>
                        <div class="media-body text-left ml-3">
                            <h6 class="text-uppercase mb-1">Free shipping</h6>
                            <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="d-inline-block">
                    <div class="media align-items-end">
                        <svg class="svg-icon svg-icon-big svg-icon-light">
                            <use xlink:href="#helpline-24h-1"> </use>
                        </svg>
                        <div class="media-body text-left ml-3">
                            <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                            <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-inline-block">
                    <div class="media align-items-end">
                        <svg class="svg-icon svg-icon-big svg-icon-light">
                            <use xlink:href="#label-tag-1"> </use>
                        </svg>
                        <div class="media-body text-left ml-3">
                            <h6 class="text-uppercase mb-1">Festival offer</h6>
                            <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
        </header>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                            <a class="d-block" href="/rents/detail/<?= $product['id']; ?>"><img class="img-fluid w-100" src="/assets/img/products/<?= $product['image']; ?>" alt="<?= $product['name']; ?>"></a>
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
    </div>
</section>

<?= $this->endSection(); ?>