@extends('front.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('public/assets/css/checkout.css') }}">
@endsection

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Reservation Confirmed</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Reservation Confirmed</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->


<section class="main_blog_area">
    <div class="container">
        <h1>Reservation Confirmed</h1>
        <p>Thank you for your reservation. Below are the details of your reservation:</p>
        <ul>
            <li>Date In: {{ $data['reservation']->date_in }}</li>
            <li>Date Out: {{ $data['reservation']->date_out }}</li>
            <li>Truck Number: {{ $data['reservation']->truck_number }}</li>
            <li>Truck Color: {{ $data['reservation']->truck_color }}</li>
            <li>Number of Spaces: {{ $data['reservation']->number_of_spaces }}</li>
            <li>Total Price: ${{ $data['reservation']->total_price }}</li>
            <li>Grand Price: ${{ $data['reservation']->grand_price }}</li>
        </ul>
        <p>An email with these details has been sent to you.</p>
    </div>
</section>
@endsection

















@section('js')
<script src="https://js.stripe.com/v3/"></script>
<script>
// var key = "{{ env('STRIPE_KEY') }}";
// var stripe = Stripe(key);
// var elements = stripe.elements();

// var style = {
//     base: {
//         color: '#32325d',
//         lineHeight: '24px',
//         fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
//         fontSmoothing: 'antialiased',
//         fontSize: '16px',
//         '::placeholder': {
//             color: '#aab7c4'
//         }
//     },
//     invalid: {
//         color: '#fa755a',
//         iconColor: '#fa755a'
//     }
// };

// var card = elements.create('card', {
//     style: style
// });
// card.mount('#card-element');

// card.addEventListener('change', function(event) {
//     var displayError = document.getElementById('card-errors');
//     if (event.error) {
//         displayError.textContent = event.error.message;
//     } else {
//         displayError.textContent = '';
//     }
// });

// var form = document.getElementById('payment-form');
// form.addEventListener('submit', function(event) {
//     event.preventDefault();

//     stripe.createToken(card).then(function(result) {
//         if (result.error) {
//             var errorElement = document.getElementById('card-errors');
//             errorElement.textContent = result.error.message;
//         } else {
//             stripeTokenHandler(result.token);
//         }
//     });
// });

// function stripeTokenHandler(token) {
//     var form = document.getElementById('payment-form');
//     var hiddenInput = document.createElement('input');
//     hiddenInput.setAttribute('type', 'hidden');
//     hiddenInput.setAttribute('name', 'stripeToken');
//     hiddenInput.setAttribute('value', token.id);
//     form.appendChild(hiddenInput);

//     form.submit();
// }













$('#apply_coupon').on('click', function() {
    var couponCode = $('#coupon_code').val();
    $('.discount-message').html(' ');
    $.ajax({
        url: "{{ route('apply.coupon') }}",
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            coupon_code: couponCode
        },
        success: function(response) {
            if (response.success) {
                var discount = response.discount;
                var coupon_id = response.id;
                var subtotal = $('#amount').val(); // you might want to get this value dynamically
                var newTotal = subtotal - discount;

                $('#coupon_id').val(coupon_id)
                $('#total').html('£' + newTotal.toFixed(2));
                $('#discount-price').html('£' + discount);
                $('#submit-button').html('Pay £' + newTotal.toFixed(2));
                $('#amount').val(newTotal.toFixed(2));
                $('.discount-message').html('<span class="success"> Coupon applied! You got ' +
                    discount + ' off. </span>');
            } else {
                $('.discount-message').html('<span class="error">' + response.message + '</span>');
            }
        }
    });
});
</script>
@endsection