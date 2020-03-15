<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsPortfolio
{
    private $resultado;

    public function listar()
    {
        $listar = new \Sts\Models\helper\StsRead();
        $listar->exeRead('sts_portfolio', 'LIMIT :limit', 'limit=1');
        /*$listar->fullRead("SELECT car.id, car.nome, car.imagem, car.titulo, car.descricao, car.posicao_text, car.titulo_botao, car.link,
                cors.cor
                FROM sts_carousels car
                INNER JOIN adms_cors cors ON cors.id=car.adms_cor_id
                WHERE car.adms_situacoe_id =:adms_situacoe_id ORDER BY car.ordem ASC LIMIT :limit", 'adms_situacoe_id=1&limit=4');*/
        $this->Resultado['sts_portfolio'] = $listar->getResultado();
        return $this->Resultado['sts_portfolio'];
    }
}