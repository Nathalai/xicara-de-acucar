<?php
function pegarItem() {
    if (isset($_GET['item-id']) && isset($_GET['usuario-id'])) {
        require_once "dbhandler.inc.php";
        require_once "funcoes.inc.php";
    
        $usuarioId = $_GET['usuario-id'];
        $itemId = $_GET['item-id'];

        pegarItemDB($connection, $usuarioId, $itemId);

        header("location: ./pegar-emprestado.php?error=none");
        exit();
    } else {
        header("location: ./pegar-emprestado.php?error=sem-item-ou-usuario-id");
        exit();
    }
}
?>