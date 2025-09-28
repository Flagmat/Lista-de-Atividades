<?php

    try{
        $conexao = new PDO("mysql:dbname=listatividade;host=localhost;","root","");
    }
    catch(PDOException $erro){
        echo "Erro com banco de dados: ".$erro->getMessage();
    }
    catch(Exception){
        echo "Erro genérico: ".$erro->getMessage();    
    }


?>