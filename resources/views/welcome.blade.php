<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ asset ('assets/img/iconmasjid.png')}}">
    <title>Pondok Pesantren Modern & Terbaik</title>
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
    h1 {
    font-size: 50px;
}

    h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: auto;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
    }

    body {
        color: white;
    }
    .service_area .single_service {
        background: linear-gradient(to bottom, #000000 0%, #540000 100%);    }
        
        .oyeah{
        background-image: url('/assets/baru/img/banner/.jpg');
    }
    .footer .socail_links ul li a {
        color: #040e27 !important;
        border: 1px solid #040e27;
    }
    body {
        font-family: -webkit-body;
        font-weight: normal;
        font-style: normal;
    }
    .service_area .single_service .info span {
    font-size: 24px;
    color: #fff;
    font-weight: 400;
    display: block;
    margin-bottom: 15px;
    }
    .service_area .single_service .service_content ul li {
    font-size: 16px;
    line-height: 25px;
    color: #fff;
    font-weight: 400;
    position: relative;
    z-index: 0;
    padding-left: 29px;
    }
    .boxed-btn3 {
    background: #28a745;
    color: #fff;
    display: inline-block;
    padding: 11px 29px 13px 29px;
    font-family: "Roboto", sans-serif;
    font-size: 16px;
    font-weight: 500;
    border: 0;
    border: 1px solid transparent;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
    color: #fff !important;
    text-transform: capitalize;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    cursor: pointer;
    }
    .about_area.plus_padding {
    padding-top: 10px;
}
.about_area {
    margin-bottom: 10px;
}
    .service_icon {
    margin: 50px auto 3px auto;
    display: inline-block;
}
    .testimonial_area .single_testmonial .info span {
    color: #7A838B;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
    .service_area {
    padding-top: 15px;
    padding-bottom: 90px;
    }
    .testimonial_area {
    padding: 2px 0;
    }
    .mb-90 {
    margin-bottom: 65px;
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

    </style>
    <style type="text/css">
        body {
            height: 50px;
        }
        
        .back-to-top {
            position: fixed;
            bottom: 93px;
            right: 65px;
            color: #FFF;
            background: #41CAD4;
            line-height: 30px;
            text-align: center;
            text-decoration: none;
            width: 37px;
            height: 38px;
            border: 0;
            border-radius: 50%;
            display: none;
            cursor: pointer;
            z-index: 9999;
        }
        
        .back-to-top:hover {
            background: #2DB6C0;
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
                                                @foreach($doa as $data)
                                                    <li>
                                                        <a href="/doa/{{ $data->slug}}">{{ $data->nama_doa}}</a>
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
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                    </div>
                                    <div class="d-none d-lg-block">
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

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-lg-7">
                         <li><h1>السَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ</h1></li>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <div class="service_area oyeah" background="color: red;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-90">
                    <br>
                        <br><span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><strong> Berita Islam</strong></h3>
                    </div>
                </div>
                <div class="about_area plus_padding">
        <div class="container">
            <div class="row align-items-center">           
            @foreach($artikel as $data)
                <div class="col-lg-6 col-md-6">
                    <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                    <a href="/singleblog/{{$data->slug}}">
                        <img class="img-fluid" src="/assets/img/artikel/{{ $data->foto }}" width="200px" height="300px" alt="">
                    </a>
                    <br>
                    <br>
                    <br>
                    <br>
                    </div>       
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about_info pl-68">
                        <div class="section_title wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".3s">
                            <a href="/singleblog/{{$data->slug}}">
                                <h4>{{$data->judul}}</h4>
                            </a>
                        </div>
                        <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">{{ Str::limit($data->konten,150)}}</p>
                    </div>
                </div>        
                @endforeach
            </div>
        </div>
    </div>
            </div>
          </div>
        </div>
    </div>
    <!-- service_area_start  -->
  
    <div class="testimonial_area">    
        <div class="container">
        <div class="section_title text-center mb-90">
                    <br>
                        <br><span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"> <strong>Tokoh Islam yang Menginspirasi</strong></h3>
                    </div>
            <div class="row">          
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        @foreach($tokoh as $data)
                        <div class="single_carousel">
                            <div class="row">                  
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                        <a href="/tokoh/{{ $data->slug}}">
                                            <img src="/assets/img/tokoh/{{ $data->foto }}" alt="">
                                        </a>
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="info">
                                        <p>" {{Str::limit($data->konten, 280)}}</p>
                                        <a href="/tokoh/{{ $data->slug}}">
                                        <span>- {{$data->nama_tokoh}}</span>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    <div class="service_area oyeah" background="color: red;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-90">
                    <br>
                        <br><span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><strong>Pondok Pesantren</strong></h3>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($pesantren as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <div class="service_icon_wrap text-center">
                            <div class="service_icon ">
                            <img src="../assets/img/ponpes/{{ $data->foto }}" style="width:80%;"alt="">
                            </div>
                        </div>
                        
                        <div class="info text-center">
                            <span>{{$data->judul}}</span>
                        </div>
                        <div class="service_content">
                            <ul>
                            
                                <li>{{Str::limit($data->konten, 260)}} </li>
                               
                            </ul>
                           
                            <div class="apply_btn">
                                <a class="boxed-btn3" href="/pondok/{{$data->slug}}" type="submit">Sekilasnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- service_area_end  -->
    
   
    <!-- about_area_start  -->
    <div class="testimonial_area">    
        <div class="container">
        <div class="section_title text-center mb-90">
                    <br>
                        <br><span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"> <strong>Wali Songo</strong></h3>
                    </div>
                <div class="row">          
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">
                            @foreach($walisongo as $data)
                            <div class="single_carousel">
                                <div class="row">
                                
                                    <div class="col-lg-11">
                                        <div class="single_testmonial d-flex align-items-center">
                                            <div class="thumb">
                                            <a href="/walisongo/{{ $data->slug}}">
                                                <img src="/assets/img/walisongo/{{ $data->foto }}" alt="Image" height="180px" width="70">
                                            </a>
                                                <div class="quote_icon">
                                                    <i class="Flaticon flaticon-quote"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="info">
                                            <p>" {{Str::limit($data->konten, 280)}}</p>
                                            <a href="/walisongo/{{ $data->slug}}">
                                            <span>- {{$data->nama_walisongo}}</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>       
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
    <!-- about_area_end  -->
    
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-90">
                        <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><strong> Kerajaan Islam Di Indonesia</strong></h3>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($kerajaan as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
                        <div class="service_icon_wrap text-center">
                            <div class="service_icon ">
                            
                            <img src="../assets/img/kerajaan/{{ $data->foto }}" alt="Image" height="160">
                            </div>
                        </div>
                        
                        <div class="info text-center">
                            <span>{{$data->nama_kerajaan}}</span>
                        </div>
                        <div class="service_content">
                            <ul>
                                <li>  {{Str::limit($data->konten, 100)}} </li>
                               
                            </ul>
                            <div class="apply_btn">
                                <a class="boxed-btn3" href="/kerajaanislam/{{$data->slug}}" type="submit">Sekilasnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- testimonial_area  -->
    <div class="testimonial_area">    
        <div class="container">
        <div class="section_title text-center mb-90">
                    <br>
                        <br><span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><strong> Gallery Pesantren</strong></h3>
                    </div>
                <div class="row">          
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">
                            @foreach($gallery as $data)
                            <div class="single_carousel">
                                <div class="row">
                                
                                    <div class="col-lg-11">
                                        <div class="single_testmonial d-flex align-items-center">
                                            <div class="thumb">
                                            <a href="/detail/{{ $data->slug}}">
                                                <img src="/assets/img/ponpes/{{ $data->foto }}" alt="Image" height="190px" width="80">
                                            </a>
                                                <div class="quote_icon">
                                                    <i class="Flaticon flaticon-quote"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="info">
                                            <p>" {{Str::limit($data->konten, 280)}}</p>
                                            <a href="/detail/{{ $data->slug}}">
                                            <span>- {{$data->judul}}</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>       
                </div>
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
                                        <a href="https://www.instagram.com/farhan.putra29/?hl=id">
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
                                <li><a href="/kontak"> Contact</a></li>
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
                    <a href class="back-to-top hidden-md-down" style="display: block;">
                     <i class="fa fa-angle-up fa-2x"></i>
                    </a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){ 
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 1500) {
                    $('.back-to-top').fadeIn();
                } else {
                    $('.back-to-top').fadeOut();
                }
            });
            
            $('.back-to-top').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({scrollTop: 0}, 600);
            });
        });
        </script>

</body>

</html>