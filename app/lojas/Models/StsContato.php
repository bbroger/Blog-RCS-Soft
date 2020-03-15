<?php

namespace Sts\Models;

if(!defined('URL')) {
    header("LOCATION: /");
    exit();
}

class StsContato
{
    private $Dados;
    private $Resultado;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function cadContato(array $Dados)
    {   
        $this->Dados = $Dados;
        $this->validarDados();

        if($this->Resultado) {
            $this->inserir();
        }
    }

    private function validarDados()
    {
        $this->Dados = array_map('strip_tags', $this->Dados);
        $this->Dados = array_map('trim', $this->Dados);
        if(in_array('', $this->Dados)){
            $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible text-center alerta'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Erro: Favor preencher todos os campos para envio da mensagem.</div>";
            $this->Resultado = false;
        } else {
            if(filter_var($this->Dados['email'], FILTER_VALIDATE_EMAIL)){
                $this->Resultado = true;
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible text-center alerta'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Erro: Insira um email válido.</div>";
                $this->Resultado = false;
            }   
        }
    }

    private function inserir() 
    {
        $cadContato = new \Sts\Models\helper\StsCreate();
        $cadContato->exeCreate('sts_contatos', $this->Dados);

        if($cadContato->getResultado()) {
            $_SESSION['msg'] = "<p class='alert alert-success alert-dismissible text-center alerta'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Mensagem enviada com sucesso.</p>";
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible text-center alerta'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ops! A mensagem não pode ser enviada. Por favor tente novamente.</div>";
            $this->Resultado = false;
        }
    }
}