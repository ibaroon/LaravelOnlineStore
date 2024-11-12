<!DOCTYPE html>
<html lang="{{Config::get('app.locale')}}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width,initial-scale=1">
        
       
   
        @include('website.layouts.head')
    <style>
        a{ text-decoration: none;}
    </style>
    </head>

    <body dir={{(Config::get('app.locale')=='ar' ? 'rtl' : 'ltr' )}} class="droid-arabic-kufi">
        @include('website.layouts.navbar')

@yield('content')


        @include('website.layouts.footer_script')
        @include('website.layouts.footer')
    </body>
</html>