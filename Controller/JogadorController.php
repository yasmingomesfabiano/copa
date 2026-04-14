<?php
require_once 'Model/Database.php';
require_once 'Model/Jogador.php';

class JogadorController {
    private $db;
    private $jogador;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->jogador = new Jogador($this->db);
    }

    public function elenco($id) {
        $selecao_id = (int)$id;
        if (!$selecao_id) {
            header('Location: index.php');
            exit();
        }
    
        $pagina = max(1, (int)($_GET['pagina'] ?? 1));
        $limite = 6;
    
        $totalJogadores = $this->jogador->contarPorSelecao($selecao_id);
        $totalPaginas = max(1, (int)ceil($totalJogadores / $limite));
    
        if ($pagina > $totalPaginas) {
            $pagina = $totalPaginas;
        }
    
        $offset = ($pagina - 1) * $limite;
    
        $jogadores = $this->jogador->listarPorSelecaoPaginado($selecao_id, $limite, $offset);
        $selecao = $this->buscarSelecao($selecao_id);
    
        require_once 'View/elenco.php';
    }

    public function adicionarJogador($selecao_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'          => $_POST['nome'] ?? '',
                'posicao'       => $_POST['posicao'] ?? '',
                'numeroCamisa'  => $_POST['numeroCamisa'] ?? 0,
                'selecao_id'    => $selecao_id
            ];
    
            $success = $this->jogador->salvar($dados);
    
            if ($success) {
                header('Location: index.php?action=elenco&id=' . $selecao_id . '&status=sucesso&msg=Jogador cadastrado com sucesso');
                exit();
            } else {
                header('Location: index.php?action=elenco&id=' . $selecao_id . '&status=erro&msg=Erro ao cadastrar jogador');
                exit();
            }
        }

    
        // Se for GET, mostra o formulário
        $selecao = $this->buscarSelecao($selecao_id);
        require_once 'View/cadastrarJogador.php'; // nome do arquivo de formulário
    }

    private function buscarSelecao($id) {
        $sql = "SELECT id, nome, grupo FROM selecoes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function editarJogador($id) {
        $jogador = $this->jogador->buscarId($id);
        if (!$jogador) {
            header('Location: index.php?status=erro&msg=Jogador não encontrado');
            exit();
        }
    
        $selecao = $this->buscarSelecao($jogador['selecao_id']);
        require_once 'View/editarJogador.php';
    }
    
    public function deletarJogador($id) {
        if ($this->jogador->deletar($id)) {
            header('Location: index.php?status=sucesso&msg=Jogador excluído com sucesso');
            exit();
        }
    
        header('Location: index.php?status=erro&msg=Erro ao excluir jogador');
        exit();
    }
}