@extends('front.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('public/assets/css/checkout.css') }}">
@endsection

@section('content')
<!--================Banner Area =================-->
<section class="banner_area">
    <div class="container">
        <div class="banner_inner_content">
            <h3>Checkout</h3>
            <ul>
                <li class="active"><a href="{{ route('index')}}">Home</a></li>
                <li><a href="#">Checkout</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->


<section class="main_blog_area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="cell example example5">

                    @if(session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                    @endif

                    @if(session('error_message'))
                    <div class="alert alert-danger">
                        {{ session('error_message') }}
                    </div>
                    @endif
                    <form action="{{ route('reserved-pay') }}" method="post" id="payment-form">
                        @csrf
                        <input type="hidden" name="amount" id="amount" value="{{ $data['reservation']['total_price'] }}">
                        <input type="hidden" name="coupon_id" id="coupon_id" value="0">
                        <fieldset>
                            <legend class="card-only" data-tid="elements_examples.form.pay_with_card">Pay with card
                            </legend>
                            <legend class="payment-request-available"
                                data-tid="elements_examples.form.enter_card_manually">Or enter card details</legend>
                            <div class="row">
                                <div class="field">
                                    <label for="example5-name">Name</label>
                                    <input id="example5-name" name="name" class="input" type="text"
                                        placeholder="Jane Doe" required="" autocomplete="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="field">
                                    <label for="example5-email">Email</label>
                                    <input id="example5-email" name="email" class="input" type="email"
                                        placeholder="janedoe@gmail.com" required="" autocomplete="email">
                                </div>
                                <div class="field">
                                    <label for="example5-phone">Phone</label>
                                    <input id="example5-phone" name="phone" class="input" type="text"
                                        placeholder="(941) 555-0123" required="" autocomplete="tel">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="field">
                                    <div class="remember-me">
                                        <input type="checkbox" id="remember" name="account">
                                        <label for="remember"> Create an account?</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="submit-button">Pay
                                ${{ $data['reservation']['total_price'] }}</button>
                        </fieldset>
                        <div class="error" role="alert">
                            <span class="message"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 right-side">
                <div class="checkout-item">
                    <img src="{{ asset('public/assets/img/location/' . $data['location']->featured_image ) }}"
                        alt="Product Image">
                    <div class="checkout-details">
                        <h4>{{ $data['location']->location_name  }}</h4>
                        <p>{{ $data['reservation']['nights'] }} days</p>
                    </div>
                    <div class="checkout-price">${{ $data['reservation']['total_price'] }}</div>
                </div>
                <div class="discount-message">

                </div>
                <div class="discount-code">
                    <input type="text" id="coupon_code" placeholder="Discount code">
                    <button id="apply_coupon">Apply</button>
                </div>
                <div class="summary">
                    <span>Subtotal</span>
                    <span id="subtotal">${{ $data['reservation']['total_price'] }}</span>
                </div>
                <div class="summary ">
                    <span>Discount</span>
                    <span id="discount-price">$00</span>
                </div>
                <div class="summary summary-total">
                    <span>Total</span>
                    <span id="total">${{ $data['reservation']['total_price'] }}</span>
                </div>
            </div>
        </div>

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
                $('#total').html('$' + newTotal.toFixed(2));
                $('#discount-price').html('$' + discount);
                $('#submit-button').html('Pay $' + newTotal.toFixed(2));
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