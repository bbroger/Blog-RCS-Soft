<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsMenu
{
    private $Resultado;

    public function listar_menu()
    {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead('SELECT endereco, nome_pagina
                            FROM sts_paginas
                            WHERE sts_situacaos_pg_id = :sts_situacaos_pg_id
                            AND lib_bloq = :lib_bloq
                            ORDER BY ordem ASC',
                            "sts_situacaos_pg_id=1&lib_bloq=1");
        $this->Resultado = $listar->getResultado();
        //var_dump($this->Resultado);
        return $this->Resultado;
    }
}