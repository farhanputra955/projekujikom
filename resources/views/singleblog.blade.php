<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ asset ('assets/img/berita.png')}}">
    <title>Berita Islam</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/baru/css/slicknav.css')}}">

    <link rel="stylesheet" href="{{ asset ('assets/baru/css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
        h1, h2, h3, h4, h5 {
    font-family: fantasy;
    color: rgb(255, 255, 255);
}
    </style>

    <style>
        body {
    font-family: cursive;
    font-weight: normal;
    font-style: normal;
}

    </style>

    <style>
        p {
    font-size: 22px;
    font-weight: 400;
    line-height: 32px;
    color: #7A838B;
    margin-bottom: 13px;
    font-family: sans-serif;
}
    </style>
    <style>
   .footer .socail_links ul li a {
    color: #f91842 !important;
    border: 1px solid #040e27;
    }
    .blog-info-link li {
        float: left;
        font-size: 17px;
    }
    .blog-info-link li a {
        color: #8a0000;
    }
    h1, h2, h3, h4, h5 {
    font-family: auto;
    color: #181b35;
}
.blog_details h2 {
    font-size: 24px;
    margin-bottom: 25px;
}
.blog_details {
    padding: 30px 30px 35px 35px;
}
p {
    font-size: 16px;
    font-weight: 400;
    line-height: 32px;
    color: #5d646b;
    margin-bottom: 13px;
    font-family: sans-serif;
}
.blog_details p {
    margin-bottom: 0.1px;
    font-family: "Roboto", sans-serif;
}
.blog_details {
    padding: 40px 30px 30px 30px;
}
.blog_right_sidebar .single_sidebar_widget {
    background: #3F51B5;
    padding: 30px;
    margin-bottom: 30px;
}
.header-area .main-header-area .main-menu ul li a {
    color: #fff;
    font-size: 13px;
    text-transform: capitalize;
    font-weight: 500;
    display: grid;
    padding: 35px 0px 30px 0px;
    font-family: "Roboto", sans-serif;
    position: relative;
    text-transform: capitalize;
}
.blog_details h2 {
    font-size: 24px;
    margin-bottom: 1px;
}
    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                              <li><a href="/">home</a></li>
                                          
                                            <li><a href="#">Pondok Pesantren <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                @foreach($provinsi as $data)
                                                    <li>
                                                        <a href="/provinsi/{{ $data->slug}}">{{ $data->nama_provinsi}}</a>
                                                    </li>
                                                @endforeach 
                                                </ul>
                                                <li><a href="#"> Doa Harian <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                @foreach($doaseharihari as $data)
                                                    <li>
                                                        <a href="/doaseharihari/{{ $data->slug}}">{{ $data->nama_doa}}</a>
                                                    </li>
                                                @endforeach 
                                                
                                                </ul>
                                                <li><a href="#"> Kisah <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                @foreach($kisah as $data)
                                                    <li>
                                                        <a href="/kisah/{{ $data->slug}}">{{ $data->nama_kisah}}</a>
                                                    </li>
                                                @endforeach 
                                                
                                                </ul>
                                              
                                                <li><a href="/kerajaan">Kerajaan Islam</a></li>
                                                
                                            <li><a href="/gallery">Gallery</a></li>
                                            <li><a href="/kontak">Kontak</a></li>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                         
                          <div class="col-12">
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                     
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

      <!-- bradcam_area  -->
      <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Berita</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    
    <!-- about_area_start  --> 
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="../assets/img/artikel/{{ $artikel->foto }}" alt="">               
                            </div>
                            <br>
                            <br>
                            <ul class="blog-info-link"> 
                            <li><a href="#"><i class=""></i></a></li>                           
                                    @foreach($kategori as $data)
                                    <li><a href="/kategori/{{ $data->slug}}"><i class="fa fa-newspaper-o" style="font-size:20px"></i> {{$data->nama_kategori}}</a></li>
                                    @endforeach
                            <li><a href="#"><i class=""></i></a></li>       
                            </ul>
                            <div class="blog_details">                              
                                <h2>{{$artikel->judul}}</h2>                              
                                <p> &nbsp;&nbsp;&nbsp;&nbsp;{!!$artikel->konten!!}</p>               
                            </div>
                         
                        </article>
                    </div>
                </div>
            </div>
        </div>
</section>

    <!-- testimonial_area  -->

       
    <!-- /testimonial_area  -->

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/footer_logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                farhanputra955@gmail.com <br>
                               0895 3201 02320 <br>
                                Bandung City, Indonesia
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                            <h3 class="footer_title">
                                Services
                            </h3>
                            <ul>
                                <li><a href="#">SEO/SEM </a></li>
                                <li><a href="#">Web design </a></li>
                                <li><a href="#">Ecommerce</a></li>
                                <li><a href="#">Digital marketing</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                            <h3 class="footer_title">
                                Useful Links
                            </h3>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#"> Contact</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="{{ asset ('assets/baru/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/popper.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/ajax-form.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/waypoints.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/scrollIt.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/wow.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/nice-select.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/plugins.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/gijgo.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/slick.min.js')}}"></script>



    <!--contact js-->
    <script src="{{ asset ('assets/baru/js/contact.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.form.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset ('assets/baru/js/mail-script.js')}}"></script>


    <script src="{{ asset ('assets/baru/js/main.js')}}"></script>
</body>

</html>