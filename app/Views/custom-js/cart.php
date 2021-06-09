<script src="/assets/js/input-filter.js"></script>
<script type="text/javascript">
    const formatNumber = number => {
        return number.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
    };

    const validateCart = (prices, availableQuantities) => {
        if (!prices.length) {
            $('#rent-btn').prop('disabled', true).text("Cart is Empty");
            return false;
        }

        for (let i = 0; i < availableQuantities.length; i++) {
            if (availableQuantities[i] <= 0) {
                $('#rent-btn').prop('disabled', true).text("Remove Out-of-Stock product");
                return false;
            }
        }

        return true;
    };

    $(function() {
        setInputFilter(document.getElementById('duration_in_days'), (value) => {
            return /^\d*?$/.test(value);
        });

        const prices = [];
        const availableQuantities = [];

        $('[data-price]').each(function() {
            prices.push(parseInt($(this).attr('data-price')));
        });

        $('[data-available-quantity]').each(function() {
            availableQuantities.push(parseInt($(this).attr('data-available-quantity')));
        });

        if (!validateCart(prices, availableQuantities)) {
            return;
        }

        const calculateTotal = () => {
            $('#rent-btn').prop('disabled', false).text("Rent");

            const duration = $('#duration_in_days')[0];
            parseInt(duration.value) < 1 && (duration.value = 1);

            const totalPrice = prices.reduce((a, b) => a + b, 0) * parseInt(duration.value);

            $('#sub-total').text(`Rp${formatNumber(totalPrice)}`);
            $('#total-price').text(`Rp${formatNumber(totalPrice)}`);
            $(':input#duration').val(parseInt(duration.value));
        };

        calculateTotal(prices);
        $('#duration_in_days').on('change keyup keydown', function() {
            calculateTotal(prices);
        });

        $('.inc-btn').click(function() {
            calculateTotal(prices);
        });

        $('.dec-btn').click(function() {
            calculateTotal(prices);
        });
    });
</script>