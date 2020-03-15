<?php
if (!defined('URL')) {
    header("LOCATION: /");
    exit();
}
/*var_dump($this->Dados['sts_art_prox']);
echo "<br/>";
var_dump($this->Dados['sts_art_ant']);*/
?>
<main role="main">

    <div class="jumbotron blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <?php
                    if (!empty($this->Dados['sts_detalhe_artigo'][0])) { 
                         extract($this->Dados['sts_detalhe_artigo'][0]); ?>
                        <div class="blog-post">
                            <h2 class="blog-post-title"><?= $titulo; ?></h2>
                            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
                            <img src='<?= URL."assets/imagens/artigo/".$id."/".$imagem ?>' class="img-fluid" alt="<?= $titulo; ?>" style="margin-bottom: 20px;">
                            <?= $conteudo; ?>
                        </div>
                        <nav class="blog-pagination">
                            <?php 
                                if (!empty($this->Dados['sts_art_ant'][0])) {
                                    echo "<a class='btn btn-outline-primary' href='".URL."artigo/".$this->Dados['sts_art_ant'][0]['slug']."'>Anterior</a>";
                                } else {
                                    echo "<a class='btn btn-outline-secondary disabled'>Anterior</a>";
                                }

                                if (!empty($this->Dados['sts_art_prox'][0])) {
                                    echo "<a class='btn btn-outline-primary' href='".URL."artigo/".$this->Dados['sts_art_prox'][0]['slug']."'>Próximo</a>";
                                } else {
                                    echo "<a class='btn btn-outline-secondary disabled'>Próximo</a>";
                                }
                            ?>
                        </nav>
                    <?php } else {
                        echo "<div class='alert alert-danger alert-dismissible text-center alerta'><a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Artigo não encontrado.</div>";
                    }
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