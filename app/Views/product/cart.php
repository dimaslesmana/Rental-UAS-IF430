<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Cart</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <!-- CART TABLE-->
                <div class="table-responsive mb-4">

                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Status</strong></th>
                                <th class="border-0" scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($carts)) : ?>
                                <?php foreach ($carts as $cart) : ?>
                                    <tr>
                                        <th class="pl-0 border-0" scope="row">
                                            <div class="media align-items-center">
                                                <a class="reset-anchor d-block animsition-link" href="/rents/detail/<?= $cart['id']; ?>" target="_blank">
                                                    <img src="/assets/img/products/<?= $cart['image']; ?>" alt="<?= $cart['name']; ?>" width="70" />
                                                </a>
                                                <div class="media-body ml-3">
                                                    <strong class="h6"><a class="reset-anchor animsition-link" href="/rents/detail/<?= $cart['id']; ?>" target="_blank"><?= $cart['name']; ?></a></strong>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle border-0">
                                            <p class="mb-0 small" data-price="<?= $cart['price']; ?>"><?= number_to_currency($cart['price'], 'IDR'); ?> / day</p>
                                        </td>
                                        <td class="align-middle border-0">
                                            <p class="mb-0 small" data-available-quantity="<?= $cart['quantity']; ?>"><?= $cart['quantity'] > 0 ? 'Available' : 'Out-of-Stock'; ?></p>
                                        </td>
                                        <td class="align-middle border-0">
                                            <form action="/rents/cart/delete/<?= $cart['cart_id']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt small text-muted"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3" class="text-center">Cart is still empty!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3">
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-left">
                            <a class="btn btn-link p-0 text-dark btn-sm" href="/rents"><i class="fas fa-long-arrow-alt-left mr-2"> </i>View more product</a>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <div class="border d-flex align-items-center justify-content-between px-3">
                                <span class="small text-uppercase text-gray headings-font-family">Duration in Days</span>
                                <div class="quantity">
                                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                    <input id="duration_in_days" name="duration_in_days" class="bg-light form-control form-control-sm border-0 shadow-0 p-0" type="text" value="1" />
                                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Cart total</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center justify-content-between">
                                <strong class="text-uppercase small font-weight-bold">Subtotal</strong><span id="sub-total" class="text-muted small">Rp0</span>
                            </li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4">
                                <strong class="text-uppercase small font-weight-bold">Total</strong><span id="total-price">Rp0</span>
                            </li>
                            <li>
                                <form action="/rents/checkout" method="post">
                                    <div class="form-group mb-0">
                                        <input type="hidden" id="email" name="email" value="<?= session()->get('email'); ?>">
                                        <?php foreach ($carts as $cart) : ?>
                                            <input type="hidden" name="product_id[]" value="<?= $cart['id']; ?>">
                                        <?php endforeach; ?>
                                        <input type="hidden" id="duration" name="duration_in_days" value="">
                                        <button id="rent-btn" class="btn btn-dark btn-sm btn-block" type="submit" disabled>Rent</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>