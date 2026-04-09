<?php
class Selecao{
    private $conn;
    private $table = 'selecoes';
    
    public function __construct($db){
        $this -> conn = $db;
    }

    public function buscarTodos(){
        $query = " SELECT id, nome, grupo, titulos, criado_em, rival, dat, hora FROM " . $this -> table;
        $stmt = $this -> conn -> prepare($query);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    /*CRUD*/
    /*CREATE*/
    public function salvar($dados){
        $query = " INSERT INTO " .$this -> table . "(nome, grupo, titulos, titulos_rival rival, dat,hora) VALUES (:nome, :grupo, :titulos, :rival, :hora, :dat, :titulos_rival)";
        $stmt -> $this -> conn -> prepare($query);

        $stmt -> bindParam(':nome', $dados['nome']);
        $stmt -> bindParam(':grupo', $dados['grupo']);
        $stmt -> bindParam(':titulos', $dados['titulos']);

        return $stmt -> execute();
    }

    /*UPDATE*/
    public function atualizarDados($dados){
        $query = " UPDATE " . $this->table ."SET nome = :nome, grupo = :grupo, titulo = :titulo, titulos_rivais = :titulos_rivais, rival = :rival, dat = :dat, hora = :hora WHERE id = :id";
        $stmt = $this -> conn -> prepare($query);
        $stmt -> bindParam(':nome', $dados['nome']);
        $stmt -> bindParam(':grupo', $dados['grupo']);
        $stmt -> bindParam(':titulos', $dados['titulos']);
        $stmt -> bindParam(':rival', $dados ['rival']);
        $stmt -> bindParam(':id', $dados ['id']);
        $stmt -> bindParam(':dat', $dados ['dat']);
        $stmt -> bindParam(':hora', $dados ['hora']);
        $stmt -> bindParam(':titulos_rival', $dados['titulos_rival']);
        return $stmt -> execute();
    }

    public function buscarId($id){
        $query =" SELECT * FROM " . $this -> table . " WHERE id = ? LIMT 0,1";
        $stmt = $this -> conn -> prepare($query);
        $stmt = bindParam(1, $id);
        $stmt -> execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
        
    }

    /*DELETE*/
    public function deletar($id){
        $query = " DELTE FROM " . $this->table . "WHERE id=?";
        $stmt = $this -> conn -> prepare($query);
        $stmt -> bindParam(1, $id);
        return $stmt -> execute();
    }

}









?>