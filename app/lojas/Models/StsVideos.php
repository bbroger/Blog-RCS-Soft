<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsVideos
{
    private $Resultado;

    public function listar()
    {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->exeRead('sts_videos', 'LIMIT :limit', 'limit=3');
        $this->Resultado['sts_videos'] = $listar->getResultado();
        return $this->Resultado['sts_videos'];
    }
}