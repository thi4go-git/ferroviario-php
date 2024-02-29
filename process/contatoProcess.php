<?php

require_once("../service/ContatoServiceImpl.php");
require_once("../model/Contato.php");

$dadosFormulario = $_POST;
$contatoService = new ContatoServiceImpl();


if (!empty($dadosFormulario)) {
    if ($dadosFormulario["type"] === "create") {

        $newContato = new Contato($dadosFormulario["name"], $dadosFormulario["phone"], $dadosFormulario["observations"]);
        $contatoService->create($newContato, $conn);

    } else if ($dadosFormulario["type"] === "edit") {

    } else if ($dadosFormulario["type"] === "delete") {

    }

} else {

}

// FECHAR CONEXÃO
$conn = null;