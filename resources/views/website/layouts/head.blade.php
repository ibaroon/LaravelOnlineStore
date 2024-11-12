
<title>@yield('title')</title>
@if(Config::get('app.locale')=='ar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
@else
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endif

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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