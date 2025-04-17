<?php
if(isset($_POST['submit'])){
    require_once ("ConexaoBD.php");
    $conn=Database::connect();
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    $stmt = $conn->prepare("INSERT INTO user(nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);
    $stmt->execute();




}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<form action="HRegister.php" method="POST">
    <div class="titulo">
        <h2>Crie sua conta</h2>
        <div class="barra-horizontal"></div>
    </div>

    <div class="campo_input estilo_input">
        <label for="nome" name="nome">Nome completo</label>
        <input type="text" id="nome" required />
    </div>

    <div class="campo_input estilo_input">
        <label for="email" name="email">Email*</label>
        <input type="email" id="email" required />
    </div>

    <div class="campo_input estilo_input">
        <label for="senha" name="senha"><strong>Senha</strong></label>
        <input type="password" id="senha" required />
    </div>

    <div class="campo_input estilo_input">
        <label for="confirmar_senha" name="submit"><strong>Confirmar Senha</strong></label>
        <input type="password" id="confirmar_senha" required />
    </div>

    <button type="submit" id="ibotao" class="botao">Cadastrar</button>

    <p class="link-duplo">Já tem uma conta?
        <a href="HScreen.html">Faça login</a>
    </p>
</form>
<script src="uiController.js"></script>
</body>
</html>
