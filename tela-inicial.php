<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Página Inicial</title>
        <link rel="shortcut icon" href="img/sugar.png"/>
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
            echo  '<p>Olá ' . $_SESSION["usuarioNome"] . '!</p>';
            echo  '<div>
                    <form class="botoesForm" action="disponibilizar.php" method="post">
                      <button type="submit" name="botaoDiponibilizar" class="submitBt tipo1">Disponibilizar novo item</button>                    
                    </form>
                    <form class="botoesForm" action="disponibilizados.php" method="post">
                      <button type="submit" name="botaoDiponibilizados" class="submitBt tipo1">Itens que você disponibilizou</button>                    
                    </form>
                  </div>
                  <div>
                    <form class="botoesForm" action="pegar-emprestado.php" method="post">
                      <button type="submit" name="botaoEmprestar" class="submitBt tipo2">Pegar novo item emprestado</button>                    
                    </form>
                    <form class="botoesForm" action="emprestados.php" method="post">
                      <button type="submit" name="botaoEmprestados" class="submitBt tipo2">Itens que você pegou emprestado</button>                   
                    </form>
                  </div>';
          } else {
            echo '<p>Disponibilize itens ou pegue emprestado com facilidade com o Xícara de Açúcar.</p>';
            echo '<p><a href="cadastro.php">Cadastre-se</a> ou <a href="login.php">faça login</a> e comece já!</p>';
          }
        ?>
      </section>
    </body>
</html>
