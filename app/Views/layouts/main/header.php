<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Lightbox-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous">
    <!-- Range slider-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@15.1.1/dist/nouislider.min.css" integrity="sha256-+/hev/vsXpFLZjlSHeqFWTjBWStNFm56A+Uv+gfu9MU=" crossorigin="anonymous">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css" integrity="sha256-wiMI7buOV5UBzdWN4s4kXqE/LZ794hx5oJOOIQlDBaM=" crossorigin="anonymous">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Custom CSS -->
    <?php
    if (!empty($custom_css)) {
        foreach ($custom_css as $css) {
            echo $css;
        }
    }
    ?>
</head>

<body>
    <div class="page-holder">
        <header class="header bg-white">
            <div class="container px-0 px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="/"><span class="font-weight-bold text-uppercase text-dark">U-Rental</span></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/rents">Rents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About Us</a>
                            </li>
                            <?php if (session()->get('role_id') === 'R0002') : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/order/rents">My Rents</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <?php if (session()->get('role_id') === 'R0001') : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard"></i>Dashboard</a>
                                </li>
                            <?php endif; ?>
                            <?php if (session()->get('role_id') === 'R0002') : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/rents/cart"><i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart</a>
                                </li>
                            <?php endif; ?>
                            <?php if (session()->get('logged_in')) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/auth/logout"><i class="fas fa-user-alt mr-1 text-gray"></i> Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/auth/login"><i class="fas fa-user-alt mr-1 text-gray"></i> Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>