<?php

if (isset($_POST["entrarBtn"])) {

    $usuarioemail = $_POST["usuarioemail"];
    $senha = $_POST["senha"];

    require_once "dbhandler.inc.php";
    require_once "funcoes.inc.php";

    entrar($connection, $usuarioemail, $senha);

} else {
    header("location: ../login.php");
    exit();
}

?>