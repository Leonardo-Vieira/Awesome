<?php
    session_start();
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Awesome &mdash; Animes</title>

        <!-- Animate.css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="css/icomoon.css">
        <!-- Themify Icons-->
        <link rel="stylesheet" href="css/themify-icons.css">
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
        <script src="js/disable_right_click.js"></script>
    </head>

    <body>
        <div class="gtco-loader"></div>
        <div id="page">
            <div class="page-inner">
                <?php 
                    include 'header.php';
                ?>
                <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/wallpaper.jpg)">
                    <div class="overlay"></div>
                    <div class="gtco-container">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0 text-left">
                                <div class="row row-mt-15em">
                                    <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
                                        <h1>Animes</h1>
                                        <!--                                                <button onclick="printSomething()">jhagfjg</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="gtco-section">
                    <div class="gtco-section">
                        <div class="gtco-container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
                                    <p>Aqui podemos encontrar alguns wallpapers de Animes</p>
                                </div>
                            </div>
                            <?php
                                include './includes/dbh.php';

                                    $query = $conn->query("SELECT * FROM animes ORDER BY animes_uploaded_on ASC");

                                    if($query->num_rows > 0){
                                        while($row = $query->fetch_assoc()){
                                            $imageURL = 'uploads/animes/'.$row['animes_file_name'];
                                            $image = $row['animes_file_name'];

                                            echo '
                                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                                        <a href="'.$imageURL.'" class="fh5co-project-item image-popup">
                                                            <img src="'.$imageURL.'" alt="Image" class="img-responsive">
                                                        </a>
                                                        <form action="'.$imageURL.'" method="get" >
                                                            <div class="fh5co-text">
                                                                <a class="button_image btn btn-primary" role="button" href="'.$imageURL.'" download="'.$imageURL.'">Download</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                ';
                                                if($row['animes_id'] % 3 == 0){
                                                    echo'<div style="padding-top: 270px"><div>';
                                            }
                                        }
                                    } else {
                                        echo'<p>No image(s) found...</p>';
                                    }
                               ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer id="gtco-footer" role="contentinfo">
            <div class="gtco-container">
                <form action="includes/upload.php" method="post" enctype="multipart/form-data">
                    <?php
                    if(isset($_SESSION['u_id'])){
                        if($_SESSION['u_id'] == 1){
                            ?>
                        <input id="file" type="file" name="file" class="button_image btn btn-primary">
                        <input type="submit" class="button_image btn btn-primary" value="Upload" name="submit" onclick="FileType(this.form.file.value, ['gif', 'jpg', 'png', 'jpeg', 'JPG', 'GIF', 'JPG', 'PNG', 'JPEG'])">
                        <?php            
                        }
                    }
                    ?>
                </form>
            </div>
        </footer>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
        </div>

        <script type="text/JavaScript">
            function FileType( fileName, fileTypes ) { if (!fileName) return; dots = fileName.split(".") //get the part AFTER the LAST period. fileType = "." + dots[dots.length-1]; return (fileTypes.join(".").indexOf(fileType) != -1) ? alert('Upload feito com sucesso!') : alert("Porfavor selecione um ficheiro do tipo: \n\n" + (fileTypes.join(" ."))); }
        </script>

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
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>
    </body>

    </html>