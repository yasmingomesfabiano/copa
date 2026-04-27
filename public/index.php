<?php
session_start();
// Carrega o autoloader do Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Define o caminho para a raiz do projeto (uma pasta acima da public)
define('BASE_PATH', dirname(__DIR__));

use App\Controller\JogadorController;
use App\Controller\Controller;

$app = new Controller();
$controller = new JogadorController();
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'atualizar') {
        $app->atualizarDados();
    } elseif ($action === 'atualizarJogador') {
        $controller->atualizarJogador();
    } elseif ($action === 'adicionarJogador') {
        $controller->adicionarJogador($id);
    } else {
        $app->salvar();
    }
} else {
    switch ($action) {
        case 'novo':
            $app->criar();
            break;

        case 'editar':
            $app->editar($id);
            break;

        case 'deletar':
            $app->deletar($id);
            break;

        case 'listar':
            $app->listar();
            break;

        case 'elenco':
            $controller->elenco($id);
            break;

        case 'adicionarJogador':
            $controller->adicionarJogador($id);
            break;

        case 'editarJogador':
            $controller->editarJogador($id);
            break;

        case 'deletarJogador':
            $controller->deletarJogador($id);
            break;

        default:
            $app->index();
            break;
    }
}