<?php
    if(isset($_GET['id'])){

        include 'ConnecterBD.php';

        try {

            $prepare = $pdo->prepare('
                delete from exercice
                where id = :id
            ');

            $prepare->execute([
                'id' => $_GET['id']
            ]);

            header('location:Accueil.php');
            exit();

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }
?>