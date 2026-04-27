<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/icone.png">
    <link href="https://fonts.cdnfonts.com/css/snaps-taste-outline" rel="stylesheet">
                
</head>
<body>
    <h1>Elenco de <?= htmlspecialchars($selecao['nome'] ?? 'Seleção Desconhecida') ?></h1>

    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'criado'): ?>
        <p>Jogador cadastrado com sucesso!</p>
    <?php endif; ?>

    <p>
        <a class="btn_novaSelecao" href="index.php?action=adicionarJogador&id=<?= $selecao['id'] ?>">
            Adicionar jogador no elenco
        </a>
    </p>

    <table>
        <tr>
            <th>Nome</th>
            <th>Posição</th>
            <th>Número</th>
            <th></th>
        </tr>

        <?php if (!empty($jogadores)): ?>
            <?php foreach ($jogadores as $jogador): ?>
                <tr>
                    <td><?= htmlspecialchars($jogador['nome']) ?></td>
                    <td><?= htmlspecialchars($jogador['posicao']) ?></td>
                    <td><?= htmlspecialchars($jogador['numeroCamisa']) ?></td>
                    <td class="actions">
                        <a class="edit" href="index.php?action=editarJogador&id=<?= $jogador['id'] ?>">Editar</a>
                        <a  class="delete"  href="index.php?action=deletarJogador&id=<?= $jogador['id'] ?>"
                           onclick="return confirm('Tem certeza?')">
                            Apagar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Nenhum jogador cadastrado para essa seleção ainda.</td>
            </tr>
        <?php endif; ?>
    </table>

    <button onclick="window.location.href='index.php?action=listar'" class="btn_voltar">
        Voltar para a listagem
    </button>
    <div class="paginacao">
    <?php if ($pagina > 1): ?>
        <a class="pag-btn" href="index.php?action=elenco&id=<?= $selecao['id'] ?>&pagina=<?= $pagina - 1 ?>">« Anterior</a>
    <?php endif; ?>

    <?php
    $inicio = max(1, $pagina - 2);
    $fim = min($totalPaginas, $pagina + 2);
    for ($i = $inicio; $i <= $fim; $i++):
    ?>
        <a class="pag-btn <?= $i == $pagina ? 'ativo' : '' ?>" href="index.php?action=elenco&id=<?= $selecao['id'] ?>&pagina=<?= $i ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($pagina < $totalPaginas): ?>
        <a class="pag-btn" href="index.php?action=elenco&id=<?= $selecao['id'] ?>&pagina=<?= $pagina + 1 ?>">Próxima »</a>
    <?php endif; ?>
</div>
</body>
</html>