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
    <!-- .. porque está em outra pasta, aó usa ../#nomedapasta/#nomedoarquivo -->
    <form action="../controller/processa.php" method="POST">
        <!-- Campo para inserir o nome do usuário -->
        <!-- hidden porque não precisa aparecer nesse momento -->
         <!-- abre um php pra enviar os dados de processa.php como um array associativo através da variável superglobal post-->
        <input type="hidden" name="nome" id="nome" value="<?php echo $_POST["nome"]; ?>">
        <input type="hidden" name="email" id="email" value="<?php echo $_POST["email"]; ?>">
        <input type="hidden" name="idade" id="idade" value="<?php echo $_POST["idade"]; ?>">

        <!-- Campo para inserir o nome da mãe do usuário -->
        <label for="nomeMae">Mãe:</label>
        <input type="text" name="nomeMae" id="nomeMae" required><br><br>

        <!-- Campo para inserir nome do pai do usuário -->
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