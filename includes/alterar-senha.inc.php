<?php

if (isset($_POST["alterarSenhaBtn"])) {

    $usuarioId = $_POST["usuarioId"];
    $novaSenha = $_POST["senha"];
    $repetirNovaSenha = $_POST["repetirSenha"];

    require_once "dbhandler.inc.php";
    require_once "funcoes.inc.php";
        
    if (senhasDiferentes($novaSenha, $repetirNovaSenha) !== false) {
        header("location: ../perfil.php?error=senhasdiferentes");
        exit();
    }

    alterarSenha($connection, $usuarioId, $novaSenha);

} else {
    header("location: ../perfil.php");
    exit();
}

?>