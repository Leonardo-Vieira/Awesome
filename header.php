<nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="index.php">
                    <img class="header-image" src="images/Awesome.jpg">
                </a>
            </div>
            <div class="text-right">
                <ul>
                    <?php 
                        if(isset($_SESSION['u_id'])){
                            echo '<form action="includes/logout.php" method="post">
                                    <li><button type="submit" name="submit">Logout</button></li>
                                    <li><a href="./perfil.php">Perfil</a></li>
                                    <li class="btn-cta has-dropdown">
                                        <a><span>Categorias:</span></a>
                                        <ul class="dropdown">
                                            <li><a href="./animes.php">Animes</a></li>
                                            <li><a href="./carros.php">Carros</a></li>
                                            <li><a href="./natureza.php">Natureza</a></li>
                                            <li><a href="./animais.php">Animais</a></li>
                                        </ul>
                                    </li>
                                  </form>';
                        } else {
                            echo '<form action="includes/login.php" method="post">
                                    <li><a href="signup.php">Registar</a></li>
                                    <li class="btn-cta has-dropdown">
                                        <a><span>Categorias:</span></a>
                                            <ul class="dropdown">
                                                <li><a href="./animes.php">Animes</a></li>
                                                <li><a href="./carros.php">Carros</a></li>
                                                <li><a href="./natureza.php">Natureza</a></li>
                                                <li><a href="./animais.php">Animais</a></li>
                                            </ul>
                                    </li>
                                  </form>';
                        }                             
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>