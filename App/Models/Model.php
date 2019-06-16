<?php
defined('base_url') OR exit('Acesso direto não autorizado');
class Model
{
    private $database = array();
    private $connection;
    private $string;
    private $query;

    public function __construct()
    {
        #Banco de dados definido como array
        $this->database = array(
                "host" => "localhost",
                "user" => "admin",
                "password" => "47513628",
                "database" => "evolutie"
        );

    }


    #Conexão com o BD
    public function Connect()
    {
        #Função de conexão MYSQLI sendo atribuída ao atributo connection
        $this->connection = mysqli_connect(
                                            $this->database['host'],
                                            $this->database['user'],
                                            $this->database['password'],
                                            $this->database['database']
                                        );

        #Se a conexão aconteceu a mesma é retornada, caso contrário
        #O erro é retornado

        if ($this->connection) {
            return $this->connection;
        }else{
            return mysqli_error($this->connection);
        }
    }

    #Executa uma query passada como parâmetro
    protected function Query($query){
        return mysqli_query($this->Connect(),$query);
    }

    #Executa uma inserção no BD
    public function Insert($table,$data = array())
    {
        #Separa as chaves do array como campos, por vírgula
        $fields = array_keys($data);
        $fields = implode(',',$fields);

        #Separa os valores do array, por vírgula e aspas simples
        $values = array_values($data);
        $values = implode("','",$values);

        #Monta a sentença SQL para inserção, concetenando os valores
        $this->string = "INSERT INTO {$table}($fields) VALUES('{$values}')";

        #Executa a Query
        $this->query = $this->Query($this->string);

        #Verifica se a query foi executada com sucesso
        if ($this->query) {
            return $this->query;
        }else{
        #Se não foi executada, retorna o erro
            return mysqli_error($this->query);
        }

    }

    #Executa uma alteração no BD
    public function update($table,$field,$value,$where)
    {
        #Monta a sentença SQL, realizando update em um único campo
        $this->string = "UPDATE {$table} SET {$field} = {$value}  WHERE {$where} ";

        #Executa a Query
        $this->Query($this->string);

        #Verifica se a query foi executada com sucesso
        if ($this->query) {
            return $this->query;
        }else{
        #Se não foi executada, retorna o erro
            return mysqli_error($this->query);
        }

    }

    #Realiza uma exclusão no BD
    public function delete($table,$field,$value)
    {
        #Prepara a sentença SQL de delete
        $this->string = "DELETE FROM {$table} WHERE {$field} = {$value}";

        #Executa a Query
        $this->Query($this->string);

        #Verifica se a query foi executada com sucesso
        if ($this->query) {
            return $this->query;
        }else{
        #Se não foi executada, retorna o erro
            return mysqli_error($this->query);
        }

    }

    #Realiza uma seleção no BD
    public function select($column,$table,$field,$value,$extra = "")
    {
        #Prepara a sentença SQL de seleção
        $this->string = "SELECT {$column} FROM {$table} WHERE {$field} = {$value} {$extra}";

        #Executa a Query
        $this->Query($this->string);

        #Verifica se a query foi executada com sucesso
        if ($this->query) {
            return $this->query;
        }else{
        #Se não foi executada, retorna o erro
            return mysqli_error($this->query);
        }

    }

    #Fecha a conexão com o banco
    public function Disconnect()
    {
        return $this->connection = mysqli_close($this->connection);
    }





}
