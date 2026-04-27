<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogador</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">
                
</head>
<body>
    <div class="content">
        <h1 class="AdicionarSelecao">Adicionar Jogador</h1>

        <form method="POST" action="index.php?action=adicionarJogador&id=<?= $selecao['id'] ?>">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" placeholder="João Silva" required autocomplete="off">
            </div>

            <div class="form-group">
                <label>Posição do jogador:</label>
                <input type="text" name="posicao" placeholder="ex: Goleiro" required autocomplete="off">
            </div>

            <div class="form-group">
                <label>Número da camisa:</label>
                <input type="number" name="numeroCamisa" min="0" placeholder="ex: 05" required autocomplete="off">
            </div>

            <button type="submit" class="btn-save">Salvar Jogador</button>
        </form>
    </div>
</body>
</html>