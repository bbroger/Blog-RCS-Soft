<?php
session_start();

ob_start();

define ('URL', 'http://localhost/php_celke/site/');
define ('URLADM', 'http://localhost/php_celke/site/adm');
define ('CONTROLER', 'Home');
define ('METODO', 'index');

//credenciais do banco de dados
define('HOST', 'localhost');
define('USER', 'teste');
define('PASS', 'teste');
define('DBNAME', 'rcssoft_blog');
