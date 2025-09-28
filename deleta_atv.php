<?php
    include_once("conexao.php");
    $id = $_POST["id"];

    $resultado = $conexao->prepare("DELETE FROM atividades WHERE id = :id");
        $resultado->bindValue(":id",$id);
        $resultado->execute();

    header("Location: index.php");
?>