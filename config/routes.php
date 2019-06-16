<?php
#Rota definindo o controller
$route = $uri_segments[1];

#Rota definindo controller e action, permitindo envio de parametros numéricos no segundo segmento
if (isset($uri_segments[2])  and ($uri_segments != '/' or $uri_segments != '')) {
    if (!is_numeric($uri_segments[2]) and $uri_segments[2] != '') {
        $route = $route.'/'.$uri_segments[2];
    }

}

switch ($route) {
    //Exemplo de definição de rota.
    case 'index':
            //Exemplo de chamada de controller.
            $cindex = load('controller','ControllerIndex');
            //Exemplo de chamada de action.
            $cindex->index();

            //Exemplo de passagem de dados em array.
            $data = array(
                "nome" => "Vinicius",
                "idade" => 18
            );

            $values = array_values($data);
            $values = implode("','",$values);

            echo "'{$values}'";

    break;

    //Exemplo de definição de rota.
    case'index/list':
        //Exemplo de invocação de controller e sua action.
        $cindex = load('controller','ControllerIndex');
        $cindex->list();
    break;

    default:

        redirect(base_url()."/index");
    break;
}
