<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>FCT Online</title>
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <div class="gtco-loader"></div>

    <div id="page">
        <div class="page-inner">
            <?php
    
        include 'header.php';
    
    ?>

                <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_4.jpg)">
                    <div class="overlay"></div>
                    <div class="gtco-container">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0 text-left">
                                <div class="row row-mt-15em">

                                    <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                                        <span class="intro-text-small">Don't be shy</span>
                                        <h1>Get In Touch</h1>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </header>

                <div class="gtco-section border-bottom">
                    <div class="gtco-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6 animate-box">
                                    <h3>Get In Touch</h3>
                                    <form action="#">
                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <label class="sr-only" for="name">Name</label>
                                                <input type="text" id="name" class="form-control" placeholder="Your firstname">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <label class="sr-only" for="email">Email</label>
                                                <input type="text" id="email" class="form-control" placeholder="Your email address">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <label class="sr-only" for="subject">Subject</label>
                                                <input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-md-12">
                                                <label class="sr-only" for="message">Message</label>
                                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Send Message" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
        include 'footer.php';
    ?>
        </div>

    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>

</body>

</html>