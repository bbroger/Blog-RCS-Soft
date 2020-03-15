<?php

namespace App\sts\Controllers;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class Artigo
{   
    private $Dados;
    private $Artigo;

    public function index($Artigo = null)
    {   
        $this->Artigo = (string) $Artigo;

        $visualizar_artigo = new \Sts\Models\StsArtigo();
        $this->Dados['sts_detalhe_artigo'] = $visualizar_artigo->visualizar_artigo($this->Artigo);

        $listar_art_recente = new \Sts\Models\StsArtRecente();
        $this->Dados['artigos_recentes'] = $listar_art_recente->listar_art_recente();

        $listar_art_mais_vistos = new \Sts\Models\StsArtMaisVistos();
        $this->Dados['artigos_mais_vistos'] = $listar_art_mais_vistos->listar_art_mais_vistos();

        $listar_autor = new \Sts\Models\StsSobreAutor();
        $this->Dados['sts_sobre_autor'] = $listar_autor->listar_autor();

        $listar_menu = new \Sts\Models\StsMenu();
        $this->Dados['sts_menu'] = $listar_menu->listar_menu();

        $listar_seo = new \Sts\Models\StsSEO();
        
        if(!empty($this->Dados['sts_detalhe_artigo'][0])){
            $artigo_ant_prox = new \Sts\Models\StsArtAntProx();
            $this->Dados['sts_art_prox'] = $artigo_ant_prox->artigoProximo($this->Dados['sts_detalhe_artigo'][0]['id']);
            $this->Dados['sts_art_ant'] = $artigo_ant_prox->artigoAnterior($this->Dados['sts_detalhe_artigo'][0]['id']);

            $this->Dados['sts_seo'] = $listar_seo->listar_seo('sts_artigos', 'slug', $this->Artigo);
        } else {
            $this->Dados['sts_seo'] = $listar_seo->listar_seo();
        }
        
        $carregarView = new \Core\ConfigView('sts/Views/blog/artigo', $this->Dados);
        $carregarView->renderizar();
    }
}