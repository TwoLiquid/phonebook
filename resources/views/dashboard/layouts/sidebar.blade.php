<!-- BEGIN SIDEBAR -->
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu"></div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{ asset('assets/dashboard/img/logo.svg') }}" alt="logo" class="brand" data-src="{{ asset('assets/dashboard/img/logo.svg') }}" data-src-retina="{{ asset('assets/dashboard/img/logo.svg') }}" height="14" />
        <div class="sidebar-header-controls">
            <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline m-l-36" type="button" style=""><i class="fa fs-12"></i></button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items p-t-20 p-b-30">

            @include('dashboard.layouts.partials.sidebar-item', [
                'name' => 'Контакты',
                'routeRoot' => 'contacts',
                'route' => 'contacts',
                'featherIcon' => 'users'
            ])

            {{--@include('dashboard.layouts.partials.sidebar-item', [
                'name' => 'Контакты',
                'routeRoot' => [],
                'featherIcon' => 'file',
                'links' => [
                    [
                        'name' => 'Список',
                        'route' => 'contacts',
                        'featherIcon' => 'list'
                    ],
                    [
                        'name' => 'Создать',
                        'route' => 'contacts.create',
                        'featherIcon' => 'plus'
                    ]
                ]
            ])--}}

            {{--@include('dashboard.layouts.partials.sidebar-item', [--}}
                {{--'name' => 'Главная страница',--}}
                {{--'routeRoot' => 'dashboard.index',--}}
                {{--'route' => 'dashboard.index',--}}
                {{--'featherIcon' => 'home'--}}
            {{--])--}}

            {{--@include('dashboard.layouts.partials.sidebar-item', [
                'name' => 'Компании',
                'routeRoot' => ['dashboard.vendors'],
                'featherIcon' => 'briefcase',
                'links' => [
                    [
                        'name' => 'Список',
                        'route' => 'dashboard.vendors',
                        'featherIcon' => 'list'
                    ],
                    [
                        'name' => 'Создать',
                        'route' => 'dashboard.vendors.create',
                        'featherIcon' => 'plus'
                    ]
                ]
            ])

            @include('dashboard.layouts.partials.sidebar-item', [
                'name' => 'Пользователи',
                'routeRoot' => ['dashboard.users'],
                'featherIcon' => 'users',
                'links' => [
                    [
                        'name' => 'Список',
                        'route' => 'dashboard.users',
                        'featherIcon' => 'list'
                    ],
                    [
                        'name' => 'Создать',
                        'route' => 'dashboard.users.create',
                        'featherIcon' => 'plus'
                    ]
                ]
            ])--}}

        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
