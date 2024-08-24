<!doctype html>
<html>

<head>
    @include('front.includes.head')

<style>
    .error_area {
  background: url(public/assets/img/resort.png) no-repeat scroll center center;
  background-size: cover;
  position: relative;
  z-index: 3;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  min-height: 1110px;
}

</style>

</head>

<body>


        <section class="comming_soon_area">
            <div class="container">
                <div class="comming_soon_inner">
                    <div class="comming_soon_text">
                        <h3>Comming Soon</h3>
                        <div class='countdown' data-date="2025-02-01"></div>
                        <p>Our website is under construction. We'll be here soon with our new <br />awesome site, Subscribe to be notified.</p>
                        <div id="newsletter-response"></div>

                        <div class="fun_subscrib_inner">
                            
                            <form id="newsletter-form" method="POST" action="{{ route('subscribe.newsletter') }}">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" required class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default submit_btn"  type="submit">Subscribtion</button>
                                </span>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    @include('front.includes.footer') 



    @include('front.includes.foot')


<script>
    $(document).ready(function () {
    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            success: function (response) {
                $('#newsletter-response').html('<p class="text-success">' + response.success + '</p>');
                form.trigger('reset'); // Reset the form fields
            },
            error: function (xhr) {
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    var errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += '<p class="text-danger">' + value + '</p>';
                    });
                    $('#newsletter-response').html(errorMessage);
                }
            }
        });
    });
});

</script>
  
</body>

</html>
