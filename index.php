<?php
    session_start();
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Awesome</title>

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

        <!--Responsive Slides-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/responsiveslides.min.js"></script>
        <link rel="stylesheet" href="css/responsiveslides.css">

        <!-- Modernizr JS -->
        <script src="js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->
        <script src="js/disable_right_click.js"></script>

    </head>

    <body>
        <div class="page-inner">
            <?php 
                    include_once 'header.php';
                ?>
        </div>
        <header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/wallpaper.jpg);">
            <div class="gtco-container" style="margin-left: 30%; margin-right: 30%;">
                <div class="row">
                    <div style="margin-top: 10em">
                        <div class="text-center">
                            <h1 style="margin-bottom: 20px">Awesome</h1>
                        </div>
                    </div>

                    <div class="col-md-12 text-left">
                        <?php if(!isset($_SESSION['u_id'])){ ?>
                        <div class="overlay"></div>
                        <div class="form-wrap">
                            <div class="tab">
                                <div class="tab-content">
                                    <div class="white tab-content-inner active" data-content="signup">
                                        <form method="POST">
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="email">Email</label>
                                                    <input id="email" placeholder="exemplo@gmail.com" type="email" class="white form-control" name="email" />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" class="white form-control" name="password" />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary" value="Confirmar" onclick="inserir_login()" name="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else { 
                           echo '
                                   <div class="text-center animate-box white">
                                        <h1 style="padding-top: 2em"> Seja Bem vindo ' .$_SESSION["u_username"]. '</h1>
                                        <p style="padding-top: 2em"> Aproveite a oportunidade para fazer upload dos seus Wallpapers</p>
                                   </div>
                            ';
                             } ?>
                    </div>
                </div>
                <div style="padding-top:140px; padding-bottom:70px;">
                <ul id="slider3">
                    <?php
                    include './includes/dbh.php';

                        $query = $conn->query("SELECT * FROM wallpapers ORDER BY wp_uploaded_on ASC");

                        if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                                $imageURL = 'uploads/wallpapers/'.$row['wp_file_name'];
                                $image = $row['wp_file_name'];

                                echo '
                                        <li><img src="'.$imageURL.'" height="330px" width="170px"></li>
                                    ';
                            }
                        } else {
                            echo'<p>No image(s) found...</p>';
                        }
                   ?>
                </ul>
                </div>
                <ul id="slider3-pager">
                <?php
                    include './includes/dbh.php';

                        $query = $conn->query("SELECT * FROM wallpapers ORDER BY wp_uploaded_on ASC");

                        if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                                $imageURL = 'uploads/wallpapers/'.$row['wp_file_name'];
                                $image = $row['wp_file_name'];

                                echo '
                                        <li><a href="#"><img src="'.$imageURL.'" height="50px" width="70px"></a></li>
                                    ';
                            }
                        } else {
                            echo'<p>No image(s) found...</p>';
                        }
                   ?>
                   </ul>
            </div>
        </header>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
        </div>

        <script type="text/javascript">
            function inserir_login() {

                //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
                var dadosajax = {
                    'email': $("#email").val(),
                    'password': $("#password").val()
                };
                pageurl = 'includes/login.php';
                //para consultar mais opcoes possiveis numa chamada ajax
                //http://api.jquery.com/jQuery.ajax/
                $.ajax({
                    //url da pagina
                    url: pageurl,
                    //parametros a passar
                    data: dadosajax,
                    //tipo: POST ou GET
                    type: 'POST',
                    //cache
                    cache: false,
                    success: function(data) {
                        //console.log("---->" + data);
                        //alert(data);
                        if (data == "1") {
                            alert("O seu registo foi inserido com sucesso!");
                        } else {
                            alert("Ocorreu um erro ao iníciar sessão, porfavor tente novamente!");
                        }
                    },
                    error: function() {
                        alert('Erro: Inserir Registo!!');
                    }
                });
            }
        </script>

        <script>
           $("#slider3").responsiveSlides({
                manualControls: '#slider3-pager',
                maxwidth: 540
            });
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
        <!-- countTo -->
        <script src="js/jquery.countTo.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>
    </body>
    </html