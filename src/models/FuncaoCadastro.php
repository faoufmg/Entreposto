<?php

    include_once('../conn/db.php');

    $Nome = $_POST['nome_cadastro'];
    $Senha = $_POST['senha_cadastro'];
    $SenhaCriptografada = md5($Senha);

    $stmt = mysqli_prepare($link, "INSERT INTO Usuario(Nome, Senha) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, 'ss', $Nome, $SenhaCriptografada);

    if(mysqli_stmt_execute($stmt)){
        echo
        "<script>
            alert('Usuário cadastrado com sucesso');
            window.location.href = '../Home/Cadastro.php';
        </script>";
    }
    else{
        echo
        "<script>
            alert('Erro no cadastro: . mysqli_error($link)');
        </script>";
    }

?>