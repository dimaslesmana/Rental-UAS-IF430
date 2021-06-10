<footer class="bg-dark text-white">
    <div class="container py-4">
        <div class="row py-5 m-auto text-center">
            <div class="col-md-4 col-sm-12 mb-3 mb-md-0">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <img class="rounded-circle" src="/assets/img/u-rental-rounded.png" alt="logo" width="70" style="margin: -18px;">
                    <span class="text-uppercase text-small font-weight-bold text-white ml-3">U-Rental</span>
                </div>
                <p class="text-muted text-small font-weight-light mb-3">Jl. Scientia Boulevard, Gading, Kec. Serpong, Tangerang, Banten 15227.</p>
                <ul class="list-inline mb-0 text-white">
                    <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-github"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h6 class="text-uppercase mb-3">Useful links</h6>
                <ul class="list-unstyled mb-0">
                    <li><a class="footer-link" href="/rents">Rents</a></li>
                    <li><a class="footer-link" href="/rents/cart">Cart</a></li>
                    <li><a class="footer-link" href="/auth/register">Register</a></li>
                    <li><a class="footer-link" href="/about">About</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="text-uppercase mb-3">Info</h6>
                <p class="text-muted">Website ini merupakan website yang dibuat untuk memenuhi ujian akhir mata kuliah Pemrograman Web.</p>
            </div>
        </div>
        <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
                <div class="col-lg-6">
                    <p class="small text-muted mb-0">&copy; 2021 &bull; U-Rental &bull; All rights reserved.</p>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap Temple</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- JavaScript files-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js" integrity="sha256-GLUoUntgMrNRD1CUHeOs2ZM/y5mWTWxHlmOA9CrCjyM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.1.1/dist/nouislider.min.js" integrity="sha256-sMu4m5VrXvWjvid9+ZrMVgpMyuqp1MxaVaDsdvyJUyo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js" integrity="sha256-qo0Cam4XJ0QQ06XnCiCFYBh3GDXU45j3lpUp+em2yBU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel2.thumbs@0.1.8/dist/owl.carousel2.thumbs.min.js" integrity="sha256-n/Sk5oyNcg1TfOAocafP1yMFFp8NLFu5EprwBqbnv1E=" crossorigin="anonymous"></script>
<!-- InputMask -->
<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.6/dist/jquery.inputmask.min.js" integrity="sha256-jPWX+QuN6pA/i9LKoy56jKmyIMKi0ooacNFKRuLc4Ro=" crossorigin="anonymous"></script>
<script src="/assets/js/front.js"></script>
<script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite -
    //   see more here
    //   https://css-tricks.com/ajaxing-svg-sprite/
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
    // this is set to BootstrapTemple website as you cannot
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('/assets/icons/orion-svg-sprite.svg');

    $(document).ready(function() {
        $(".preloader").fadeOut('slow');
    });
</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Custom Script -->
<?php
if (!empty($custom_js)) {
    foreach ($custom_js as $js) {
        echo $js;
    }
}
?>
</div>
</body>

</html>