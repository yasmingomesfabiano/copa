<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar informações</title>
</head>
<body>
    <h1>Adicionar Informações</h1>

    <form action="novo" method="post">
        
            <label>Informe o grupo </label>
            <input type="text" placeholder="Digite o grupo..." require autocrement="of">
            
            
            <label>Nome do time: </label>
            <input type="text" placeholder="Digite o nome do time..." require autocrement="of">

            <label>Informe quantos titulos cada time tem:</label>
            <input type="text" placeholder="Digite os titulos..." require autocrement="of">

            <button type="submit">Enviar</button>
            <a href="index.php">Voltar para a lista</a>

    </form>
    
</body>
</html>