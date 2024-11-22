<?php
    // Inicia sessões
    session_start();

    // Verifica se existe os dados da sessão de login
    if(!isset($_SESSION["nome_cadastro"]))
    {
    // Usuário não logado! Redireciona para a página de login
    echo
    "<script>
        window.location.href = '../Home/Login.php';
    </script>";
    }
?>