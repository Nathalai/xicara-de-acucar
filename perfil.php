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
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "usuarioinvalido") {
          echo "<h5>Usuário inválido! Escolha um nome de usuário que utilize apenas letras e/ou números.</h5>";
        }
        else if ($_GET["error"] == "emailinvalido") {
          echo "<h5>Digite um email válido!</h5>";
        }
        else if ($_GET["error"] == "senhasdiferentes") {
          echo "<h5>As senhas não estão iguais!</h5>";
        }
        else if ($_GET["error"] == "usuariojautilizado") {
          echo "<h5>Este usuário e/ou e-mail já foi utilizado!</h5>";
        }
        else if ($_GET["error"] == "stmtfalhou") {
          echo "<h5>Algo deu errado, tente novamente!</h5>";
        }
        else if ($_GET["error"] == "none") {
          echo "<h4>Seus dados foram alterados com sucesso!</h4>";
        } else if ($_GET["error"] == "none1") {
          echo "<h4>Sua senha foi alterada com sucesso!</h4>";
        }
      }
    ?>

    <h3>Perfil</h3>
    <section class="formulario" style="justify-content: center; margin-top: 24px">
      <form class="was-validated" action="includes/alterar-dados.inc.php" method="post" style="width: 350px">           
        <?php 
        echo '<input type="hidden" name="usuarioId" value="' . $_SESSION["usuarioId"] . '" />';
        ?>
        <div class="mb-3">
          <label class="form-label">Nome</label>
          <?php
          echo '<input type="text" name="nome" value="' . $_SESSION["usuarioNome"] . '" class="form-control" disabled />';
          ?>
          <div class="invalid-feedback">Digite seu nome completo sem abreviações</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Usuário</label>
          <?php
            echo '<input type="text" name="username" value="' . $_SESSION["usuarioUsername"] . '" class="form-control" required />';
          ?>
          <div class="invalid-feedback">Escolha um nome de usuário</div>
        </div>
        <div class="mb-3">
          <label class="form-label">E-mail</label>
          <?php
            echo '<input type="e-mail" name="email" value="' . $_SESSION["usuarioEmail"] . '" class="form-control" required />';
          ?>
          <div class="invalid-feedback">Digite seu e-mail</div>
        </div>        
        <div class="submit">
          <button type="submit" name="alterarDadosBtn" class="submitBt">ALTERAR DADOS</button>
        </div>
      </form>

      <form class="was-validated" action="includes/alterar-senha.inc.php" method="post" style="width: 350px; margin-left:96px">
        <?php 
        echo '<input type="hidden" name="usuarioId" value="' . $_SESSION["usuarioId"] . '" />';
        ?>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <div class="input-group">
            <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required/>
            <div class="invalid-feedback">Escolha uma senha</div>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Confirmar senha</label>                
          <div class="input-group">
            <input type="password" name="repetirSenha" class="form-control" placeholder="Digite sua senha" required/>
            <div class="invalid-feedback">Confirme sua senha</div>
          </div>
        </div>
        <div class="submit">
          <button type="submit" name="alterarSenhaBtn" class="submitBt">ALTERAR SENHA</button>
        </div>
      </form>
    </section>
  </body>
</html>