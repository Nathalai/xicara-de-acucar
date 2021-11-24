<?php
function loadItems() {
    if (isset($_SESSION['usuarioId'])) {    

        require_once "dbhandler.inc.php";
        require_once "funcoes.inc.php";
    
        $itensBuscados = buscarDisponibilizados($connection, $_SESSION['usuarioId']);
        return $itensBuscados;
    }
     else {
        header("location: ../disponibilizados.php?error=usuariosemid");
        exit();
    }
}
?>