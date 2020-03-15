<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsSobreAutor
{
    private $Resultado;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function listar_autor()
    {
        $listar_autor = new \Sts\Models\helper\StsRead();
        $listar_autor->fullRead("SELECT id, titulo, descricao, imagem
                FROM sts_sobres
                WHERE adms_sit_id = :adms_sit_id", "adms_sit_id=1");
        $this->Resultado['sts_sobre_autor'] = $listar_autor->getResultado();
        return $this->Resultado['sts_sobre_autor'];
    }
}
