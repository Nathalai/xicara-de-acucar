<?php
function excluirItem() {
    if (isset($_GET['item-id'])) {
        require_once "dbhandler.inc.php";
        require_once "funcoes.inc.php";
    
        $itemId = $_GET['item-id'];

        excluirItemDB($connection, $itemId);

        header("location: ./disponibilizados.php");
        exit();
    } else {
        header("location: ./disponibilizados.php?error=sem-item-id");
        exit();
    }
}
?>