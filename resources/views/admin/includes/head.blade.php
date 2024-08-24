  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> {{ isset($data['title']) ? $data['title'] : 'Home' }} |  Truck Parking </title>
  <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description"
      content="Admindek Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords"
      content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
  <meta name="author" content="colorlib" />
  <!-- Favicon icon -->

  <link rel="icon" href="{{ asset('public/admin/assets/images/favicon.png') }}" type="image/x-icon">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css"
      href="{{ asset('public/admin/bower_components/bootstrap/css/bootstrap.min.css') }}">
  <!-- waves.css -->
  <link rel="stylesheet" href="{{ asset('public/admin/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
  <!-- feather icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/icon/feather/css/feather.css') }}">
  <!-- themify-icons line icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/icon/themify-icons/themify-icons.css') }}">
  <!-- ico font -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/icon/icofont/css/icofont.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/icon/font-awesome/css/font-awesome.min.css') }}">
  
  
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('public/admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('public/admin/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">


    <!-- Switch component css -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('public/admin/bower_components/switchery/css/switchery.min.css') }}">
<!-- Tags css -->
<link rel="stylesheet" type="text/css"
    href="{{ asset('public/admin/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" />

    
  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/pages.css') }}">
  
  
  
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/pages.css') }}">

   