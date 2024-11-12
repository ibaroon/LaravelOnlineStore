 {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary "> --}}
  <nav class="navbar navbar-expand-lg bg-dark  " data-bs-theme="dark"> 
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('website')}}" ><h2 style="color:#c5542d">
        <img src="{{asset('dist/assets/img/sorror_logo.jpg') }}" alt="en" style="max-height: 100px;border-radius:10px;">
        {{trans('website_navbar.WebSite_name')}}</h2></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="{{route('website')}}" class="nav-link  {{$route=='index' ? 'active' : ''}}" aria-current="page" >{{trans('website_navbar.Home')}}</a>
          </li>
          <li class="nav-item">
            <a href="{{route('getCates')}}"class="nav-link {{$route=='cats' ? 'active' : ''}}" >{{trans('website_navbar.Category')}}</a>
          </li>

          <li class="nav-item">
            <a href="{{route('getProducts')}}"class="nav-link {{$route=='products' ? 'active' : ''}}" >{{trans('website_navbar.Product')}}</a>
          </li>

          <li class="nav-item">
            <a href="{{route('cart.index')}}"class="nav-link {{$route=='cart' ? 'active' : ''}}" >{{trans('website_navbar.Cart')}}@php if(session('cartCount')==0){}else{ @endphp <sup style="color: white"><span class="navbar-badge badge text-bg-danger">{{session('cartCount')}}</span></sup> @php }
              
            @endphp </a>
          </li>

          <li class="nav-item">
            <a href="{{route('order.index')}}"class="nav-link {{$route=='order' ? 'active' : ''}}" >{{trans('website_navbar.Orders')}} </a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li> --}}
        </ul>
        <ul class="navbar-nav ms-auto">

          <div class="btn-group mb-1">
            <a class="nav-link " data-bs-toggle="dropdown" href="#">
                @if ( Config::get('app.locale')  == 'ar')
                    <img src="{{asset('src/assets/img/flags/ar.png') }}" alt="ar" style="max-width: 20px">
                    {{-- {{ LaravelLocalization::getCurrentLocaleName() }} --}}
                @else
                    <img src="{{asset('src/assets/img/flags/en.png') }}" alt="en" style="max-width: 20px">
                    {{-- {{ LaravelLocalization::getCurrentLocaleName() }} --}}
                @endif
           
            </a>
            <li class="nav-item dropdown">
            <div class="dropdown-menu dropdown-menu-end">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                    
                @endforeach
            </div>
        </li>
        </div>
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __(trans('website_navbar.Login')) }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __(trans('website_navbar.Register')) }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a href="{{ route('user.profile') }}" class="dropdown-item">{{trans('website_navbar.Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __(trans('website_navbar.Logout')) }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

          
        </ul>
      </div>
    </div>
  </nav>