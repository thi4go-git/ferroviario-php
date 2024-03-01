<?php

require_once("../service/ContatoServiceImpl.php");
require_once("../model/Contato.php");

$dadosFormulario = $_POST;
$contatoService = new ContatoServiceImpl($conn);
$typeForm = $dadosFormulario["type"];

if (!empty($dadosFormulario)) {
    if ($typeForm === "create") {

        $newContato = new Contato($dadosFormulario["name"], $dadosFormulario["phone"], $dadosFormulario["observations"]);
        $contatoService->create($newContato);

    } else if ($typeForm === "edit") {

    } else if ($typeForm === "delete") {

    }

} else {

}