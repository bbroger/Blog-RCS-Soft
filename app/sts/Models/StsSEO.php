<?php

namespace Sts\Models;

if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsSEO
{
    private $Resultado;
    private $ResultadoFac;
    private $UrlController;
    private $Url;
    private $UrlConjunto;
    private $UrlParametro;
    private $Tabela;
    private $Coluna;
    private $listarSeoBasico;
    private static $Format;

    public function listar_seo($Tabela = null, $Coluna = null, $Valor = null)
    {
        $this->montarUrl();
        $this->UrlParametro = (string) $Valor;

        if(!empty($this->UrlParametro)){
            $this->Tabela = (string) $Tabela;
            $this->Coluna = (string) $Coluna;
            $this->listarSeoBasico = $this->listar_seo_pg();
            $this->listar_seo_art();
        }else {
            $this->listar_seo_pg();
            $this->Resultado[0]['dir_img'] = 'pagina';
        }
        $this->listar_fac_twitter();
        //var_dump($this->Resultado);
        return $this->Resultado;
    }

    private function listar_seo_pg()
    {
        $listar_seo = new \Sts\Models\helper\StsRead();
        //$listar_seo->exeRead('sts_blog', 'LIMIT :limit', 'limit=1');
        $listar_seo->fullRead("SELECT pg.id, pg.endereco, pg.titulo, pg.keywords, pg.description, pg.author, 
                                    pg.imagem, rob.tipo tipo_rob
                                        FROM sts_paginas pg
                                        INNER JOIN sts_robots rob 
                                        ON rob.id = pg.sts_robot_id
                                        WHERE pg.controller = :controller
                                        ORDER BY pg.id DESC
                                        LIMIT :limit", "controller={$this->UrlController}&limit=1");
        $this->Resultado = $listar_seo->getResultado();

        return $this->Resultado;
    }

    private function listar_seo_art()
    {
        $listar_seo_art = new \Sts\Models\helper\StsRead();
        //$listar_seo->exeRead('sts_blog', 'LIMIT :limit', 'limit=1');
        $listar_seo_art->fullRead("SELECT id, titulo, keywords, description, author, imagem 
                                        FROM {$this->Tabela}
                                        WHERE {$this->Coluna} = :valor
                                        ORDER BY id DESC
                                        LIMIT :limit", "valor={$this->UrlParametro}&limit=1");
        $this->Resultado = $listar_seo_art->getResultado();
        $this->Resultado[0]['tipo_rob'] = $this->listarSeoBasico[0]['tipo_rob'];
        $this->Resultado[0]['endereco'] = $this->listarSeoBasico[0]['endereco'].'/'.$this->UrlParametro;
        $this->Resultado[0]['dir_img'] = $this->listarSeoBasico[0]['endereco'];
    }

    private function listar_fac_twitter()
    {
        $listar_facebook = new \Sts\Models\helper\StsRead();
        $listar_facebook->fullRead("SELECT og_site_name, og_locale, fb_admins, twitter_site
                                        FROM sts_seo
                                        WHERE id = :id
                                        LIMIT :limit", "id=1&limit=1");
        $this->ResultadoFac = $listar_facebook->getResultado();
        $this->Resultado[0]['og_site_name'] = $this->ResultadoFac[0]['og_site_name'];
        $this->Resultado[0]['og_locale'] = $this->ResultadoFac[0]['og_locale'];
        $this->Resultado[0]['fb_admins'] = $this->ResultadoFac[0]['fb_admins'];
        $this->Resultado[0]['twitter_site'] = $this->ResultadoFac[0]['twitter_site'];
    }

    private function montarUrl()
    {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->Url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            $this->limparUrl();
            $this->UrlConjunto = explode("/", $this->Url);

            if (isset($this->UrlConjunto[0])) {
                $this->UrlController = $this->slugController($this->UrlConjunto[0]);
            } else {
                $this->UrlController = $this->slugController(CONTROLER);
            }

            if (isset($this->UrlConjunto[1])) {
                $this->UrlParametro = $this->UrlConjunto[1];
            } else {
                $this->UrlParametro = null;
            }
            //echo "URL: {$this->Url} <br/>";
            //echo "Controlle: {$this->UrlController} <br/>";

        } else {
            $this->UrlController = $this->slugController(CONTROLER);
            $this->UrlParametro = null;
        }
    }

    private function limparUrl()
    {
        //limpar a url para não aceitar caracteres especiais (ç, ~, ^)
        $this->Url = strip_tags($this->Url);

        //eliminar espação em branco
        $this->Url = trim($this->Url);

        //eliminar a última barra
        $this->Url = rtrim($this->Url);

        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->Url = strtr(utf8_decode($this->Url), utf8_decode(self::$Format['a']), self::$Format['b']);
    }

    public function slugController($SlugController)
    {
        //$UrlController = strtolower($SlugController);
        //$UrlController = explode("-", $UrlController);
        //$UrlController = implode(" ", $UrlController);
        //$UrlController = ucwords($UrlController);
        //$UrlController = str_replace(" ", "", $UrlController);
        $UrlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugController)))));
        return $UrlController;
    }
}
