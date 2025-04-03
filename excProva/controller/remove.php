<?php

require_once "../repositories/repository.php";

if (isset($_GET["removerID"]) == true) {

    $idParaRemover = $_GET["removerID"];
    $repo = new RepositoryUsuario();
    $repo->remove(id: (int)$idParaRemover);
    echo "removido com sucesso!!!";
} else {
    echo "não achou nadaaaaaaa!!!";
}



header(header: 'Location: ../view/lista.php');
exit();