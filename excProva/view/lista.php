<?php

require_once "../repositories/repository.php";

$repo = new RepositoryUsuario();

// Se o parâmetro GET 'removerId' estiver presente, remove o usuário correspondente.
if (isset($_GET['removerId'])) {
    $id = $_GET['removerId'];
    $repo->remove((int)$id);
    // Redireciona para a própria página para evitar que o parâmetro permaneça na URL.
    header(header: 'Location: ../view/lista.php');
    exit();
}

$arrayUser = $repo->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Dados</title>
</head>

<body>
    <h1> TESTANDO O H1 </h1>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Mae</th>
            <th>Pai</th>
            <th>Remover?</th>
        </thead>
        <tbody>
            <?php foreach ($arrayUser as $usuario) : ?>

            <tr>
                <td> <?php echo "{$usuario["id"]}"  ?> </td>
                <td> <?php echo "{$usuario["nome"]}"  ?> </td>
                <td> <?php echo "{$usuario["email"]}"  ?> </td>
                <td> <?php echo "{$usuario["idade"]}"  ?> </td>
                <td> <?php echo "{$usuario["nomeMae"]}"  ?> </td>
                <td> <?php echo "{$usuario["nomePai"]}"  ?> </td>
                <td> <a href="../controller/remove.php?removerID=<?php echo "{$usuario["id"]}"; ?>">
                        REMOVER-<?php echo "{$usuario["nome"]}" ?> </a> </td>


            </tr>
            <?php endforeach; ?>

        </tbody>


    </table>


</body>

</html>