<?php
  session_start();
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="tela-inicial.php">
                <img
                    src="img/sugar.png"
                    alt="colher de açúcar sendo servida em uma xícara"
                    width="30"
                    height="30"
                    class="d-inline-block align-text-top"
                />
                <p>Xícara de Açúcar</p>
            </a>
            <div class="collapse navbar-collapse" id="navPrimaria">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="tela-inicial.php">Página Inicial</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navSecundaria">
                <ul class="navbar-nav">

                    <?php
                        if (isset($_SESSION["usuarioUsername"])) {
                            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="perfil.php">Perfil</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php">Sair</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="cadastro.php">Cadastro</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="login.php">Entrar</a></li>';
                        }
                    ?>

                </ul>            
            </div>
        </div>
    </nav>
</header>