<?php

interface ContatoService
{

    public function create(Contato $contato,$conn);
    public function findAll();

}