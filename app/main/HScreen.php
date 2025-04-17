<?php
$conn=Database::connect();
$email=$_POST["email"];
$senha=$_POST["senha"];

// Consulta ao banco
$stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND senha = ?");
$stmt->execute([$email, $senha]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se encontrou um usu�rio
if ($user) {
    echo "<script>alert('Login realizado com sucesso!');</script>";
    echo "<script>window.location.href = 'pagina_principal.php';</script>";
} else {
    echo "<script>alert('Nome ou senha inv�lidos.');</script>";
}







?>


<html></html><!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="homestyle.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
<form action="">
    <div class="titulo">
        <h2>Faça o seu login</h2>
        <div class="barra-horizontal"></div>
    </div>

    <div class="campo_input estilo_input">
        <label for="matr" name="email">Email</label>
        <input type="matr" id="matr" />
    </div>
    <div class="campo_input estilo_input" >
        <label for="password" name="senha"><bolt>Senha</bolt></label>
        <input type="password" id="password" />
    </div>
    <button id="ibotao" class="botao">
        Entrar
    </button>
    <div class="link-duplo">
        <a href="HRegister.php">Não tem uma conta?</a>
        <span>|</span>
        <a href="recuperar_senha.html">Esqueceu a senha?</a>
    </div>



</form>
<script src="uiController.js" ></script>
</body>