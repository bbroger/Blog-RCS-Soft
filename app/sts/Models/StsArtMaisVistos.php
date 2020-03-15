<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsArtMaisVistos
{
    private $Resultado;

    public function listar_art_mais_vistos()
    {   
        $listar = new \Sts\Models\helper\StsRead();
        //$listar->exeRead('sts_blog', 'LIMIT :limit', 'limit=1');
        $listar->fullRead("SELECT titulo, slug 
                FROM sts_artigos
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY qnt_acesso DESC
                LIMIT :limit", "adms_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
