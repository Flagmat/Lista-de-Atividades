<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                $sql = $conexao->prepare("SELECT id,nome,descricao,data_criacao,status FROM atividades WHERE status = 's'");
                $sql->execute();
                $atividades = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
            
                <table>
            <?php
                if(count($atividades) > 0 ){
                    foreach($atividades as $dados){ ?>      
                        <tr>
                                <td><?php echo $dados['nome'];?></td>
                                <td><?php echo $dados['descricao'];?></td>
                                <td><?php echo $dados['data_criacao'];?></td>
                                <td>
                                    <form action="atualiza_atv.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <input type="hidden" name="status" value="">
                                        <input type="checkbox" onchange="this.form.status.value = this.checked ? 'f' : 's'; this.form.submit()"
                                        <?php echo ($dados['status'] == 'f') ? 'checked' : ''; ?>>
                                    </form>
                                </td>
                                <td>
                                    <form action="deleta_atv.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                        <button type="submit" b>Deletar</button>
                                    </form>
                                </td>
                        </tr>
            <?php
                    }
                }
                else{
                    echo "<p>Atividade não encontrada. Cadastre alguma para ser exibida.</p>";
                } ?>
                </table>
        </div>
        <h3 id="Concluidas" style="cursor:pointer;">Concluídas ▼</h3>
        <div id="atv_completas">
            
            <?php
                $sql = $conexao->prepare("SELECT id,nome,descricao,data_criacao,status FROM atividades WHERE status = 'f'");
                $sql->execute();
                $atividades = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <table>
            <?php
                if(count($atividades) > 0 ){
                    foreach($atividades as $dados){ ?>      
                        <tr>
                            <td><?php echo $dados['nome'];?></td>
                            <td><?php echo $dados['descricao'];?></td>
                            <td><?php echo $dados['data_criacao'];?></td>
                            <td>
                                <form action="atualiza_atv.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <input type="hidden" name="status" value="">
                                    <input type="checkbox" onchange="this.form.status.value = this.checked ? 'f' : 's'; this.form.submit()"
                                    <?php echo ($dados['status'] == 'f') ? 'checked' : ''; ?>>
                                </form>
                            </td>
                            <td>
                                <form action="deleta_atv.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="submit">Deletar</button>
                                </form>
                            </td>
                        </tr>
            <?php
                    }   
                } ?>
                </table>        
        </div>
        
        <button type="button" onclick="window.location.href='cadastra_atv.php'" id="btn-cadastra">Cadastrar Atividade</button>

    </section>  
    <script>
        const titulo = document.getElementById("Concluidas");
        const concluidas = document.getElementById("atv_completas");
        let aberto = false;

        titulo.addEventListener("click", () => {
            aberto = !aberto;
            concluidas.style.display = aberto ? "block" : "none";
            titulo.innerHTML = "Concluídas " + (aberto ? "▲" : "▼"); 
        });
    </script>
</body>
</html>