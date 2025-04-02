<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <!-- Página de cadastro simples sem uso de CSS -->
    <h1>Cadastro de Usuário</h1>

    <!-- Formulário que envia os dados para o script processa.php via método POST -->
    <form action="processa.php" method="POST">
        <!-- Campo para inserir o nome do usuário -->

        <input type="hidden" name="nome" id="nome" value="<?php echo $_POST["nome"]; ?>">
        <input type="hidden" name="email" id="email" value="<?php echo $_POST["email"]; ?>">
        <input type="hidden" name="idade" id="idade" value="<?php echo $_POST["idade"]; ?>">


        <label for="nomeMae">Mãe:</label>
        <input type="text" name="nomeMae" id="nomeMae" required><br><br>

        <!-- Campo para inserir o email do usuário -->
        <label for="nomePai">Pai:</label>
        <input type="text" name="nomePai" id="nomePai" required><br><br>

        <!-- Botão de envio do formulário -->
        <input type="submit" value="Cadastrar">
    </form>

    <!-- Link para acessar a página de listagem de usuários -->
    <!-- <br> -->
    <!-- <a href="lista.php">Ver lista de usuários</a> -->
</body>

</html>