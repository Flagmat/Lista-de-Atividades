<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Atividade</title>
</head>
<body>
    <?php
        include_once("conexao.php");
    ?>

    <section id="principal">
        <h1>Cadastro de Atividades</h1>
        
        <form action="processa_cadastra_atv.php" method="post">
            <p>
                <label for="nome">Nome da Atividade</label><br>
                <input type="text" name="nome">
            </p>
            <p>
                <label for="descricao">Descrição da Atividade</label><br>
                <textarea name="descricao"></textarea>
            </p>
            <p>
                <input type="submit" value="Cadastrar">
            </p>
        </form>
        

    </section>  
</body>
</html>