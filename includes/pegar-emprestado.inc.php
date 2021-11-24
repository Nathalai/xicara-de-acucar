<?php
function buscarDisponiveis() {
    if (isset($_SESSION['usuarioId'])) {    

        require_once "dbhandler.inc.php";
        require_once "funcoes.inc.php";
    
        $itensBuscados = buscarDisponiveisDB($connection, $_SESSION['usuarioId']);
        return $itensBuscados;
    }
     else {
        header("location: ../disponibilizados.php?error=usuariosemid");
        exit();
    }
}
?>