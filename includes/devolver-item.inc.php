<?php
function devolverItem() {
    if (isset($_GET['item-id'])) {
        require_once "dbhandler.inc.php";
        require_once "funcoes.inc.php";
    
        $itemId = $_GET['item-id'];

        devolverItemDB($connection, $itemId);

        header("location: ./pegou-emprestado.php?error=none");
        exit();
    } else {
        header("location: ./pegou-emprestado.php?error=sem-item-ou-usuario-id");
        exit();
    }
}
?>