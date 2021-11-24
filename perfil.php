<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Perfil</title>
    <link rel="shortcut icon" href="img/sugar.png"/>
    <link href="style/geral.css" rel="stylesheet"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <?php
      include_once "header.php";
    ?>

    <?php        
      if (isset($_SESSION["usuarioUsername"])) {

      echo '<h3>Perfil</h3>        
        <div class="container tabela">
          <div class="row">
            <div class="col col col-lg-2"><b>Nome</b></div>
            <div class="col">' . $_SESSION["usuarioNome"] . '</div>
          </div>
          <div class="row">
            <div class="col col-lg-2"><b>Usuário</b></div>
            <div class="col">' . $_SESSION["usuarioUsername"] . '</div>
            <div class="col col col-lg-2"><a href=#>Alterar</a></div>
          </div>
          <div class="row">
            <div class="col col-lg-2"><b>Email</b></div>
            <div class="col">' . $_SESSION["usuarioEmail"] . '</div>
            <div class="col col col-lg-2"><a href=#>Alterar</a></div>
          </div>
          <div class="row">
            <div class="col col-lg-2"><b>Senha</b></div>
            <div class="col">******</div>
            <div class="col col col-lg-2"><a href=#>Alterar</a></div>
          </div>
        </div>';
      } else {
        header("location: tela-inicial.php");
        exit();
      }
    ?>    

  </body>
</html>