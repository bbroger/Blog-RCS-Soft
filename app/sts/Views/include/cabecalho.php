<!doctype html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    if (!empty($this->Dados['sts_seo'][0])) {
        extract($this->Dados['sts_seo'][0]);
        echo "<title>$titulo</title>";
        echo "<meta name='robots' content='$tipo_rob'>";
        echo "<meta name='description' content='$description'>";
        echo "<meta name='author' content='$author'>";
        echo "<link rel='canonical' href='" . URL . "$endereco'>";
        echo "<meta name='keywords' content='$keywords'>";

        //Tags SEO Facebook
        echo "<meta property='og:site_name' content='$og_site_name'>";
        echo "<meta property='og:locale' content='$og_locale'>";
        //https://pt.piliapp.com/facebook/id/
        echo "<meta property='fb:admins' content='$fb_admins'>";
        echo "<meta property='og:url' content='" . URL . "$endereco'>";
        echo "<meta property='og:title' content='$titulo'>";
        echo "<meta property='og:description' content='$description'>";
        echo "<meta property='og:image' content='" . URL . "assets/$dir_img/$id/$imagem'>";
        echo "<meta property='og:type' content='website'>";
        echo "<meta property='og:image:width' content='1200'>";
        echo "<meta property='og:image:height' content='630'>";
        //https://developers.facebook.com/tools/debug/

        //Tags SEO Twitter
        echo "<meta name='twitter:site' content='$twitter_site'>";
        echo "<meta name='twitter:card' content='summary_large_image'>";
        echo "<meta name='twitter:title' content='$titulo'>";
        echo "<meta name='twitter:description' content='$description'>";
        echo "<meta name='twitter:image:src' content='" . URL . "$dir_img/$id/$imagem'>";
        //https://cards-dev.twitter.com/validator

        //Tags SEO Google+
        echo "<meta itemprop='name' content='$titulo'>";
        echo "<meta itemprop='description' content='$description'>";
        echo "<meta itemprop='image' content='" . URL . "$dir_img/$id/$imagem'>";
        echo "<meta itemprop='url' content='" . URL . "$endereco'>";
    }
    ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/css/personalizado.css">
    <link rel="icon" href="<?php echo URL; ?>assets/imagens/icone/rcssoft.ico">
</head>
<body>