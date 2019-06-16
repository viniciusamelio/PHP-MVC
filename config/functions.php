<?php
//Caminho base do projeto
function base_url()
{
    return "http://".base_url;
}
//Caminho da pasta css
function css_url()
{
    return base_url()."/public/css/";
}
//Caminho da pasta Images
function image_url()
{
    return base_url()."/public/images/";
}
//Caminho da pasta js
function js_url()
{
    return base_url()."/public/js/";
}
//Caminho da pasta de Models
function model_url()
{
    return document_url."/App/Models/";
}
//Caminho da pasta de Views
function view_url()
{
    return document_url."/App/Views/";
}
//Caminho da pasta de Controllers
function controller_url()
{
    return document_url."/App/Controllers/";
}
//Caminho da pasta de Libraries
function librarie_url()
{
    return document_url."/App/Libraries/";
}
//Caminho físico do documento
function document_url(){
    return document_url;
}
//Redirecionamento
function redirect($page)
{
    header("Location:{$page}");
}

//Carregamento dos arquivos MVC
//$type = Tipo do arquivo
//$file = Nome do arquivo
// --É necessário atribuir essa a um objeto--
function load($type,$file)
{
    //Se o tipo for controller
    if ($type == "controller")
    {
        //É verificado se arquivo existe
        if (file_exists(controller_url().$file.".php"))
        {
            //Se existir o arquivo é incluído
        require_once(controller_url().$file.".php");
            //O arquivo é instanciado
        $file = new $file;
            //E retornado
        return $file;
        }
        //Se o tipo for model
    }elseif ($type == "model") {
        if (file_exists(model_url().$file.".php"))
        {
        require_once(model_url().$file.".php");
        $file = new $file;
        return $file;
        }
        //Se o tipo for view
    }elseif($type == "view"){
        if (file_exists(view_url().$file.".php"))
        {
        include_once(view_url().$file.".php");
        }
    }
}
