<!DOCTYPE html>
<html lang="en">

<head>

    <title>Reporting Machines</title>

    <!--SHORTCUT ICON-->
    <link rel="shortcut icon" href="{{ asset('file/site') }}/foto/{{ $data->logo }}" />

    {{-- META TAGS --}}
    <meta charset="UTF-8" />
    <meta name="language" content="ES" />
    <meta name="description" content="Sebuah website yang digunakan untuk pelaporan kerusakan mesin -- prototype">
    <meta name="keywords" content="Reporting Machine, laporan, analisis data, bisnis, alat pelaporan, informasi bisnis">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!--ICONIFY-->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <style>
        *,
        html {
            scroll-behavior: smooth;
        }

        *,
        *:after,
        *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        :root {
            --white: #FFF;
            --black: #000;
            --lite: rgba(255, 255, 255, 0.6);
            --gray: rgba(1, 1, 1, 0.6);
            --dark: #1e1e1d;
            --primary: #d6863a;
            --primary_dark: #93683f;
            --primary_lite: #ebab61;
            --default_font: 'Nunito Sans', sans-serif;
        }

        ::-webkit-scrollbar {
            height: 12px;
            width: 4px;
            background: var(--dark);
        }

        ::-webkit-scrollbar-thumb {
            background: gray;
            -webkit-box-shadow: 0px 1px 2px var(--dark);
        }

        ::-webkit-scrollbar-corner {
            background: var(--dark);
        }

        body {
            margin: 0;
            overflow-x: hidden !important;
            font-family: var(--default_font);
        }

        a {
            text-decoration: none !important;
            min-width: fit-content;
            width: fit-content;
            width: -webkit-fit-content;
            width: -moz-fit-content;
        }

        a,
        button {
            transition: 0.5s;
        }

        em {
            font-style: normal;
            color: var(--primary_dark);
        }

        figure {
            padding: 0;
            margin: 0;
        }

        a,
        p,
        .btn {
            font-size: 15px;
        }

        p {
            line-height: 1.9em;
            color: var(--gray);
        }

        a,
        button,
        input,
        textarea,
        select {
            outline: none !important;
        }

        fieldset {
            border: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
        }

        .title,
        .sub_title {
            font-family: var(--title_font);
            font-weight: 800;
            margin: 0;
        }

        .flex,
        .fixed_flex {
            display: flex;
        }

        .flex_content {
            width: 100%;
            position: relative;
        }

        .grid {
            display: grid;
        }

        .padding_1x {
            padding: 1rem;
        }

        .padding_2x {
            padding: 2rem;
        }

        .padding_3x {
            padding: 3rem;
        }

        .padding_4x {
            padding: 4rem;
        }

        .big {
            font-size: 3.5em;
        }

        .medium {
            font-size: 2em;
        }

        .small {
            font-size: 1.3em;
        }

        .btn {
            padding: 0.6rem 1rem;
            border-radius: 5px;
            position: relative;
            border: 0;
            text-align: center;
        }

        .btn_1 {
            background: var(--primary);
            color: var(--white);
        }

        .btn_1:hover {
            opacity: 0.8;
        }

        .btn_2 {
            background-color: var(--white);
            color: var(--dark);
        }

        .btn_2:hover {
            box-shadow: rgb(1, 1, 1) 3px 3px 6px 0px inset, rgba(1, 1, 1, 0.5) -3px -3px 6px 1px inset;
            color: var(--dark);
        }

        .btn_3 {
            display: block;
            background-color: 0;
            color: var(--white);
            position: relative;
            font-family: var(--default_font);
            font-weight: 400;
            text-transform: uppercase;
        }

        .btn_3:before {
            content: "";
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            position: absolute;
            left: 0;
            top: 50%;
            width: 40px;
            height: 40px;
            transition: 0.5s;
            transform: translate(0%, -50%);
        }

        .btn_3:after {
            content: "\f178";
            font-family: "FontAwesome";
            margin-left: 5px;
        }

        .btn_3:hover:before {
            border-radius: 40px;
            width: 100%;
        }

        .divisions {
            position: relative;
        }

        .title_header {
            margin: auto;
            text-align: center;
            width: 60%;
        }

        .ball:before {
            content: "";
            border-radius: 50%;
            background-color: rgba(1, 1, 1, 0.2);
            position: absolute;
            left: 0;
            top: 50%;
            width: 30px;
            height: 30px;
            transform: translate(-50%, -50%);
        }

        .link-tag {
            position: relative;
        }

        .link-tag:before {
            content: "\f0da";
            font-family: "FontAwesome";
            margin-right: 5px;
            transition: 0.5s;
            color: var(--primary_dark);
        }

        .link-tag:hover:before {
            margin-right: 10px;
            color: var(--black);
        }

        .link-tag:hover {
            color: var(--primary_dark);
        }

        @media (max-width:920px) {
            .flex {
                flex-wrap: wrap;
            }

            .padding_1x,
            .padding_2x,
            .padding_3x,
            .padding_4x {
                padding: 1rem;
            }

            .big {
                font-size: 1.8em;
            }

            .medium {
                font-size: 1.6em;
            }

            .small {
                font-size: 1.1em;
            }

            .btn {
                padding: 0.5rem 1rem;
            }

            a,
            p,
            .btn {
                font-size: 12px;
            }

            .title_header {
                width: 100%;
            }
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1rem 2rem;
            align-items: center;
            justify-content: space-between;
            color: var(--white);
            background-color: transparent;
            z-index: 999;
            transition: 0.5s;
        }

        nav a {
            color: var(--lite);
        }

        nav figure {
            width: 200px;
            font-weight: 800;
            font-size: 1.5em;
        }

        .ham {
            width: 30px;
            height: 15px;
            position: relative;
            color: var(--lite);
            z-index: 11 !important;
        }

        .ham:before,
        .ham:after {
            content: "";
            position: absolute;
            left: 0;
            height: 3px;
            background-color: var(--white);
            border-radius: 40px;
            z-index: 1;
            transition: 0.5s;
        }

        .ham:before {
            top: 0;
            width: 50%;
        }

        .ham:after {
            bottom: 0;
            width: 100%;
        }

        .ham:hover:before,
        .ham:hover:after {
            background-color: var(--white);
        }

        .hamburger:before {
            width: 100%;
            transform: rotate(50deg);
            top: 6px;
        }

        .hamburger:after {
            transform: rotate(-50deg);
            bottom: 6px;
        }

        @media (max-width:920px) {
            nav {
                padding: 1rem;
            }

            nav figure {
                font-size: 1.1em;
            }
        }



        menu {
            position: fixed;
            left: -105%;
            top: 0;
            z-index: 99;
            background-color: var(--dark);
            width: 350px;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            overflow-y: auto;
            transition: 0.5s;
        }

        menu figure {
            width: 250px;
            font-size: 2em;
            color: var(--white);
        }

        menu .details {
            padding-top: 6rem;
        }

        menu .details a {
            display: flex;
            align-items: center;
            font-size: 12px;
        }

        menu .details a iconify-icon {
            margin-right: 10px;
        }

        menu a,
        menu .dropdown {
            color: var(--lite);
            display: block;
            padding: 0.5rem 0;
            cursor: pointer;
            transition: 0.5s;
        }

        menu .dropdown {
            display: inline-block;
        }

        menu a:hover,
        menu .dropdown:hover {
            color: var(--white);
        }

        menu .dropdown_content {
            display: none;
        }

        menu .links a:before,
        menu .links .dropdown dt:before {
            font-family: "FontAwesome";
            margin-right: 5px;
            transition: 0.5s;
        }

        menu .links a:before {
            content: "\f0da";
        }

        menu .links .dropdown dt:before {
            content: "\f0da";
        }

        menu .links .dropdown dt:hover:before,
        menu .links a:hover:before {
            margin-right: 10px;
        }

        menu .links .dropdown_content a:before {
            content: "\f105";
        }

        @media (max-width:920px) {
            menu {
                width: 100%;
            }
        }

        footer {
            width: 100%;
            background-color: var(--dark);
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        footer section {
            flex: 1 1 100%;
        }

        footer a,
        footer p {
            color: var(--lite);
        }

        footer .flex_content:first-child a:not(:last-child) {
            margin-right: 20px;
        }

        footer .flex_content a:not(:last-child) {
            margin-right: 50px;
        }

        footer .flex_content a .fa {
            font-size: 1.6em;
        }

        footer .flex_content a:hover {
            color: var(--white);
        }

        @media (max-width:920px) {
            footer {
                padding-top: 2rem;
            }

            footer section {
                padding: 0rem 1rem !important;
                text-align: left;
            }

            footer .flex_content:not(:first-child) a {
                margin-right: 0px;
                margin: 1rem 0;
                display: block;
            }
        }

        .additional {
            flex-wrap: wrap;
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            z-index: 999;
            max-width: 400px;
        }

        .additional section {
            flex: 1 1 100%;
            position: relative;
        }

        .alert {
            background-color: var(--dark);
            border: 1px solid var(--lite);
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .alert .close {
            position: absolute;
            color: var(--lite);
            right: 0.5rem;
            top: 0.5rem;
        }

        .alert .close:hover {
            color: var(--white);
        }

        .alert iconify-icon {
            font-size: 2em;
            margin-right: 20px;
        }

        .alert iconify-icon[icon="subway:error"] {
            color: red;
        }

        .alert iconify-icon[icon="bx:error"] {
            color: #d3a120;
        }

        .alert .title {
            color: var(--white);
        }

        .alert p {
            color: var(--lite);
        }

        @Media (max-width:520px) {
            .additional {
                max-width: 100%;
                width: 100%;
                left: 50%;
                transform: translate(-50%, 0);
                padding: 1rem;
            }
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
            background-color: var(--gray);
            width: 100%;
            height: 100%;
        }

        #roll_back {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background-color: var(--dark);
            border-radius: 5px;
            border: 2px solid var(--primary);
            padding: 5px 10px;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 11;
            box-shadow: 0px 6px 16px -6px rgba(1, 1, 1, 0.5);
            color: var(--white);
            font-weight: 900;
        }

        header {
            width: 100%;
            background: linear-gradient(to right, var(--black) 10%, var(--gray) 50%, rgba(1, 1, 1, 0.1) 100%), url("https://i.postimg.cc/pdJnpSFp/header.jpg");
            background-size: cover;
            background-position: bottom;
            color: var(--white);
        }

        header article {
            width: min(100%, 700px);
            padding: 10rem 2rem;
        }

        header article p {
            color: var(--lite);
        }

        header article em {
            color: var(--primary_lite);
        }

        @media (max-width:920px) {
            header {
                background: linear-gradient(to right, var(--black) 10%, var(--gray) 80%, rgba(1, 1, 1, 0.4) 100%), url("../../assets/images/header.jpg");
                background-size: cover;
                background-position: bottom;
            }

            header article {
                padding: 7rem 1rem;
            }
        }

        .division_1 {
            background-color: var(--dark);
            color: var(--white);
        }

        .division_1 figure {
            width: 100%;
            position: relative;
            margin: auto;
        }

        .division_1 figure img {
            width: 100%;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
        }

        .division_1 figure:before {
            content: "";
            width: 90%;
            height: 90%;
            position: absolute;
            left: -20px;
            top: -20px;
            background-color: var(--primary);
            border-radius: 10px;
        }

        .division_1 article p {
            color: var(--lite);
        }

        .division_1 aside {
            align-items: center;
            margin-top: 3rem;
        }

        .division_1 aside span {
            padding-right: 50px;
            color: var(--white);
        }

        .division_1 aside span:not(:first-child) {
            padding-left: 50px;
        }

        .division_1 aside span:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }


        @media (max-width:920px) {
            .division_1 figure img {
                width: 35%;
            }

            .division_1 figure:before {
                width: 30%;
                height: 95%;
            }

            .division_1 aside {
                margin-top: 2rem;
            }
        }

        @media (max-width:520px) {
            .division_1 figure img {
                width: 100%;
            }

            .division_1 figure:before {
                width: 90%;
                height: 90%;
                top: -10px;
                left: -10px;
            }

            .division_1 aside span {
                padding-right: 20px;
            }

            .division_1 aside span:not(:first-child) {
                padding-left: 20px;
            }
        }

        .division_2 .flex_content:first-child {
            width: 60%;
            text-align: center;
        }

        .division_2 figure {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .division_2 figure img {
            width: 100%;
            object-fit: cover;
        }

        .division_2 .flex_content:first-child figure,
        .division_2 .flex_content:first-child figure img {
            height: 100%;
        }

        .division_2 .flex_content:first-child figure figcaption {
            width: 90%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: var(--white);
            color: var(--dark);
            z-index: 1;
        }

        .division_2 .cards {
            flex-wrap: wrap;
        }

        .division_2 .cards .card {
            flex: 1 1 100%;
            color: var(--dark);
        }

        .division_2 .cards .card img {
            max-height: 50vh;
        }

        .division_2 .cards .card img,
        .division_2 .cards .card figcaption {
            flex: 1 1 50%;
        }

        .division_2 .cards .card:nth-child(even) {
            text-align: right;
        }

        @media (max-width:1420px) {
            .division_2 .cards .card img {
                max-height: 30vh;
            }
        }

        @media (max-width:1180px) {
            .division_2 {
                flex-wrap: wrap;
            }

            .division_2 .flex_content:first-child {
                width: 100%;
            }

            .division_2 .flex_content:first-child figure img {
                display: none;
            }

            .division_2 .flex_content:first-child figure figcaption {
                position: relative;
                width: 100%;
            }

            .division_2 .cards .card img {
                max-height: 50vh;
            }
        }


        @media (max-width:520px) {

            .division_2,
            .division_1 {
                padding: 0 !important;
            }

            .division_2 .cards .card {
                display: block;
                border-radius: 10px;
                overflow: hidden;
            }

            .division_2 .cards .card:not(:last-child) {
                margin-bottom: 1rem;
            }

            .division_2 .cards .card img {
                max-height: 100%;
                border-radius: 10px;
            }

            .division_2 .cards .card figcaption {
                position: absolute;
                background-color: var(--white);
                bottom: 0;
                left: 50%;
                width: 90%;
                border-radius: 10px;
                bottom: 1rem;
                transform: translate(-50%, 0%);
                text-align: center;
            }

            .division_2 .cards .card:nth-child(even) {
                text-align: center;
            }

        }

        .division_3 section {
            width: 100%;
            border-radius: 10px;
            background-color: #fef8e8;
            margin: auto;
            justify-content: space-between;
            box-shadow: rgba(1, 1, 1, 0.2) 3px 3px 6px 0px inset, rgba(1, 1, 1, 0.2) -3px -3px 6px 1px inset;
        }

        .division_3 figure {
            width: 200px;
            margin-right: 20px;
        }

        .division_3 figure img {
            width: 100%;
            height: 100%;
        }

        .division_3 .btn {
            display: block;
        }

        @media (max-width:1020px) {
            .division_3 figure {
                width: 100px;
            }
        }

        @media (max-width:520px) {
            .division_3 figure {
                width: 80px;
            }
        }
    </style>
    <style>
        @media (max-width: 768px) {
            header {
                background-image: url('{{ asset('assets') }}/img/header.jpg');
                background-size: cover
            }
        }
    </style>

    <!--PLUGIN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>

    <!--NAV-->
    <nav class="flex">
        <figure class="logo">
            <img src="{{ asset('file/site') }}/foto/{{ $data->logo }}" alt="logo" style="width:100px" />
        </figure>
        {{-- <a href="#" class="ham" onclick="closer()"> --}}
        </a>
    </nav>

    <!--MENU-->
    {{-- <menu>
        <section class="details padding_1x">
            <a href="javascript:void(0)"><iconify-icon icon="iconoir:phone"></iconify-icon> (+000) 123 4567</a>
            <a href="mailto:info@websitename.com"><iconify-icon icon="mdi:email-outline"></iconify-icon>
                info@websitename.com</a>
            <a href="javascript:void(0)"><iconify-icon icon="entypo:address"></iconify-icon> 24971 Avenue Stanford,
                Santa Clarita, CA 91355</a>
            <a href="javascript:void(0)"><iconify-icon icon="ri:time-line"></iconify-icon> Every day, 6am - 6pm</a>
        </section>
        <section class="links padding_1x">
            <a href="#">Home</a>
            <a href="#">Recycling</a>
            <a href="#">Contact us</a>
            <a href="#">About us</a>
        </section>
    </menu> --}}

    <!--HEADER-->
    <header
        style="background: linear-gradient(to right, var(--black) 10%, var(--gray) 50%, rgba(1, 1, 1, 0.1) 100%), url('{{ asset('assets') }}/img/header.jpg');
           background-size: cover;
           background-position: center;
          ">
        <article>
            <h1 class="title big"> <em>{{ $data->name_site }}</em> untuk kebutuhan anda<em>.</em> </h1>
            <p>Reporting Machine adalah alat laporan yang memenuhi kebutuhan Anda. Dikembangkan untuk memberikan solusi
                yang tepat dan efisien dalam pembuatan laporan. Dengan fitur canggih dan antarmuka yang mudah digunakan,
                Reporting Machine membantu Anda menghasilkan laporan berkualitas tinggi dengan mudah.</p>
            {{-- <a href="#More" class="btn btn_3">Login</a> --}}
            @if (auth()->guard('web')->user())
                <a href="{{ route('dashboard-analytics') }}" class="btn btn_3">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn_3">Log in</a>
            @endif
        </article>
    </header>

    <!--MAIN-->
    <main id="More">
        <!--DIVISION_1-->
        <div class="divisions division_1 flex padding_2x">
            {{-- <section class="flex_content padding_2x">
                <figure>
                    <img src="https://i.postimg.cc/qqt4ntzz/01.jpg" alt="" loading="lazy" />
                </figure>
            </section> --}}
            <section class="flex_content padding_2x">
                <article>
                    <h2 class="title medium">Let's make your Report better.</h2>
                    <p>
                        Laporan yang informatif dapat mempermudah dalam melakukan pemantauan terkait dengan sistem yang
                        sedang berjalan.
                    </p>
                    {{-- <aside class="fixed_flex">
                        <span>
                            <h4 class="title small">200+</h4>
                            <p>New Furnitures</p>
                        </span>
                        <span>
                            <h4 class="title small">100+</h4>
                            <p>Recycled Products</p>
                        </span>
                    </aside> --}}
                </article>
            </section>
        </div>
        {{--
        <!--DIVISION_2-->
        <div class="divisions division_2 flex padding_2x">
            <section class="flex_content padding_2x">
                <figure>
                    <img src="https://i.postimg.cc/XvVWL1rM/div-2.jpg" alt="" loading="lazy" />
                    <figcaption class="padding_1x">
                        <h2 class="title medium">What We Do?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </figcaption>
                </figure>
            </section>
            <section class="flex_content cards padding_2x flex">
                <figure class="flex card">
                    <img src="https://i.postimg.cc/g2ydvbkq/01.jpg" alt="" loading="lazy" />
                    <figcaption class="padding_2x">
                        <h3 class="title small">Indoor & Outdoor Furniture</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </figcaption>
                </figure>
                <figure class="flex card">
                    <figcaption class="padding_2x">
                        <h3 class="title small">Large contracts for Doors</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </figcaption>
                    <img src="https://i.postimg.cc/FsLhHJM6/02.jpg" alt="" loading="lazy" />
                </figure>
                <figure class="flex card">
                    <img src="https://i.postimg.cc/y65VKTb9/03.jpg" alt="" loading="lazy" />
                    <figcaption class="padding_2x">
                        <h3 class="title small">Kitchen, Bed room sets</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </figcaption>
                </figure>
                <figure class="flex card">
                    <figcaption class="padding_2x">
                        <h3 class="title small">Exibition Stands</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </figcaption>
                    <img src="https://i.postimg.cc/j2GKhs7v/04.jpg" alt="" loading="lazy" />
                </figure>
            </section>
        </div> --}}

        {{-- <div class="divisions division_3 padding_4x">
            <section class="flex padding_1x">
                <figure>
                    <img src="https://i.postimg.cc/T3vfL3G3/div-3.png" alt="" loading="lazy" />
                </figure>
                <article>
                    <h3 class="title small">Recycle old wood pallets to create Beautiful Furniture Items.</h3>
                    <p>We have a dedicated team to recycle wood waste to create artistic gadgets such as <b>Mobile
                            Holders</b>, <b>Desktop Clocks</b>, <b>Wall Clocks</b>,<b>Pen Holders</b>, <b>Chop
                            Boards</b>, <b>Decorative Items</b> & much more...</p>
                    <a href="#" class="btn btn_1">Contact us</a>
                </article>
            </section>
        </div> --}}
    </main>

    <!--FOOTER-->
    <footer class="flex">
        <section class="flex_content padding_2x">
            <a href="https://www.facebook.com/bayu.angin.39/" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/yogabayu.ap/" target="_blank">
                <i class="fa fa-instagram"></i>
            </a>
            <a href="https://id.linkedin.com/in/yoga-bayu-anggana-pratama" target="_blank">
                <i class="fa fa-linkedin"></i>
            </a>
            <a href="https://www.youtube.com/channel/UC3PRXW7Wqjy_7oZIM-BNOAQ" target="_blank">
                <i class="fa fa-youtube"></i>
            </a>
        </section>
        {{-- <section class="flex_content">
            <a href="#">Home</a>
            <a href="#">Contact us</a>
            <a href="#">About us</a>
            <a href="#">Cookie Policy</a>
        </section> --}}
        <section class="flex_content padding_1x">
            <p>© 2023 yogabayuap.com || All rights reserved</p>
        </section>
    </footer>


    <!--ADDITIONAL-->
    <div class="additional flex"></div>
    <a href="#" id="roll_back" class="animate"><i class="fa fa-angle-up"></i></a>

    <!--JAVASCRIPT
<script type="text/javascript" src="assets/js/main.js"></script> -->
    <script>
        //GLOBAL VARIABLES
        const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        var count = 0;

        //DROPDOWN
        $(".dropdown dt").click(function() {
            $(this).next(".dropdown_content").toggle("slow");
        });


        //DETECT MOBILE DEVICE
        if (isMobile) {
            $("menu .details a").click(function() {
                if ($(this).index() == 0) {
                    $(this).attr("href", "tel:1234567890");
                }
                if ($(this).index() == 3) {
                    popup('<i class="fa fa-times"></i></a><iconify-icon icon="bx:error"></iconify-icon><aside><h3 class="title small">Timings may vary</h3><p>For accurate timings please connect through a call & confirm.</p></aside>',
                        'alert');
                }
            });
        } else {
            $("menu .details a").click(function() {
                switch ($(this).index()) {
                    case 0:
                        return popup(
                            '<i class="fa fa-times"></i></a><iconify-icon icon="subway:error" class="error"></iconify-icon><aside><h3 class="title small">Unsupported device</h3><p>It looks like your device won\'t support for <b>calling</b>. Kindly use a Mobile device.</p></aside>',
                            'alert');
                        break;
                    case 3:
                        popup('<i class="fa fa-times"></i></a><iconify-icon icon="bx:error"></iconify-icon><aside><h3 class="title small">Timings may vary</h3><p>For accurate timings please connect through a call & confirm.</p></aside>',
                            'alert');
                        break;
                    default:
                        break;
                }
            });
        }


        //POPUP
        function popup(mssg, type) {
            if (type == "alert") {
                if ($(".alert").length < 2) {
                    count++;
                    $(".additional").append('<section class="alert alert_' + count +
                        ' flex padding_1x"><a href="javascript:void(0)" onclick="closer(\'modal\',\'alert_' + count +
                        '\')" class="close">' + mssg + '</section>');
                    setTimeout(function() {
                        $(".alert_" + count).remove();
                    }, 10000);
                    if ($(".alert").length > 0) {
                        setTimeout(function() {
                            $(".alert_" + count).prev().remove();
                        }, 4000);
                    }
                }
            }
        }


        //HAM
        $(".ham").click(function() {
            if ($("menu").css("left") != "0px") {
                $(this).addClass(" hamburger");
                $("body").append('<div class="overlay" onclick="closer()"></div>');
                $("menu").css("left", "0px");
                $("body").css({
                    'overflow-y': 'hidden'
                });
            }
        });


        //CLOSE
        $(".close").click(function() {
            $(".overlay").remove();
            if ($("menu").css("left") >= "0px") {
                $(".ham").removeClass(" hamburger");
                $("menu").css("left", "-105%");
                $("body").css({
                    'overflow-y': 'visible'
                });
            }
        });

        function closer(type, el) {
            if (type == "modal") {
                $("." + el).remove();
                return 1;
            }
            $(".overlay").remove();
            if ($("menu").css("left") >= "0px") {
                $(".ham").removeClass(" hamburger");
                $("menu").css("left", "-105%");
                $("body").css({
                    'overflow-y': 'visible'
                });
            }
        }


        //Scroller Nav
        window.onscroll = function() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                $("nav").css("background-color", "var(--dark)");
                document.getElementById("roll_back").style.display = "flex";
            } else {
                $("nav").css("background-color", "transparent");
                document.getElementById("roll_back").style.display = "none";
            }
        }
    </script>
</body>

</html>
