<?php

require_once "./control/repository.php";

// echo "chegou na lista";

$dadosDoArquivo = file_get_contents(ARQUIVO);

$arrayUser = json_decode($dadosDoArquivo, true);


// echo '<pre>';
// print_r($arrayUser);
// echo '</pre>';
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
                    <td> <?php echo "{$usuario["nomeUser"]}"  ?> </td>
                    <td> <?php echo "{$usuario["emailUser"]}"  ?> </td>
                    <td> <?php echo "{$usuario["idadeUser"]}"  ?> </td>
                    <td> <?php echo "{$usuario["nomeMae"]}"  ?> </td>
                    <td> <?php echo "{$usuario["nomePai"]}"  ?> </td>
                    <td> <a href="remove.php?removerID=<?php echo "{$usuario["id"]}"; ?>">
                            REMOVER-<?php echo "{$usuario["nomeUser"]}" ?> </a> </td>


                </tr>
            <?php endforeach; ?>

        </tbody>


    </table>


</body>

</html>