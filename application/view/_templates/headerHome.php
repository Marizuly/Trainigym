<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Energym Xtreme</title>
    <link rel="icon" href="images/lpesa.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>css/estilo.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL ?>css/login.css">
    <link href="<?= URL ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= URL ?>css/flexslider.css" rel="stylesheet" type="text/css" />
    <link href="<?= URL ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link href="<?= URL ?>css/animate.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?= URL ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?= URL ?>css/style.css" rel="stylesheet" type="text/css"/>

    <!-- FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,700,500,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- SCRIPTS -->
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="en"> <![endif]-->

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="js/superfish.min.js" type="text/javascript"></script>
    <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
    <script src="js/owl.carousel.js" type="text/javascript"></script>
    <script src="js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
    <script src="js/animate.js" type="text/javascript"></script>
    <script src="js/jquery.BlackAndWhite.js"></script>
    <script src="js/myscript.js" type="text/javascript"></script>
    <script>
        //PrettyPhoto
        jQuery(document).ready(function() {
            $("a[rel^='prettyPhoto']").prettyPhoto();
        });

        //BlackAndWhite
        $(window).load(function() {
            $('.client_img').BlackAndWhite({
                hoverEffect: true, // default true
                // set the path to BnWWorker.js for a superfast implementation
                webworkerPath: false,
                // for the images with a fluid width and height 
                responsive: true,
                // to invert the hover effect
                invertHoverEffect: false,
                // this option works only on the modern browsers ( on IE lower than 9 it remains always 1)
                intensity: 1,
                speed: { //this property could also be just speed: value for both fadeIn and fadeOut
                    fadeIn: 300, // 200ms for fadeIn animations
                    fadeOut: 300 // 800ms for fadeOut animations
                },
                onImageReady: function(img) {
                    // this callback gets executed anytime an image is converted
                }
            });
        });
    </script>

</head>

<body>

        <!-- PAGE -->
        <div id="page">

            <!-- HEADER -->
            <header>

                <!-- MENU BLOCK -->
                <div class="menu_block" style="background-color: white">

                    <!-- CONTAINER -->
                    <div class="container clearfix">

                        <!-- LOGO -->
                        <div class="logo pull-left">
                            <a href="#"><img src="images/logox.png" class="Logo" title="Energym Xtreme" alt="Energym Xtreme" width="150px"></a>
                        </div>
                        <!-- //LOGO -->

                        <!-- MENU -->
                        <div class="pull-right">
                            <nav class="navmenu center">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="first active scroll_btn"><a href="#home">Inicio</a></li>
                                    <li class="scroll_btn"><a href="#about">Nosotros</a></li>
                                    <li class="scroll_btn"><a href="#projects">Clases</a></li>
                                    <li class="scroll_btn"><a href="#team">Membresías</a></li>
                                    <li class="scroll_btn"><a href="#news">Programación</a></li>
                                    <li class="scroll_btn"><a href="#contacts">Contacto</a></li>
                                    <li class="scroll_btn"><a href="login">Inicio de sesión</a></li>

                                </ul>
                            </nav>
                        </div>
                        <!-- //MENU -->
                    </div>
                    <!-- //MENU BLOCK -->
                </div>
                <!-- //CONTAINER -->
            </header>
            <!-- //HEADER -->