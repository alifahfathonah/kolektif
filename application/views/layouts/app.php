<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Kolektif Industri</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="assets/brand.ico">

        <?php loadCss([
            'css/bootstrap.min.css',
            'css/metismenu.min.css',
            'css/icons.css',
            'css/style.css'
        ]); ?>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span  class="logo-light">
                            <img src="assets/brand.svg" alt=""> Kolektifindustri.com
                        </span>
                        <span class="logo-sm">
                            <img src="assets/brand.svg" alt="">
                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> My Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline menu-left mb-0">
                        <li class="d-none d-md-inline-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="left side-menu">
                <div class="pinggiran-buku">
                    <div class="line line-md"></div>
                    <div class="line line-lg"></div>
                </div>
                <div class="slimscroll-menu" id="remove-scroll">
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="javascript:void(0);" class="waves-effect mm-active"><i class="menu-icon icon-mail-open"></i><span> Dashboard <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li class="mm-active"><a href="email-inbox.html">Inbox</a></li>
                                    <li><a href="email-read.html">Email Read</a></li>
                                    <li><a href="email-compose.html">Email Compose</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="menu-icon icon-mail-open"></i><span> Dashboard <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="email-inbox.html">Inbox</a></li>
                                    <li><a href="email-read.html">Email Read</a></li>
                                    <li><a href="email-compose.html">Email Compose</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <div class="clearfix"></div>

                </div>

            </div>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                        </div>
                        <?php $this->load->view($view, $params); ?>
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

                <footer class="footer">
                    © 2019 Kolektif Industri <span class="d-none d-sm-inline-block"></span>.
                </footer>

            </div>

        </div>
        
        <?php loadJs([
            'js/jquery.min.js',
            'js/bootstrap.bundle.min.js',
            'js/metismenu.min.js',
            'js/jquery.slimscroll.js',
            'js/waves.min.js',
            'js/app.js',
        ]); ?>

        <script>
            $(document).ready(function(){
                $('.pinggiran-buku').click(function(){
                    $('body').toggleClass("enlarged")
                })
            })
        </script>
        
    </body>

</html>