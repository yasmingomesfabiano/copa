<?php
require_once 'Model/Database.php';

class Jogador {
    private $conn;
    private $table = 'jogadores';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function buscarTodos() {
        $query = "SELECT id, nome, posicao, numeroCamisa, selecao_id FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($dados) {
        try {
            $query = "INSERT INTO " . $this->table . " (nome, posicao, numeroCamisa, selecao_id)
                      VALUES (:nome, :posicao, :numeroCamisa, :selecao_id)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':posicao', $dados['posicao']);
            $stmt->bindValue(':numeroCamisa', $dados['numeroCamisa'], PDO::PARAM_INT);
            $stmt->bindValue(':selecao_id', $dados['selecao_id'], PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarDados($dados) {
        try {
            $query = "UPDATE " . $this->table . "
                      SET nome = :nome, posicao = :posicao, numeroCamisa = :numeroCamisa, selecao_id = :selecao_id
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':posicao', $dados['posicao']);
            $stmt->bindValue(':numeroCamisa', $dados['numeroCamisa'], PDO::PARAM_INT);
            $stmt->bindValue(':selecao_id', $dados['selecao_id'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $dados['id'], PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscarId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listarPorSelecao($selecao_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE selecao_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $selecao_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function contarPorSelecao($selecao_id) {
        $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE selecao_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $selecao_id, PDO::PARAM_INT);
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }
    
    public function listarPorSelecaoPaginado($selecao_id, $limite, $offset) {
        $query = "SELECT * FROM " . $this->table . " WHERE selecao_id = :id LIMIT :limite OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $selecao_id, PDO::PARAM_INT);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}