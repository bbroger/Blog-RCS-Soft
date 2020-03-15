<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsBlog 
{
    private $Resultado;
    private $PageId;
    private $ResultadoPg;
    private $LimiteResultado = 3;//numero de artigos por página

    function getResultadoPg()
    {
        return $this->ResultadoPg;
    }

    public function listar_art($PageId = null)
    {   
        $this->PageId = (int) $PageId;
        $paginacao = new \Sts\Models\helper\StsPaginacao(URL . 'blog');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id) AS num_result 
                                FROM sts_artigos 
                                WHERE adms_sit_id =:adms_sit_id", 'adms_sit_id=1' );
        $this->ResultadoPg = $paginacao->getResultado();

        $listar = new \Sts\Models\helper\StsRead();
        //$listar->exeRead('sts_blog', 'LIMIT :limit', 'limit=1');
        $listar->fullRead("SELECT id, titulo, descricao, imagem, slug 
                FROM sts_artigos
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit OFFSET :offset", "adms_sit_id=1&limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
