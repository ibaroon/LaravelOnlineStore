<!DOCTYPE html>

@if (App::getLocale()=='en')
<html lang="en" dir="ltr"> <!--begin::Head-->
@else
<html lang="en" dir="rtl">
@endif


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    @include('admin.layout.head')
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary droid-arabic-kufi"> <!--begin::App Wrapper-->
    <div class="app-wrapper Droid Arabic Kufi">
         <!--Header-->
       @include('admin.layout.main_header') 
        <!--Header--> 
        <!--begin::Sidebar-->
        @include('admin.layout.main_sidebar') 
        <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
   
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="mb-0"><strong>@yield('page_title')</strong></h4>
                        </div>
                        {{-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">{{trans('main_sidebar.Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{trans('main_sidebar.Dashbord')}}
                                </li>
                            </ol>
                        </div> --}}

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header-->
            <section class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    
                        <div class="container">
 <!--begin::App Content-->
 @yield('content') 
 <!--end::App Content-->
                        </div>
                  
                    
                </div> <!--end::Container-->
            </section>  
           


        </main> <!--end::App Main-->
         <!--begin::Footer-->
        @include('admin.layout.footer')
        <!--end::Footer-->
    </div> <!--end::App Wrapper-->
     <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
   @include('admin.layout.footer_scripts')
   </body><!--end::Body-->

</html>