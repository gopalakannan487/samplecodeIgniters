
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!--====== Title ======-->
        <title>Vallu Innovation</title>

        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" type="image/png" />

        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/bootstrap.min.css" />

        <!--====== Animate css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/animate.css" />

        <!--====== Fontawesome css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/font-awesome.min.css" />

        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/magnific-popup.css" />

        <!--====== Nice Select css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/nice-select.css" />

        <!--====== Slick css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/slick.css" />

        <!--====== Default css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/default.css" />

        <!--====== Style css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/style.css" />

        <!--====== Responsive css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/responsive.css" />

        <!--====== Sweetalert css ======-->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/sweet-alert.css" />


        <!--====== Datatable css ======-->
        <!-- <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/datatable.css" /> -->
        <link rel="stylesheet" href="<?php echo base_url('')?>/assets/css/dataTables.bootstrap4.min.css" />


        <!--====== jquery js ======-->
        <script src="<?php echo base_url('')?>/assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="<?php echo base_url('')?>/assets/js/vendor/jquery-1.12.4.min.js"></script>


        <!--====== validation js ======-->
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    </head>

    <body>
        
        <!--====== PRELOADER PART START ======-->

        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>

        <!--====== PRELOADER PART ENDS ======-->



        <!--====== Header PART START ======-->


        <section class="header_area">
            <div class="header_top">
                <div class="container">
                    <div class="header_top_wrapper d-flex justify-content-center justify-content-md-between">
                        <div class="header_top_info d-none d-md-block">
                            <ul>
                                <li><img src="<?php echo base_url('')?>/assets/images/call.png" alt="call" /><a href="#">+91 458 654 528</a></li>
                                <li><img src="<?php echo base_url('')?>/assets/images/mail.png" alt="mail" /><a href="#">info@example.com</a></li>
                            </ul>
                        </div>
                        <div class="header_top_login">
                            <ul>
                                <li><a href="<?php echo base_url('Welcome/caccount')?>">Create An Account</a></li>
                                <li>
                                    <a href="<?php echo base_url('Welcome/login')?>" class="main-btn"  ><i class="fa fa-user-o"></i> Log In</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header_menu" >
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="<?php echo base_url('welcome')?>">
                            <img src="<?php echo base_url('')?>/assets/images/logo.png" alt="logo" />
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li>
                                    <a class="active" href="<?php echo base_url('welcome')?>">Home <i class="fa fa-chevron-down"></i></a>

                                    <ul class="sub-menu">
                                        <li><a class="active" href="<?php echo base_url('welcome')?>">Home 01</a></li>
                                   <!--      <li><a href="index-2.html">Home 02</a></li>
                                        <li><a href="index-3.html">Home 03</a></li>
                                        <li><a href="index-4.html">Home 04</a></li> -->
                                    </ul>
                                </li>
                        
                                <li>
                                    <a href="about.html">About</a>
                                </li>
                                <li>
                                    <a href="courses.html">Courses <i class="fa fa-chevron-down"></i></a>

                                    <ul class="sub-menu">
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="courses-details.html">Courses Details</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">Blog <i class="fa fa-chevron-down"></i></a>

                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                             
                            </ul>
                        </div>

                        <div class="navbar_meta">
                            <ul>
                                <li>
                                    <a id="search" href="#"><img src="<?php echo base_url('')?>/assets/images/search.png" alt="search" /></a>
                                    <div class="search_bar">
                                        <input type="text" placeholder="Search" />
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo base_url('')?>/assets/images/cart.png" alt="cart" /> <span>0</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </section>

        <!--====== Header PART ENDS ======-->
