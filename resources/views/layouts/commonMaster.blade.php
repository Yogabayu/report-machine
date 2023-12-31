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

    <!-- custom -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/app-assets/vendors/css/lightbox/lightbox.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">

    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')
    <script src="{{ asset('assets') }}/vendor/ckeditor5/build/ckeditor.js"></script>

    @include('sweetalert::alert')

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('assets') }}/app-assets/vendors/js/lightbox/lightbox-plus-jquery.js"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    @if (session()->has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            })
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        </script>
    @elseif (session()->has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: true,
                timer: 3000,
                timerProgressBar: true
            })
            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            })
        </script>
    @elseif (session()->has('info'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            })
            Toast.fire({
                icon: 'info',
                title: "{{ session('info') }}"
            })
        </script>
    @endif
    @yield('js')
    <script>
        $(document).ready(function() {
            lightbox.init();
        });
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
        })
    </script>
</body>

</html>
