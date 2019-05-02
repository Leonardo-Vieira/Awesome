<?php
    session_start();
    if(!isset($_SESSION['u_id']))
    {    
?>
<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="utf-8">
		<title>Awesome &mdash; Registo</title>	
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">
		<script src="js/disable_right_click.js"></script>
	</head>
	<body>
    <div id="page">
        <div class="page-inner">
                <?php 
                    include_once 'header.php';
                ?>
            <header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/wallpaper.jpg)">
                <div class="gtco-container" style="margin-left: 30%; margin-right: 30%;">
                    <div class="row">
                        <div style="margin-top: 10em">
                            <div class="text-center">
                                <h1 style="margin-bottom: 20px">Registo</h1>
                            </div>
                        </div>
                        <div class="col-md-12 text-left">
                            <div class="overlay"></div>
                            <div class="form-wrap">
                                <div class="tab">
                                    <div class="tab-content">
                                        <div class="white tab-content-inner active" data-content="signup">
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="username">Nome Completo</label>
                                                    <input placeholder="João Ferreira da Silva" id="username" type="text" class="white form-control" name="username" />
                                                </div>
                                            </div>
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
                                                    <label for="password2">Repetir Password</label>
                                                    <input id="password2" type="password" class="white form-control" name="password2" />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary" value="Confirmar" name="submit" onclick="inserir_registo()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        
        <script type="text/javascript">
            function inserir_registo(){
                //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
                var dadosajax = {
                    'username': $("#username").val(),
                    'email': $("#email").val(),
                    'password': $("#password").val(),
                    'password2': $("#password2").val()
                };
                
               // console.log(dadosajax);
                
                pageurl = 'includes/signup.inc.php';
                $.ajax({
                    //url da pagina
                    url: pageurl,
                    //parametros a passar
                    data: dadosajax,
                    //tipo: POST ou GET
                    type: 'POST',
                    success: function(data) {
                            console.log("---->" + data);
                            //alert(data);
                        if(data==="1"){
                            //console.log("---\\\\\\\\\\\\\\\\\\\->" + data);
                            alert("O seu registo foi inserido com sucesso!");
                            window.location.href = "index.php";
                            
                        } else if(data==="email"){
                            console.log("---\\\\\\\\\\\\\\\\\\\->" + data);
                            alert("Email inválido ou já resistado!");
                            
                        } else if(data==="password"){
                            console.log("---\\\\\\\\\\\\\\\\\\\->" + data);
                            alert("As password's não são iguais, porfavor confirme novamente!");
                            
                        } else if(data==="0"){
                            console.log("---\\\\\\\\\\\\\\\\\\\->" + data);
                            alert("Porfavor preencha todos os campos!");
                        }
                    },
                    error: function() {
                        
                        alert('Erro: Inserir Registo!!');
                    }
                });
            }
        </script>
        
        <!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>
    </div>
</body>
</html>
<?php 
    }else{
        header('Location: ./index.php');
    } 
?>