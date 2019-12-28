<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> <?= isset($title) ? $title .' - ' : '' ?> Kolektif Industri</title>
        <meta content="ERP by Kolektifindustri.com Built by Dodolantech" name="description" />
        <meta content="Dodolan Tech" name="author" />
        <link rel="shortcut icon" href="<?=base_url()?>/assets/brand.ico">

        <?php loadCss([
            'css/bootstrap.min.css',
            'css/metismenu.min.css',
            'css/icons.css',
            'css/style.css',
            // 'plugins/bselect/css/bootstrap-select.min.css'
            'plugins/select2/select2.css'
        ]); ?>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="<?=base_url()?>" class="logo">
                        <span  class="logo-light">
                            <img src="<?=base_url()?>/assets/brand.svg" alt=""> Kolektifindustri.com
                        </span>
                        <span class="logo-sm">
                            <img src="<?=base_url()?>/assets/brand.svg" alt="">
                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?=base_url()?>/assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="<?=base_url()?>profile"><i class="mdi mdi-account-circle"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <?= form_open(base_url('site/logout'))  ?>
                                        <button class="dropdown-item text-danger" type="submit"><i class="mdi mdi-power text-danger"></i> Logout</button>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline menu-left mb-0">
                        <li class="d-none d-md-inline-block">
                            <form role="search" action="" method="get" class="app-search">
                                <div class="form-group mb-0">
                                    <input name="search_key" type="text" value="<?=isset($_GET['search_key']) ? $_GET['search_key']: null?>" class="form-control" placeholder="Search..">
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
                            <?= $createMenus; ?>
                        </ul>

                    </div>
                    <div class="clearfix"></div>

                </div>

            </div>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title"><?= isset($title) ? $title : '' ?></h4>
                                </div>
                                <div class="col-sm-6">
                                    <?php breadcrumbs($thisRoute) ?>
                                </div>
                            </div>
                            <!-- end row -->
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
            'plugins/alertify/js/alertify.js',
            'plugins/select2/select2.min.js',
            // 'plugins/bselect/js/bootstrap-select.min.js'
        ]); ?>

            
        <?php
            if ($this->session->flashdata('success') != null) {
                echo '<script>
                alertify.success("'.$this->session->flashdata('success').'");
                </script>';
            };
            
            if ($this->session->flashdata('error') != null) {
                echo '<script>
                alertify.error("'.$this->session->flashdata('error').'");
                </script>';
            };
        ?>
        

        <script>
            $(document).ready(function(){
                var flag = false;
                var status = $('#formPosSo').find('#state').attr('data-val')
                var btn = $('#formPosSo').find('input[type="submit"]')
                // alert(status)
                if (status!=0) {
                    btn.val('Form has been proceed')
                    btn.removeClass("btn-success")
                    btn.addClass("disabled")
                    $('#addNewLine').remove()
                    $('.deleteBtn').remove()
                    $('#formPosSo').find('#state').removeAttr('id')
                }
                $("#state").click(function(){
                    if ($(this).prop('checked')) {
                        btn.val('Save Permanently')
                    }
                    else{
                        btn.val('Save as Draft')
                    }
                })
                $('#formPosSo').submit(function(e){
                    var id = $(this)
                    var ischecked = $('#formPosSo').find('#state').prop('checked')
                    if (status!=0) {
                        e.preventDefault()
                        return false
                    }
                    else if (!flag && ischecked) {
                        alertify.confirm("Are you sure want to permanently save? ", function() {
                            flag = true;
                            id.submit()
                        }, function(ev) {
                            flag = false;
                            ev.preventDefault();
                            return false
                        });
                        e.preventDefault()
                    }
                })
                $('.parsley-error').change(function(){
                    $(this).removeClass("parsley-error")
                })
                $('select').select2()
                $(".deleteData").submit(function(e){
                    var id = $(this)
                    if (!flag) {
                        alertify.confirm("Are you sure want to complete this action?", function() {
                            flag = true;
                            id.submit()
                        }, function(ev) {
                            flag = false;
                            ev.preventDefault();
                            return false
                        });
                        e.preventDefault()
                    }
                })
                $('.pinggiran-buku').click(function(){
                    $('body').toggleClass("enlarged")
                })
            })
            function closeEditor(e){
                // var sibling = e.parents('td').siblings('.polineQty')
                e.remove()
                
                $('.editPoline').show()
            }
            function submit(){

            }
        </script>
        
    </body>

</html>