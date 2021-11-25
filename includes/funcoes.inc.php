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

function disponibilizarItem($connection, $item, $descricao, $usuarioId) {
    $sql = "INSERT INTO itens (itemNome, itemDescricao, usuarioId) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../disponibilizar.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $item, $descricao, $usuarioId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../disponibilizar.php?error=none");
    exit();
}

function buscarDisponibilizados($connection, $usuarioId) {    
    $sql = "SELECT i.itemId, i.itemNome, i.itemDescricao, i.disponibilidade, u.usuariosNome AS emprestadoPara, u.usuariosEmail AS contato FROM itens AS i LEFT JOIN usuarios AS u ON i.emprestadoPara = u.usuariosId WHERE i.usuarioId = $usuarioId;";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
      $itens = array();
        while($row = mysqli_fetch_assoc($result)) {
            $item = array('ID' => $row["itemId"], 'Nome'=> $row['itemNome'], 'Descrição'=> $row['itemDescricao'], 'Disponibilidade'=> $row['disponibilidade'], 'Emprestado para:'=> $row['emprestadoPara'], 'Contato'=> $row['contato']);
            array_push($itens, $item);
        }

        return $itens;
    }

    mysqli_close($connection);
}

function excluirItemDB($connection, $itemId) {
    $sql = "DELETE FROM itens WHERE itemId = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../disponibilizados.php?error=stmtfalhou");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $itemId);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

function buscarDisponiveisDB($connection, $usuarioId) {    
    $sql = "SELECT i.itemId, i.itemNome, i.itemDescricao, u.usuariosNome FROM itens AS i INNER JOIN usuarios AS u ON u.usuariosId = i.usuarioId WHERE i.usuarioId != $usuarioId AND i.disponibilidade = 'Disponível';";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
      $itens = array();
        while($row = mysqli_fetch_assoc($result)) {
            $item = array('ID' => $row["itemId"], 'Nome'=> $row['itemNome'], 'Descrição'=> $row['itemDescricao'], 'Quem está emprestando:'=> $row['usuariosNome']);
            array_push($itens, $item);
        }

        return $itens;
    }

    mysqli_close($connection);
}

function pegarItemDB($connection, $usuarioId, $itemId) {    
    $sql = "UPDATE itens SET disponibilidade = 'Indisponivel', emprestadoPara = ? WHERE itemId = ?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../disponibilizados.php?error=stmtfalhou");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $usuarioId, $itemId);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

?>