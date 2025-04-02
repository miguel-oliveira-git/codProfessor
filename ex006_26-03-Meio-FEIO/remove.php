<?php

require_once "./control/repository.php";

if (isset($_GET["removerID"]) == true) {

    $idParaRemover = $_GET["removerID"];

    $dadosDoArquivo = file_get_contents(ARQUIVO);
    $arrayAssocDoArquivo = json_decode(json: $dadosDoArquivo, associative: true);

    // for ($i = 0; $i < sizeof($arrayAssocDoArquivo); $i++) {
    //     $usuario = $arrayAssocDoArquivo[$i];

    //     if ($usuario["id"] == $idParaRemover) {
    //         // echo "<br> USUARIO REMOVIDO {$usuario["nomeUser"]} <br>";
    //         unset($arrayAssocDoArquivo[$i]);
    //         break;
    //     }
    // }

    foreach ($arrayAssocDoArquivo as $usuarioIndex => $usuario) {
        if ($usuario["id"] == $idParaRemover) {
            unset($arrayAssocDoArquivo[$usuarioIndex]);
            break;
        }
    }



    file_put_contents(
        filename: ARQUIVO,
        data: json_encode(value: $arrayAssocDoArquivo, flags: JSON_PRETTY_PRINT)
    );
} else {
    echo "não achou nadaaaaaaa!!!";
}



header('Location: lista.php');
exit();
