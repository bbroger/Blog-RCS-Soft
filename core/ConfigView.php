<?php

namespace Core;

class ConfigView
{
    private $Nome;
    private $Dados;

    public function __construct($Nome, array $Dados = null)
    {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
    }

    public function renderizar()
    {
        if (file_exists('app/' . $this->Nome . '.php')) {
            if ($this->Nome == 'sts/Views/blog/blog') {
                include_once 'app/sts/Views/include/cabecalho.php';
                include_once 'app/sts/Views/include/menu_blog.php';
                include_once 'app/' . $this->Nome . '.php';
                include_once 'app/sts/Views/include/rodape.php';
            } else if ($this->Nome == 'sts/Views/home/home') {
                include_once 'app/sts/Views/include/cabecalho.php';
                include_once 'app/sts/Views/include/menu.php';
                include_once 'app/' . $this->Nome . '.php';
                include_once 'app/sts/Views/include/rodape.php';
            } else {
                include_once 'app/sts/Views/include/cabecalho.php';
                include_once 'app/sts/Views/include/menu_artigo.php';
                include_once 'app/' . $this->Nome . '.php';
                include_once 'app/sts/Views/include/rodape.php';
            }
        } else {
            echo "Erro ao carregar a página: {$this->Nome}";
        }
    }
}
