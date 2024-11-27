<?php
require_once("../../config/db.php");
session_start();

$login = isset($_POST["nome_cadastro"]) ? trim($_POST["nome_cadastro"]) : FALSE;
$senha = isset($_POST["senha_cadastro"]) ? md5(trim($_POST["senha_cadastro"])) : FALSE;

if (!$login || !$senha) {
    echo "
    <script>
        alert('Você deve digitar seu login e senha!');
        window.location.href = '../pages/login.php';
    </script>";
    exit;
}

try {

    // Consulta para verificar o usuário e senha
    $stmt = $pdo->prepare("SELECT Usuario, Senha FROM Usuario WHERE Usuario = :login");
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar se o usuário existe
    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar a senha
        if (!strcmp($senha, $dados["Senha"])) {
            $_SESSION["nome_cadastro"] = $dados["Usuario"];
            echo "
            <script>
                window.location.href = '../pages/index.php';
            </script>";
        } else {
            // Senha inválida
            echo "
            <script>
                alert('A senha fornecida por você é inválida!');
                window.location.href = '../pages/login.php';
            </script>";
        }
    } else {
        // Login inválido
        echo "
        <script>
            alert('O login fornecido por você é inexistente!');
            window.location.href = '../pages/login.php';
        </script>";
    }
} catch (PDOException $e) {
    // Tratamento de erros de conexão
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}
?>
