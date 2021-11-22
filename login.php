<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Entrar</title>
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
        if ($_GET["error"] == "usuarionaocadastrado") {
          echo '<h5>Usuário/e-mail não cadastrado! Cadastre-se <a href="cadastro.php">aqui</a>.</h5>';
        }
        else if ($_GET["error"] == "senhaincorreta") {
          echo '<h5>Senha incorreta, tente novamente!</h5>';
        }
      } 
    ?>

    <h3>Entrar</h3>

    <section class="formulario">
      <form class="was-validated" action="includes/login.inc.php" method="post">
        <div class="mb-3">
          <label class="form-label">Usuário ou E-mail</label>
          <input type="text" name="usuarioemail" class="form-control" placeholder="Digite seu nome de usuário ou e-mail" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <div class="input-group">
            <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
          </div>
        </div>            
        <div class="submit">
          <button type="submit" name="entrarBtn" class="submitBt">ENTRAR</button>
        </div>
      </form>
    </section>

  </body>
</html>