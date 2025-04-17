<?php
require_once "/home/alexandrevitor/PhpstormProjects/untitled/skafa/core/ConexaoBD.php";
$conn = Database::connect();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND senha = ?");
    $stmt->execute([$email, $senha]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        header("Location:ScreenSystem.php");
        exit();
    } else {
        echo "<script>alert('Email ou senha inválidos.'); window.history.back();</script>";
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

<form action="" method="POST">
    <div class="titulo">
        <h2>Faça o seu login</h2>
        <div class="barra-horizontal"></div>
    </div>

    <div class="campo_input estilo_input">
        <label for="matr">Email</label>
        <input type="text" id="matr" name="email" required />
    </div>

    <div class="campo_input estilo_input">
        <label for="password"><b>Senha</b></label>
        <input type="password" id="password" name="senha" required />
    </div>

    <button id="ibotao" class="botao" type="submit">
        Entrar
    </button>

    <div class="link-duplo">
        <a href="HRegister.php">Não tem uma conta?</a>
        <span>|</span>
        <a href="recuperar_senha.html">Esqueceu a senha?</a>
    </div>
</form>

<script src="uiController.js"></script>
</body>
</html>



