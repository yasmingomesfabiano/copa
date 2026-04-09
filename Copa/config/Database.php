<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'copa_db';
    private $user = 'root';
    private $password = 'alunolab';
    public $conn;
    
    public function getConnection(){
        $this -> conn = null;

        try{
            $this -> conn = new PDO(
                "mysql:host = " .$this->host. "; db_name=" .$this->db_name, $this -> user, $this->password
            );
            $this -> conn -> exec("set names utf8");
            $this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Erro na conexão" . $e-> getMessage();
            die();
        }

        return $this -> conn;
    }
}

?>