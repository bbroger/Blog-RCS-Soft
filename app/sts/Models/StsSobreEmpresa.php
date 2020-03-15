<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsSobreEmpresa
{
   private $Resultado;

    public function listar()
    {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->fullRead("SELECT *
                FROM sts_sobre_empresa
                WHERE adms_sit_id = :adms_sit_id", "adms_sit_id=1");
        $this->Resultado['sts_sobre_empresa'] = $listar->getResultado();
        return $this->Resultado['sts_sobre_empresa'];
    } 
}
