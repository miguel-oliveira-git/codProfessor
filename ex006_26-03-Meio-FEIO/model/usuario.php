<?php

class Usuario
{
    public $id;
    public $nome;
    public $email;
    public $idade;
    public $nomeMae;
    public $nomePai;

    public function __construct($id, $nome, $email, $idade, $nomeMae, $nomePai)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->idade = $idade;
        $this->nomeMae = $nomeMae;
        $this->nomePai = $nomePai;
    }

    public function toArray()
    {
        $arr = [
            "id" => $this->id,
            "nomeUser" => $this->nome,
            "emailUser" => $this->email,
            "idadeUser" => $this->idade,
            "nomeMae" => $this->nomeMae,
            "nomePai" => $this->nomePai,
        ];

        return $arr;
    }
}
