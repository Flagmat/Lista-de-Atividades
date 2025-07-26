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
            <h3>A Serem Concluidas</h3>
            <?php
                $sql = $conexao->prepare("SELECT nome,descricao,data_criacao FROM atividades WHERE status = 's'");
                $sql->execute();
                $atividades = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
            
                <table>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
            <?php
                if(count($atividades) > 0 ){
                    foreach($atividades as $dados){ ?>      
                        <tr>
                            <td><?php echo $dados['nome'];?></td>
                            <td><?php echo $dados['descricao'];?></td>
                            <td><?php echo $dados['data_criacao'];?></td>
                            <td><input type="checkbox" name="status" ></td>
                        </tr>
            <?php
                    }
                }
                else{
                    echo "<p>Atividade não encontrada. Cadastre alguma para ser exibida.</p>";
                } ?>
                </table>
        </div>

        <div id="atv_completas">
            <h3>Concluidas</h3>
            <?php
                $sql = $conexao->prepare("SELECT nome,descricao,data_criacao FROM atividades WHERE status = 'f'");
                $sql->execute();
                $atividades = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <table>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data de Criação</th>
            <?php
                if(count($atividades) > 0 ){
                    foreach($atividades as $dados){ ?>      
                        <tr>
                            <td><?php echo $dados['nome'];?></td>
                            <td><?php echo $dados['descricao'];?></td>
                            <td><?php echo $dados['data_criacao'];?></td>
                            <td><input type="checkbox" name="status" ></td>
                        </tr>
            <?php
                    }
                } ?>
                </table>        
        </div>
        
        <button type="button" onclick="window.location.href='cadastra_atv.php'">Cadastrar Atividade</button>

    </section>  
</body>
</html>