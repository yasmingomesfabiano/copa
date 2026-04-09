<?php

require_once './Controller/Controller.php';

$app = new SelecaoController();
$action = $_GET['action'] ?? ''; 
$id = $_GET['action'] ?? ''; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($action == 'atualizar'){
        $app -> atualizarDados();
    }else{
        $app -> salvar();
    }
    $app -> salvar();
}else{
   switch($action){
    case 'novo':
        require_once '.View/create.php'; 
        break;
    
    case 'editar':
        $app -> editar($id);
        break;

    case 'deletar':
        $app -> deletar($id);
        break;
    
    default:
        $app -> index();
        break;
   }
}
