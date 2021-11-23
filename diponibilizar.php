<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Disponibilizar novo item</title>
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
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "stmtfalhou") {
          echo "<h5>Algo deu errado, tente novamente!</h5>";
        }
        else if ($_GET["error"] == "none") {
          echo "<h4>O item foi cadastrado(a) com sucesso!</h4>";
        }
      }
    ?>

    <h3>Disponibilizar</h3>

    <section class="formulario">
      <form class="was-validated" action="includes/disponibilizar.inc.php" method="post">           
        <div class="mb-3">
          <label class="form-label">Item</label>
          <input type="text" name="item" class="form-control" placeholder="Digite o nome do item que você quer disponibilizar" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Descrição</label>
          <input type="text" name="descricao" class="form-control" placeholder="Faça uma breve descrição do item" maxlength="1000">
        </div>        
        <div class="submit">
          <button type="submit" name="disponibilizarBtn" class="submitBt">DISPONIBILIZAR</button>
        </div>
      </form>
    </section>

  </body>
</html>