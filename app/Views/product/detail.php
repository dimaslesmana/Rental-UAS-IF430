<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <div class="row m-sm-0">
                    <div class="col-sm-12 order-1 order-sm-2">
                        <div class="owl-carousel product-slider" data-slider-id="1">
                            <a class="d-block" href="/assets/img/products/<?= $product['image']; ?>" data-lightbox="product" title="<?= $product['name']; ?>">
                                <img class="img-fluid" src="/assets/img/products/<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h1><?= $product['name']; ?></h1>
                <p class="text-muted lead"><?= number_to_currency($product['price'], 'IDR'); ?> / day</p>
                <p class="text-small mb-4"><?= $product['description']; ?></p>
                <div class="row align-items-stretch mb-4">
                    <div class="col-sm-5 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                            <span class="small text-uppercase text-gray mr-4 no-select">Available</span>
                            <div class="quantity">
                                <p class="no-select" data-available-quantity="<?= $product['quantity']; ?>"><?= $product['quantity']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pl-sm-0">
                        <form action="/rents/addCart" method="post" class="">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                            <?php if ($product['quantity'] > 0) : ?>
                                <button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" type="submit">Add to cart</button>
                            <?php else : ?>
                                <button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" type="submit" disabled>Out of Stock</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <ul class="list-unstyled small d-inline-block">
                    <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted"><?= $product['id']; ?></span></li>
                </ul>
            </div>
        </div>
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="p-4 p-lg-5 bg-white">
                    <h6 class="text-uppercase">Product description </h6>
                    <p class="text-muted text-small mb-0"><?= $product['description']; ?></p>
                </div>
            </div>
        </div>
        <h2 class="h5 text-uppercase mb-4">You May Also Be Interested In</h2>
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product text-center skel-loader">
                        <div class="d-block mb-3 position-relative">
                            <a class="d-block" href="/rents/detail/<?= $product['id']; ?>" target="_blank">
                                <img class="img-fluid w-100" src="/assets/img/products/<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
                            </a>
                            <div class="product-overlay">
                                <ul class="mb-0 list-inline">
                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#">Add to cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <h6> <a class="reset-anchor" href="/rents/detail/<?= $product['id']; ?>" target="_blank"><?= $product['name']; ?></a></h6>
                        <p class="small text-muted"><?= number_to_currency($product['price'], 'IDR'); ?> / day</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>