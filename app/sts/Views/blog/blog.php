<?php
if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}
//var_dump($this->Dados);
?>
<main role="main">
    <div class="jumbotron blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php
                    if (empty($this->Dados['artigos'])) {
                        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible text-center alerta'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Nenhum artigo cadastrado.</div>";
                    }
                    foreach ($this->Dados['artigos'] as $artigo) {
                        extract($artigo); ?>
                        <div class="row featurette">
                            <div class="col-md-7 order-md-2 blog-text">
                                <a href="<?php echo URL . 'artigo/' . $slug ?>">
                                    <h2 class="featurette-heading text-primary"><?php echo $titulo ?></h2>
                                </a>
                                <p class="lead"><?php echo $descricao ?> <a href="<?php echo URL . 'artigo/' . $slug ?>" class="text-primary">Continuar lendo</a></p>
                            </div>
                            <div class="col-md-5 order-md-1 blog-img">
                                <a href="<?php echo URL . 'artigo/' . $slug ?>">
                                    <img class="featurette-image img-fluid mx-auto" src='<?= URL."assets/imagens/artigo/".$id."/".$imagem ?>' alt="<?php echo $titulo ?>">
                                </a>
                            </div>
                        </div>
                        <hr class="featurette-divider">
                    <?php }
                    echo $this->Dados['paginacao'];
                    ?>
                </div>
                <aside class="col-md-4 blog-sidebar">
                    <?php if (!empty($this->Dados['sts_sobre_autor'][0])) {
                        extract($this->Dados['sts_sobre_autor'][0]); ?>
                        <div class="p-3 mb-3 bg-light rounded">
                            <img src="<?php echo URL . 'assets/imagens/sobre_autor/' . $id . '/autor.jpg' ?>" class="img-fluid" alt="<?php echo $titulo ?>">
                            <h4 class="font-italic"><?php echo $titulo ?></h4>
                            <p class="mb-0"><?php echo utf8_encode($descricao) ?></p>
                        </div>
                    <?php } ?>
                    <div class="p-3">
                        <h4 class="font-italic">Recentes</h4>
                        <ol class="list-unstyled mb-0">
                            <?php
                            foreach ($this->Dados['artigos_recentes'] as $artigos_recentes) {
                                extract($artigos_recentes);
                                echo "<li><a href='" . URL . "artigo/$slug'>$titulo</a></li>";
                            }
                            ?>
                        </ol>
                    </div>

                    <div class="p-3">
                        <h4 class="font-italic">Mais acessados</h4>
                        <ol class="list-unstyled">
                            <?php
                            foreach ($this->Dados['artigos_mais_vistos'] as $artigos_mais_vistos) {
                                extract($artigos_mais_vistos);
                                echo "<li><a href='" . URL . "artigo/$slug'>$titulo</a></li>";
                            }
                            ?>
                        </ol>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>