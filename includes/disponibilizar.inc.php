<?php

if (isset($_POST["disponibilizarBtn"])) {

    $item = $_POST["item"];
    $descricao = $_POST["descricao"];
    $usuarioId = $_POST["usuarioId"];

    require_once "dbhandler.inc.php";
    require_once "funcoes.inc.php";
   
    disponibilizarItem($connection, $item, $descricao, $usuarioId);

} else {
    header("location: ../tela-inicial.php");
    exit();
}

?>