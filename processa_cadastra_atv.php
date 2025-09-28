<?php

    include_once("conexao.php");

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    try{
        $resultado = $conexao->prepare("INSERT INTO atividades(nome,descricao,data_criacao) VALUES(:nome,:descricao,:data_criacao)");

        $resultado->bindValue(":nome",$nome);
        $resultado->bindValue(":descricao",$descricao);
        $resultado->bindValue(":data_criacao",date("Y/m/d"));
        $resultado->execute();

        header("location: index.php");
    }
    catch(PDOException $erro){
        echo "Erro com banco de dados: ".$erro->getMessage();
    }
    catch(Exception){
        echo "Erro genérico: ".$erro->getMessage();    
    }
?>