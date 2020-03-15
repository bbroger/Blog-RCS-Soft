<?php

if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}

//echo "View HOME <br/>";
//var_dump($this->Dados['sts_carousels']);
//var_dump($this->Dados['sts_portfolio']);
//var_dump($this->Dados['sts_artigos']);//usar o nome da tabela no banco de dados
//var_dump($this->Dados['sts_sobres']);
?>

<main role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $cont_slide = 0;
            foreach ($this->Dados['sts_carousels'] as $carousel) {
                extract($carousel);
                echo "<li data-target='#myCarousel' data-slide-to='$cont_slide'></li>";
                $cont_slide++;
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $cont_slide = 0;
            foreach ($this->Dados['sts_carousels'] as $carousel) {
                extract($carousel); ?>
                <div class="carousel-item <?php if ($cont_slide == 0) {
                                                echo 'active';
                                            } ?>">
                    <img class="d-block w-100" src="<?php echo URL . '/assets/imagens/carrossel/' . $id . '/' . $imagem; ?>" alt="Primeiro Slide">
                    <div class="container">
                        <div class="carousel-caption d-none d-md-block <?php echo $posicao_text ?>">
                            <h1><?php echo $titulo ?></h1>
                            <p><?php echo $descricao ?></p>
                            <p><a class="btn btn-lg btn-<?php echo $cor ?>" href="<?php echo $link ?>" role="button"><?php echo $titulo_botao ?></a></p>
                        </div>
                    </div>
                </div>
            <?php
                $cont_slide++;
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <div class="jumbotron servicos" id="portfolio">
        <div class="container">
            <?php
            extract($this->Dados['sts_portfolio'][0]);
            ?>
            <h4 class="display-4 text-center"><?php echo $titulo ?></h4>
            <div class="card-deck">
                <div class="card card-um">
                    <div class="img_card">
                        <img class="card-img-top" src="<?php echo URL.$imagem_um ?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $portfolio_um ?></h5>
                        <p class="card-text"><?php echo $descricao_um ?></p>
                    </div>
                </div>
                <div class="card card-dois">
                    <div class="img_card">
                        <img class="card-img-top" src="<?php echo URL.$imagem_dois ?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $portfolio_dois ?></h5>
                        <p class="card-text"><?php echo $descricao_dois ?></p>
                    </div>
                </div>
                <div class="card card-tres">
                    <div class="img_card">
                        <img class="card-img-top" src="<?php echo URL.$imagem_tres ?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $portfolio_tres ?></h5>
                        <p class="card-text"><?php echo $descricao_tres ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron blog-home" id="blog">
        <div class="container">
            <h2 class="display-4 text-center" style="margin-bottom: 40px;">Últimos Artigos</h2>
            <div class="redireciona_blog"><a href="<?php echo URL .'blog' ?>">Todos os artigos</a></div>
                <div class="card-deck blog-text">
                    <?php
                    $cont_slide = 0;
                    foreach ($this->Dados['sts_artigos'] as $artigos) {
                        extract($artigos); ?>
                            <div class="card art-um">
                                <a href="<?php echo URL .'artigo/'.$slug ?>">
                                    <img class="card-img-top" src='<?php echo URL."assets/imagens/artigo/".$id."/".$imagem ?>' alt="<?php echo $titulo?>">
                                </a>
                                <div class="card-body">
                                    <a href="<?php echo URL .'artigo/'.$slug ?>">
                                        <h5 class="card-title text-center text-primary"><?php echo $titulo?></h5>
                                    </a>
                                    <p class="card-text"><?php echo $descricao?></p>
                                    <p class="text-center"><a href="<?php echo URL .'artigo/'.$slug?>" class="btn btn-primary">Mais Detalhes</a></p>
                                </div>
                            </div>
                <?php $cont_slide++;
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron video" id="videos">
        <div class="container">
            <h4 class="display-4 text-center">Assista alguns vídeos</h4>
            <div class="containert text-center">
                <div class="row">
                    <?php
                    $cont_video = 0;
                    foreach ($this->Dados['sts_videos'] as $videos) {
                        extract($videos); ?>
                        <div class="col-sm box_video">
                            <div class="embed-responsive embed-responsive-16by9">
                                <video controls>
                                    <source src="<?php echo $video?>" type="video/mp4">
                                    <source src="<?php echo $video?>" type="video/ogg">
                                    Seu navegador não suporta esse tipo de vídeo.
                                </video>
                            </div>
                            <div>
                                <h5 class="card-title text-center"><?php echo $titulo ?></h5>
                                <p class="card-text"><?php echo $descricao ?></p>
                            </div>
                        </div>
                    <?php $cont_video++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron sobre-empresa" id="sobre_empresa">
        <div class="container c-sobre-empresa">
            <?php extract($this->Dados['sts_sobre_empresa'][0]); ?>
            <h2 class="display-4 text-center" style="margin-bottom: 40px;"><?php echo $titulo?></h2>
            <div class="row featurette">
                <div class="col-md-7 order-md-2 sobre-emp-text">
                    <p class="lead"><?php echo $descricao?></p>
                </div>
                <div class="col-md-5 order-md-1 sobre-emp-img">
                    <img class="featurette-image img-fluid mx-auto" src="<?php echo URL.$imagem ?>" alt="imagem RCSSFOT">
                </div>
            </div>
        </div>
    </div>
    <div class="jumbotron contato" id="contato">
        <div class="container c-contato text-center">
            <h2 class="display-4 text-center" style="margin-bottom: 40px;">Contato</h2>
            <?php 
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                if(isset($this->Dados['form'])){
                    $valorForm = $this->Dados['form'];
                }
            ?>
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome completo" value="<?php if(isset($valorForm['nome'])){ echo $valorForm['nome']; }?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Seu Melhor E-mail" value="<?php if(isset($valorForm['email'])){ echo $valorForm['email']; }?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Assunto</label>
                    <input type="text" class="form-control" name="assunto" placeholder="Assunto da mensagem"  value="<?php if(isset($valorForm['assunto'])){ echo $valorForm['assunto']; }?>" required>
                    <input type="hidden" class="form-control" name="created" value="<?php echo date("Y-m-d H:i:s") ?>" />
                </div>
                <div class="form-group">
                    <label>Mensagem</label>
                    <textarea class="form-control" name="mensagem" rows="6" required><?php if(isset($valorForm['mensagem'])){ echo $valorForm['mensagem']; }?></textarea>
                </div>
                <input type="submit" name="cad_contato" value="Enviar" class="btn btn-primary" />
            </form>
        </div>
    </div>
</main>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>