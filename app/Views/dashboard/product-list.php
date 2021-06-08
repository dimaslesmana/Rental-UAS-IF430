<?= $this->extend('layouts/dashboard/template'); ?>

<?= $this->section('dashboard-content'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">View Product List</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">List of Product</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="product-list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $i => $product) : ?>
                                        <tr>
                                            <td><?= $i + 1; ?></td>
                                            <td><?= $product['name']; ?></td>
                                            <td><?= $product['price']; ?></td>
                                            <td><?= $product['quantity']; ?></td>
                                            <td><?= $product['description']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Manage</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <form action="/dashboard/products/edit" method="post" class="dropdown-item">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-warning btn-block"><i class="fas fa-edit"></i></button>
                                                        </form>
                                                        <form action="/dashboard/products/delete/<?= $product['id']; ?>" method="post" class="dropdown-item">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-sm btn-danger btn-block" onclick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="/assets/img/products/<?= $product['image']; ?>" data-toggle="lightbox" data-title="Image - <?= $product['name']; ?>">
                                                    <img src="/assets/img/products/<?= $product['image']; ?>" class="img-fluid mb-2" alt="<?= $product['name']; ?>" width="250" />
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        <th>Image</th>
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