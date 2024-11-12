    
<title>@yield('title')</title><!--begin::Primary Meta Tags-->
    

<link rel="stylesheet" href="{{asset('dist/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('dist/plugins/jqvmap/jqvmap.min.css')}}">

<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('dist/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('dist/plugins/summernote/summernote-bs4.css')}}">
<!-- Google Font: Source Sans Pro -->



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
        
    @if (App::getLocale()=='en')
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}"><!--end::Required Plugin(AdminLTE)-->
     @else
     <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.rtl.css')}}"><!--end::Required Plugin(AdminLTE)-->
     @endif
    
     <style>
        @import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
/* @import url(https://fonts.googleapis.com/earlyaccess/amiri.css);
@import url(https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
@import url(https://fonts.googleapis.com/earlyaccess/lateef.css); 
@import url(https://fonts.googleapis.com/earlyaccess/scheherazade.css);
@import url(https://fonts.googleapis.com/earlyaccess/thabit.css); */
.amiri{font-family: 'Amiri', serif;}
.droid-arabic-kufi{font-family: 'Droid Arabic Kufi', serif;}
.droid-arabic-naskh{font-family: 'Droid Arabic Naskh', serif;}
.lateef{font-family: 'Lateef', serif;}
.scheherazade{font-family: 'Scheherazade', serif;}
.thabit{font-family: 'Thabit', serif;}
    </style>
    @yield('css')
