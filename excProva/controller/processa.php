<?php
// require once para puxar a classe vinda de usuário.php
require_once '../model/usuario.php';
// require once para trazer as classes e os repositórios vindos de repository.php
require_once '../repositories/repository.php';

// if usado para verificar se foi acessado pelo método post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// sendo por post, cria uma váriavel para cada e vai puxando item por item e vendo se existe um dado dentro do array associativo ainda para ser processado, se não tiver ele fica sem nada dentro, isso é feito em todos os itens abaixo.
    $nomeVar =  isset($_POST["nome"]) ? $_POST["nome"] : "";
    $emailVar = isset($_POST["email"]) ? $_POST["email"] : "";
    $idadeVar = isset($_POST["idade"]) ? $_POST["idade"] : "";
    $maeVar =  isset($_POST["nomeMae"]) ? $_POST["nomeMae"] : "";
    $paiVar =  isset($_POST["nomePai"]) ? $_POST["nomePai"] : "";

// aqui ele instancia a classe usando os dados já atribuídos acima. 
    $meuUsuario = new Usuario(
        // id: random_int(0, 999999),
        id: 1,
        nome: $nomeVar,
        email: $emailVar,
        idade: $idadeVar,
        nomeMae: $maeVar,
        nomePai: $paiVar
    );
// instancia a classe repositoryUsuario e adiciona os dados de meuUsuario para o objeto repo
    $repo = new RepositoryUsuario();
    $repo->add(usuario: $meuUsuario);

    
    // manda os dados processados para lista.php que vai para a tabela.
    header('Location: ../view/lista.php');
    exit();
}