<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Partidas</th>
        </tr>

        <tbody>
            <?php foreach($listas as $lista): ?>
                <tr>
                    <td><?= htmlspecialchars($lista['grupo'])?></td>
                    <td><?= htmlspecialchars($lista['nome'])?></td>
                    <td><?= htmlspecialchars($lista['titulos'])?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
        
    </table>
    
</body>
</html>