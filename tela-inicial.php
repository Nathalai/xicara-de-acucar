<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Entrar</title>
        <link rel="shortcut icon" href="img/sugar.png"/>
        <link href="style/geral.css" rel="stylesheet"/>
        <link href="style/tela-inicial.css" rel="stylesheet"/>
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

      <section>
        <?php
          if (isset($_SESSION["usuarioUsername"])) {
            echo '<p>Olá ' . $_SESSION["usuarioUsername"] . '!</p>';
          } else {
            echo '<p>Disponibilize itens ou pegue emprestado com facilidade com o Xícara de Açúcar.</p>';
            echo '<p><a href="cadastro.php">Cadastre-se</a> ou <a href="login.php">faça login</a> e comece já!</p>';
          }
        ?>
      </section>
    </body>
</html>
