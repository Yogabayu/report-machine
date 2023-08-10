<!DOCTYPE html>
<html lang="en">

<head>

    <title>Reporting Machine</title>

    <!--SHORTCUT ICON-->
    <link rel="shortcut icon"
        href="https://yogabayuap.com/wp-content/uploads/2022/12/cropped-Untitled-1-removebg-preview-32x32.png" />

    {{-- META TAGS --}}
    <meta charset="UTF-8" />
    <meta name="language" content="ES" />
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
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <!--PLUGIN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>

    <!--NAV-->
    <nav class="flex">
        <figure class="logo"><img
                src="https://yogabayuap.com/wp-content/uploads/2022/12/cropped-cropped-cropped-Untitled-1-removebg-preview-1-e1671589794331.png"
                alt="LOGO." /></figure>
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
            <h1 class="title big"> <em>Reporting Machine</em> untuk kebutuhan anda<em>.</em> </h1>
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
        {{-- <!--DIVISION_1-->
        <div class="divisions division_1 flex padding_2x">
            <section class="flex_content padding_2x">
                <figure>
                    <img src="https://i.postimg.cc/qqt4ntzz/01.jpg" alt="" loading="lazy" />
                </figure>
            </section>
            <section class="flex_content padding_2x">
                <article>
                    <h2 class="title medium">Let's make your Report better.</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing hidden in the middle of text. </p>
                    <aside class="fixed_flex">
                        <span>
                            <h4 class="title small">200+</h4>
                            <p>New Furnitures</p>
                        </span>
                        <span>
                            <h4 class="title small">100+</h4>
                            <p>Recycled Products</p>
                        </span>
                    </aside>
                </article>
            </section>
        </div>

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
            <a href="https://www.facebook.com/bayu.angin.39/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/yogabayu.ap/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://id.linkedin.com/in/yoga-bayu-anggana-pratama" target="_blank"><i
                    class="fa fa-linkedin"></i></a>
            <a href="https://www.youtube.com/channel/UC3PRXW7Wqjy_7oZIM-BNOAQ" target="_blank"><i
                    class="fa fa-youtube"></i></a>
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
    <script src="{{ asset('assets') }}/js/script.js"></script>
</body>

</html>
