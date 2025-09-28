<?php
    include_once("conexao.php");

    if(isset($_POST['id']) && isset($_POST['status'])){
        $id = $_POST['id'];
        $status = $_POST['status'];

        $sql = $conexao->prepare("UPDATE atividades SET status = :status WHERE id = :id");
        $sql->bindParam(':status', $status);
        $sql->bindParam(':id', $id);
        $sql->execute();
    }

    header("Location: index.php");

?>