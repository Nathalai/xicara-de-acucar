<?php

if (isset($_POST["disponibilizarBtn"])) {

    $item = $_POST["item"];
    $descricao = $_POST["descricao"];
    //$donoItem = $_SESSION["usuarioNome"];

    require_once "dbhandler.inc.php";
    require_once "funcoes.inc.php";
   
    disponibilizarItem($connection, $item, $descricao);

} else {
    header("location: ../tela-inicial.php");
    exit();
}

?>