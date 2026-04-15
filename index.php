<?php
require_once './Model/Database.php';
require_once './Model/Selecao.php';
require_once './Controller/Controller.php';
require_once './Controller/JogadorController.php';
require_once './Model/Jogador.php';

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