<?php

// define("ARQUIVO", "cadastro.json");
// requiere once busca o arquivo da pasta model usuario.php
require_once "../model/usuario.php";

// cria a classe
class RepositoryUsuario
{
    private $meuBancoDeDdos;
    // faz o método padrão pra construir a classe e atribui como parâmetro os dados vindo de cadastro.json
    public function __construct($meuBancoDeDdos = "../repositories/cadastro.json")
    {
        $this->meuBancoDeDdos = $meuBancoDeDdos;
        
    }
    // cria um método para salvar tudo no array usuários
    private function saveAll(array $usuarios): void
    {
        // cria a variavel json, usa o encode para transformar os dados coletados em usuario em json
        $json = json_encode(value: $usuarios, flags: JSON_PRETTY_PRINT);
        // pega os dados de json e atribui para a variavel meuBancoDeDdos.
        file_put_contents(filename: $this->meuBancoDeDdos, data: $json);
    }
// cria o método getAll para "conseguir" todos os dados 
    public function getAll(): array
    {
        // se não existir esse arquivo o array fica sem nada
        if (!file_exists(filename: $this->meuBancoDeDdos)) {
            return [];
        }
        // se existir pega os dados e atribui para dadosDoArquivo  
        $dadosDoArquivo = file_get_contents(filename: $this->meuBancoDeDdos);
        // atribui o dadosDoArquivo, mostrando que é um array associativo para a váriavel jsonDoArquivo
        $jsonDoArquivo = json_decode(json: $dadosDoArquivo, associative: true);
        // se a condição for verdadeira retorna o jsonDoArquivo com os dados, se for falsa retorna jsonDoArquivo vazio.
        return $jsonDoArquivo ? $jsonDoArquivo : [];

    } 
    
    public function add(Usuario $usuario): bool
    // método para adicionar novo usuário
    {
        //  cria a variavel listaDeUsuarios que recebe todos os usuários já cadastrados
        $listaDeUsuarios = $this->getAll();
        // cria novoId que usa lógica pra ver se a lista tem usuários, se tiver pega o último id que está em colchetes ali no código e adiciona +1 usando end, se a lista estiver vazia ele usará o id 1 que está depois dos dois pontos. 
        $novoId = !empty($listaDeUsuarios) ? end($listaDeUsuarios)['id']+1 : 1;
        // listaDeUsuarios recebe um novo usuario (objeto)
        $listaDeUsuarios[] = $usuario;
        // usa a função saveAll para salvar em listaDeUsuarios
        $this->saveAll($listaDeUsuarios);
        // return true se deu certo
        return true;
    }

    public function remove(int $id): bool
    {
        // pega a lista de usuários
        $listaDeUsuarios = $this->getAll();
        // enquanto a lista de usuário key é o index do array e usuário representa um array associativo
        foreach ($listaDeUsuarios as $key => $usuario) {
            // se o usuário id solicitado for igual ao parametro id
            if ($usuario['id'] == $id) {
                // remover
                unset($listaDeUsuarios[$key]);
                // parar porque não precisa mais
                break;
            }
        }
        // usa array_values para reposicionar no array
        $listaDeUsuarios = array_values(array: $listaDeUsuarios);
        // salva de novo
        $this->saveAll(usuarios: $listaDeUsuarios);
        // se der certo retorna true
        return true;        
    }

    public function update(Usuario $usuario): bool
    {
        // mesma coisa que o delete, mas serve para atualizar os dados
        $listaDeUsuarios = $this->getAll();
        foreach ($listaDeUsuarios as $key => $usuario) {
            if ($usuario['id'] == $usuario->id) {
                $listaDeUsuarios[$key] = $usuario;
                break;
            }
        }
        $this->saveAll(usuarios: $listaDeUsuarios);
        return true;
    }
   

  
    

}