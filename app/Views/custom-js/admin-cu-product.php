<script src="/assets/js/input-filter.js"></script>
<script type="text/javascript">
    $(function() {
        setInputFilter(document.getElementById('console_quantity'), (value) => {
            return /^\d*?$/.test(value);
        });

        setInputFilter(document.getElementById('rent_price'), (value) => {
            return /^\d*?$/.test(value);
        });

        // Custom file input
        bsCustomFileInput.init();

        // Console image preview
        $('#console_image').on('change', function() {
            const file = $(this).get(0).files;
            const reader = new FileReader();

            reader.readAsDataURL(file[0]);
            reader.addEventListener('load', function(e) {
                const image = e.target.result;
                $('.img-preview').attr('src', image);
            });
        });

        $('#rent_price').on('change keyup keydown', function() {
            this.value <= 0 && (this.value = 1);
        });
    });
</script>