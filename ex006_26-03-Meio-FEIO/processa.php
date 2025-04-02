<?php

require_once "./model/usuario.php";
require_once "./control/repository.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomeVar =  isset($_POST["nome"]) ? $_POST["nome"] : "";
    $emailVar = isset($_POST["email"]) ? $_POST["email"] : "";
    $idadeVar = isset($_POST["idade"]) ? $_POST["idade"] : "";
    $maeVar =  isset($_POST["nomeMae"]) ? $_POST["nomeMae"] : "";
    $paiVar =  isset($_POST["nomePai"]) ? $_POST["nomePai"] : "";

    $meuUsuario = new Usuario(
        id: random_int(0, 999999),
        nome: $nomeVar,
        email: $emailVar,
        idade: $idadeVar,
        nomeMae: $maeVar,
        nomePai: $paiVar
    );


    $jsonDoArquivo = [];
    if (file_exists(ARQUIVO) == true) {
        $dadosDoArquivo = file_get_contents(ARQUIVO);
        $jsonDoArquivo = json_decode($dadosDoArquivo, true);

        // $tamanhoDoArray = sizeof($jsonDoArquivo);
        // $ultimoIndexDoArray = $tamanhoDoArray - 1;
        // $ultimoUsuarioDoArray = $jsonDoArquivo[$ultimoIndexDoArray];
        // $idDoUltimoElementoDoArray = $ultimoUsuarioDoArray["id"];
        // $proximoId = $idDoUltimoElementoDoArray + 1;
        // $meuUsuario["id"] = $proximoId;


        // $novoId = $jsonDoArquivo[sizeof($jsonDoArquivo) - 1]["id"] + 1;
        // $meuUsuario["id"] = $novoId;
    }

    $jsonDoArquivo[] = $meuUsuario->toArray();

    file_put_contents(
        ARQUIVO,
        json_encode($jsonDoArquivo, JSON_PRETTY_PRINT)
    );



    header('Location: lista.php');
    exit();
}



// // echo "<br><br><br>";
// // var_dump($meuUsuario);
// // echo '<pre>';
// // print_r($meuUsuario);
// // echo '</pre>';

// $jsonDoArquivo = [];
// if (file_exists("cadastroDeUser.json") == true) {
//     $dadosDoArquivo = file_get_contents("cadastroDeUser.json");
//     $jsonDoArquivo = json_decode($dadosDoArquivo, true);

//     $tamanhoDoArray = sizeof($jsonDoArquivo);
//     $ultimoIndexDoArray = $tamanhoDoArray - 1;
//     $ultimoUsuarioDoArray = $jsonDoArquivo[$ultimoIndexDoArray];
//     $idDoUltimoElementoDoArray = $ultimoUsuarioDoArray["id"];
//     $proximoId = $idDoUltimoElementoDoArray + 1;
//     $meuUsuario["id"] = $proximoId;


//     // $novoId = $jsonDoArquivo[sizeof($jsonDoArquivo) - 1]["id"] + 1;
//     // $meuUsuario["id"] = $novoId;
// }

// $jsonDoArquivo[] = $meuUsuario;

// file_put_contents(
//     "cadastroDeUser.json",
//     json_encode($jsonDoArquivo, JSON_PRETTY_PRINT)
// );

// // sleep(2);

// header('Location: lista.php');
// exit();



// // echo "<br><br><br>";
// // var_dump(array_keys($_GET));

// // echo "<br><br><br>";
// // $meuArrayDechaves = array_keys($_GET);
// // echo "{$meuArrayDechaves[1]}";

// // echo "<br><br><br>";
// // var_dump($_GET["email"]);