<?php
function buscarEmprestados() {
    if (isset($_SESSION['usuarioId'])) {    

        require_once "dbhandler.inc.php";
        require_once "funcoes.inc.php";
    
        $itensBuscados = buscarEmprestadosDB($connection, $_SESSION['usuarioId']);
        return $itensBuscados;
    }
     else {
        header("location: ../pegou-emprestado.php?error=usuario-sem-id");
        exit();
    }
}
?>