<?= $this->extend('layouts/main/template'); ?>

<?= $this->section('main-content'); ?>

<div class="container my-5">
    <h1 class="mb-4">About Us</h1>
    <div class="row text-center">
        <div class="col-md-4">
            <img class="img-thumbnail rounded-circle bg-dark mb-4" src="/assets/img/about/ade.jpg" alt="" width="70%" style="border: none;">
            <h5>Ade Kiswara</h5>
            <p>00000040037</p>
            <p>Project Manager</p>
            <ul class="list-inline mb-5">
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://www.facebook.com/ade.kiswara.7/"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://github.com/adekiswara"><i class="fab fa-github"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://www.instagram.com/adeeekis/"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
        <div class="col-md-4 mb-5">
            <img class="img-thumbnail rounded-circle bg-dark mb-4" src="/assets/img/about/dimas.jpg" alt="" width="70%" style="border: none;">
            <h5>Dimas Lesmana</h5>
            <p>00000041281</p>
            <p>Back-End Developer</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://github.com/dimaslesmana/"><i class="fab fa-github"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://www.instagram.com/dimaslesmana__/"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://www.linkedin.com/in/dimaslesmana/"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
        <div class="col-md-4 mb-5">
            <img class="img-thumbnail rounded-circle bg-dark mb-4" src="/assets/img/about/akmal.jpg" alt="" width="70%" style="border: none;">
            <h5>Muhammad Akmal Hisyam</h5>
            <p>00000040027</p>
            <p>Front-End Developer</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://github.com/akmalhisyammm"><i class="fab fa-github"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://www.instagram.com/akmalhisyam1/"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a class="reset-anchor" target="_blank" href="https://www.linkedin.com/in/muhammadakmalhisyam/"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>