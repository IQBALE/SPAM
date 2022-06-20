<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aesthetic Template">
    <meta name="keywords" content="Aesthetic, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('judul')</title>

    <!-- Google Font -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="fb18bfa4-b7b5-4564-9ca3-d77e3de4c265";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="./"><img src="img/panacea-logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__btn">
            <a href="logout" class="primary-btn">Logout</a>
        </div>
    </div>
    <!-- Header Section Begin -->
    <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="header__logo">
                                <a href="./"><img src="img/panacea-logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="header__menu__option">
                                <nav class="header__menu">
                                    <ul>
                                        <li><a href="pendaftaran">Pendaftaran</a></li>
                                        <li><a href="hasiltest">Hasil Test</a></li>
                                        <li><a href="kritiksaran">Kritik & Saran</a></li>
                                        <li><a href="datadiri">Data Diri</a></li>
                                    </ul>
                                </nav>
                                <div class="header__btn">
                                    <a href="logout" class="primary-btn">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="canvas__open">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
            </header>
            <!-- Header Section End -->

        <!-- Hero Section Begin -->
    <!-- Header Section End -->

    @yield('konten')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-panacea-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class=" col-lg-4 col-md-12 footer__address">
                        <h5>Contact Us</h5>
                            <ul>
                                <li><i class="fa fa-map-marker"></i> JL. MT. Haryono, Blok. AB 2 No. 18 – 20, Komplek Mal Fantasi, Gn. Bahagia, Balikpapan Sel., Kota Balikpapan, Kalimantan Timur 76114</li>
                                <li><i class="fa fa-phone"></i> +62542877898</li>
                                <li><i class="fa fa-globe"></i> http://www.klinik-panacea.net/</li>
                            </ul>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.877137425861!2d116.85784931475403!3d-1.2445335990922535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1472fb113030f%3A0x1adeba519537d232!2sKlinik%20Panacea!5e0!3m2!1sid!2sid!4v1619245094688!5m2!1sid!2sid"  height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="footer__copyright__text">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | PANACEA</p>
                        </div>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
                        
    <!-- Js Plugins -->
   
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>