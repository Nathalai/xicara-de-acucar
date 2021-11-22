<?php

if (isset($_POST["cadastrarBtn"])) {
 
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $repetirSenha = $_POST["repetirSenha"];
    
    require_once "dbhandler.inc.php";
    require_once "funcoes.inc.php";
   
    if (usuarioInvalido($usuario) !== false) {
        header("location: ../cadastro.php?error=usuarioinvalido");
        exit();
    }
    if (emailInvalido($email) !== false) {
        header("location: ../cadastro.php?error=emailinvalido");
        exit();
    }
    if (senhasDiferentes($senha, $repetirSenha) !== false) {
        header("location: ../cadastro.php?error=senhasdiferentes");
        exit();
    }
    if (usuarioExiste($connection, $usuario, $email) !== false) {
        header("location: ../cadastro.php?error=usuariojautilizado");
        exit();
    }

    criarUsuario($connection, $nome, $usuario, $email, $senha);

} else {
    header("location: ../cadastro.php");
    exit();
}

?>