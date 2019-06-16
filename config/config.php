<?php

#Constantes
if(!defined('base_url')){
    define('base_url',$_SERVER['HTTP_HOST']);
}

if(!defined('document_url')){
    define('document_url',$_SERVER['DOCUMENT_ROOT']);
}

#define('project_folder','MVC'); -- Usar caso o projeto esteja em uma subpasta em relação ao servidor

#Funções
require_once('functions.php');

#URI
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$request_uri = filter_input(INPUT_SERVER,'REQUEST_URI');
#Se a uri[1] estiver vazia, a rota index é invocada
if ($uri_segments[1] == "") {
    redirect('index');
}
