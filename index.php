<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista de Atividades</title>
</head>
<body>
    <?php
        include_once("conexao.php");
    ?>

    <section id="principal">
        <h1>Lista de Atividades</h1>
        
        <div id="atividades">
            
        </div>
        
        <button type="button" onclick="window.location.href='cadastra_atv.php'">Cadastrar Atividade</button>

    </section>  
</body>
</html>