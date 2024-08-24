<!doctype html>
<html>

<head>
    @include('front.includes.head')

<style>
    .error_area {
  background: url(public/under.jpg) no-repeat scroll center center;
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



        <!--================Error Area =================-->
        <section class="error_area">
            <div class="container">
                <div class="error_inner_text_area">
                    <div class="error_inner_text">
                        <a class="book_now_btn" href="{{ route('index') }}">Go to home page</a>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Error Area =================-->
        




    @include('front.includes.footer') 



    @include('front.includes.foot')

  
</body>

</html>
