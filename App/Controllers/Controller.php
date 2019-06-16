<?php
defined('base_url') OR exit('Acesso direto não autorizado');
include(model_url()."Model.php");

abstract class Controller
{

    function __construct()
    {
        //O model principal é adicionado automaticamente no construtor.
        //Deve-se chamar o construtor em todos os Controllers filhos.
        //Ex: parent::__construct();
        $this->model = new Model;
    }

    //Cria um array através de uma query enviaa como parâmetro.
    function FetchArray($query){
        return mysqli_fetch_all($query);
    }

    //Retorna o número de linhas retornadas de uma Query, com essa passada como parâmetro.
    function NumRows($query)
    {
        return mysqli_num_rows($query);
    }

}
