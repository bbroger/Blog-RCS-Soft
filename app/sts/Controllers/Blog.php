<?php

namespace App\sts\Controllers;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class Blog
{   
    private $Dados;
    private $PageId;

    public function index()
    {   
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;

        $listar_art = new \Sts\Models\StsBlog();
        $this->Dados['artigos'] = $listar_art->listar_art($this->PageId);

        $this->Dados['paginacao'] = $listar_art->getResultadoPg();

        $listar_art_recente = new \Sts\Models\StsArtRecente();
        $this->Dados['artigos_recentes'] = $listar_art_recente->listar_art_recente();

        $listar_art_mais_vistos = new \Sts\Models\StsArtMaisVistos();
        $this->Dados['artigos_mais_vistos'] = $listar_art_mais_vistos->listar_art_mais_vistos();

        $listar_autor = new \Sts\Models\StsSobreAutor();
        $this->Dados['sts_sobre_autor'] = $listar_autor->listar_autor();

        $listar_menu = new \Sts\Models\StsMenu();
        $this->Dados['sts_menu'] = $listar_menu->listar_menu();

        $listar_seo = new \Sts\Models\StsSEO();
        $this->Dados['sts_seo'] = $listar_seo->listar_seo();
        
        $carregarView = new \Core\ConfigView('sts/Views/blog/blog', $this->Dados);
        $carregarView->renderizar();
    }
}