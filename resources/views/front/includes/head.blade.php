<meta charset="utf-8">
<meta name="description" content="">


@php
    $meta_tags = null;
    if (!empty($setting)) {
        $meta_tags = explode(',', $setting->meta_tags);
    }
@endphp
@if (is_array($meta_tags))
    @foreach ($meta_tags as $meta_tag)
        <meta name="keywords" content="{{ $meta_tag ?? null }}">
    @endforeach
@endif

<link rel="icon" type="image/x-icon" href="{{ $settings ? asset($settings->favicon) : asset('public/assets/img/logo.png') }}">

<title>{{ isset($data["title"]) ? $data["title"] : 'Home' }} | Truck Parking</title>


<!-- Icon css link -->
<link href="{{ asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/stroke-icon/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/flat-icon/flaticon.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/55da33b8b0.js" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Rev slider css -->
<link href="{{ asset('public/vendors/revolution/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/revolution/css/layers.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/revolution/css/navigation.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/animate-css/animate.css') }}" rel="stylesheet">

<!-- Extra plugin css -->
<link href="{{ asset('public/vendors/magnify-popup/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/bootstrap-selector/bootstrap-select.css') }}" rel="stylesheet">
<link href="{{ asset('public/vendors/lightbox/simpleLightbox.css') }}" rel="stylesheet">

<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/css/responsive.css') }}" rel="stylesheet">