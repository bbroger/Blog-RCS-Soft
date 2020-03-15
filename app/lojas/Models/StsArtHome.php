<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsArtHome
{
   private $Resultado;

    public function listar()
    {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("SELECT id, titulo, descricao, imagem, slug
                FROM sts_artigos
                WHERE adms_sit_id = :adms_sit_id
                ORDER BY id DESC
                LIMIT :limit", 'adms_sit_id=1&limit=3');
        $this->Resultado['sts_arthome'] = $listar->getResultado();
        return $this->Resultado['sts_arthome'];
    } 
}
