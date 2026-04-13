<?php
require_once "./Model/Database.php";
class Selecao {
    private $conn;
    private $table = 'selecoes';
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function buscarTodos() {
        $query = " SELECT id, nome, grupo, titulos, bandeira FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($dados) {
        try {
            $query = "INSERT INTO " . $this->table . " (nome, grupo, titulos, bandeira) VALUES (:nome, :grupo, :titulos, :bandeira)";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':grupo', $dados['grupo']);
            $stmt->bindParam(':titulos', $dados['titulos']);
            $stmt->bindParam(':bandeira', $dados['bandeira']);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function atualizarDados($dados) {
        try {
            $query = "UPDATE " . $this->table . " SET nome = :nome, grupo = :grupo, titulos = :titulos, bandeira = :bandeira WHERE id = :id";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':grupo', $dados['grupo']);
            $stmt->bindParam(':titulos', $dados['titulos']);
            $stmt->bindParam(':bandeira', $dados['bandeira']);
            $stmt->bindParam(':id', $dados['id']);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscarId($id) {
        $query = " SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 1 ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        $query = " DELETE FROM " . $this->table . " WHERE id=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function getSelecoes($grupo = '') {
        $sql = "SELECT * FROM " . $this->table . " WHERE 1=1";
        $params = [];
        
        if (!empty($grupo)) {
            $sql .= " AND grupo = ?";
            $params[] = $grupo;
        }
        
        $sql .= " ORDER BY grupo, nome";
        
        $stmt = $this->conn->prepare($sql);
        foreach($params as $index => $param) {
            $stmt->bindValue($index + 1, $param);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSelecoesPaginadas($grupo = '', $pagina = 1, $limite = 5) {
        $offset = ($pagina - 1) * $limite;
    
        $sql = "SELECT * FROM " . $this->table . " WHERE 1=1";
        $params = [];
    
        if (!empty($grupo)) {
            $sql .= " AND grupo = :grupo";
            $params[':grupo'] = $grupo;
        }
    
        $sql .= " ORDER BY grupo, nome LIMIT :limite OFFSET :offset";
    
        $stmt = $this->conn->prepare($sql);
    
        if (!empty($grupo)) {
            $stmt->bindValue(':grupo', $grupo, PDO::PARAM_STR);
        }
    
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function contarSelecoes($grupo = '') {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table . " WHERE 1=1";
        $params = [];
        
        if (!empty($grupo)) {
            $sql .= " AND grupo = ?";
            $params[] = $grupo;
        }
        
        $stmt = $this->conn->prepare($sql);
        foreach($params as $index => $param) {
            $stmt->bindValue($index + 1, $param);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
?>