<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsArtRecente
{
    private $Resultado;

    public function listar_art_recente()
    {   
        $listar = new \Sts\Models\helper\StsRead();
        //$listar->exeRead('sts_blog', 'LIMIT :limit', 'limit=1');
        $listar->fullRead("SELECT titulo, slug 
                FROM sts_artigos
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit", "adms_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}