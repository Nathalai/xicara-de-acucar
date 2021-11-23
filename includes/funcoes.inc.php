<?php

function usuarioInvalido($usuario) {    
    $result;    
    if (!preg_match("/^[a-zA-Z0-9]*$/", $usuario)) {        
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailInvalido($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function senhasDiferentes($senha, $repetirSenha) {
    $result;
    if ($senha !== $repetirSenha) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usuarioExiste($connection, $usuario, $email) {
    $sql = "SELECT * FROM usuarios WHERE usuariosUsername = ? OR usuariosEmail = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastro.php?error=stmtfalhou");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $email);
    mysqli_stmt_execute($stmt);

    $dadosResultantes = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($dadosResultantes)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function criarUsuario($connection, $nome, $usuario, $email, $senha) {
    $sql = "INSERT INTO usuarios (usuariosNome, usuariosUsername, usuariosEmail, usuariosSenha) VALUES (?, ?, ? ,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../cadastro.php?error=stmtfalhou");
        exit();
    }

    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt, "ssss", $nome, $usuario, $email, $hashedSenha);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../cadastro.php?error=none");
    exit();
}

function entrar($connection, $usuarioemail, $senha) {
    $usuarioExiste = usuarioExiste($connection, $usuarioemail, $usuarioemail);


    if ($usuarioExiste === false) {
        header("location: ../login.php?error=usuarionaocadastrado");
        exit();
    }

    $hashedSenha = $usuarioExiste["usuariosSenha"];
    $checarSenha = password_verify($senha, $hashedSenha);

    if ($checarSenha === false) {
        header("location: ../login.php?error=senhaincorreta");
        exit();
    } else if ($checarSenha === true) {
        session_start();
        $_SESSION["usuarioId"] = $usuarioExiste["usuariosId"];
        $_SESSION["usuarioNome"] = $usuarioExiste["usuariosNome"];
        $_SESSION["usuarioUsername"] = $usuarioExiste["usuariosUsername"];
        $_SESSION["usuarioEmail"] = $usuarioExiste["usuariosEmail"];
        header("location: ../tela-inicial.php");
    }
}

function disponibilizarItem($connection, $item, $descricao) {
    $sql = "INSERT INTO itens (itemNome, itemDescricao) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../disponibilizar.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $item, $descricao);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../disponibilizar.php?error=none");
    exit();
}

?>