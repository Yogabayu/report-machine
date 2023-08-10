<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}"
    data-base-url="{{ url('/') }}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Reporting Machine </title>
    <meta name="description"
        content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords"
        content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')

    <!-- custom -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/app-assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- select2 -->

    @yield('css')
</head>

<body>
    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->

    {{-- remove while creating package --}}
    {{-- <div class="buy-now">
        <a href="{{ config('variables.productPage') }}" target="_blank" class="btn btn-danger btn-buy-now">Upgrade To
            Pro</a>
    </div> --}}
    {{-- remove while creating package end --}}

    <!-- Include Scripts -->
    @include('layouts/sections/scripts')

    <script src="{{ asset('assets') }}/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/charts/apexcharts.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/core/app.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/components.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/pages/faq-kb.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/pages/app-user.js"></script>
    <script src="{{ asset('assets') }}/app-assets/js/scripts/pages/invoice.js"></script>
    @yield('js')
</body>

</html>
