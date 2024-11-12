<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> <!--begin::Brand Image--> <img src="{{asset('dist/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item"> <a href="{{route('dashboard')}}" class="nav-link {{$route=='dashboard' ? 'active' : ''}} "> <i class="nav-icon bi bi-speedometer2"></i>
                    <p> {{trans('main_sidebar.Dashbord')}}</p>
                </a> </li>          

                    <li class="nav-item"> <a href="{{route('cats.index')}}" class="nav-link {{$route=='cats' ? 'active' : ''}}"> <i class="nav-icon bi bi-tags-fill"></i>
                        <p> {{trans('main_sidebar.Categories')}}</p>
                    </a> </li>

                    <li class="nav-item"> <a href="{{route('products.index')}}" class="nav-link {{$route=='products' ? 'active' : ''}}"> <i class="nav-icon bi bi-boxes"></i>
                        <p> {{trans('main_sidebar.Products')}}</p>
                    </a> </li>

                    <li class="nav-item"> <a href="{{route('orders.index')}}" class="nav-link {{$route=='orders' ? 'active' : ''}}"> <i class="nav-icon bi bi-list-check"></i>
                        <p> {{trans('main_sidebar.Orders')}}</p>
                    </a> </li>

                    <li class="nav-item"> <a href="{{route('users.index')}}" class="nav-link {{$route=='users' ? 'active' : ''}}"> <i class="nav-icon bi bi-people-fill"></i>
                        <p> {{trans('main_sidebar.Users')}}</p>
                    </a> </li>



            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>