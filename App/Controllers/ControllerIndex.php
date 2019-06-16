<?php
defined('base_url') OR exit('Acesso direto não autorizado');
include(controller_url()."Controller.php");

class ControllerIndex extends Controller
{
    function __construct(){
        parent::__construct();
    }

    function index($data = array())
    {
        echo "Você está acessando o index do controller Index<br>";


    }

    function list()
    {
        echo "List";
    }
}
