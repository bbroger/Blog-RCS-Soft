<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsArtigo
{
    private $Resultado;
    private $Artigo;



    public function visualizar_artigo($Artigo = null)
    {   
        $this->Artigo = (string) $Artigo;
        $visualizar_artigo = new \Sts\Models\helper\StsRead();

        //$visualizar_artigo->exeRead('sts_blog', 'LIMIT :limit', 'limit=1');
        $visualizar_artigo->fullRead("SELECT id, titulo, conteudo, imagem 
                                        FROM sts_artigos
                                        WHERE adms_sit_id =:adms_sit_id
                                        AND slug = :slug
                                        ORDER BY id DESC
                                        LIMIT :limit", "adms_sit_id=1&slug={$this->Artigo}&limit=1");
        $this->Resultado = $visualizar_artigo->getResultado();
        return $this->Resultado;
    }
}