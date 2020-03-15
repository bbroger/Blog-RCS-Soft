<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class Home
{
    private $Dados;
    private $Array;

    public function index()
    {
        $this->Array = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Array['cad_contato'])) {
            unset($this->Array['cad_contato']);
            $cad_contato = new \Sts\Models\StsContato();
            $cad_contato->cadContato($this->Array);

            if ($cad_contato->getResultado()) {
                $this->Array['form'] = null;
            } else {
                $this->Dados['form'] = $this->Array;
            }
        }

        $listar_car = new \Sts\Models\StsCarousel();
        $this->Dados['sts_carousels'] = $listar_car->listar();

        $listar_portfolio = new \Sts\Models\StsPortfolio();
        $this->Dados['sts_portfolio'] = $listar_portfolio->listar();

        $listar_videos = new \Sts\Models\StsVideos();
        $this->Dados['sts_videos'] = $listar_videos->listar();

        $listar_artigos = new \Sts\Models\StsArtHome();
        $this->Dados['sts_artigos'] = $listar_artigos->listar();

        $listar_sobre_empresa = new \Sts\Models\StsSobreEmpresa();
        $this->Dados['sts_sobre_empresa'] = $listar_sobre_empresa->listar();

        $listar_menu = new \Sts\Models\StsMenu();
        $this->Dados['sts_menu'] = $listar_menu->listar_menu();

        $listar_seo = new \Sts\Models\StsSEO();
        $this->Dados['sts_seo'] = $listar_seo->listar_seo();

        $carregarView = new \Core\ConfigView("sts/Views/home/home", $this->Dados);
        $carregarView->renderizar();
    }
}
