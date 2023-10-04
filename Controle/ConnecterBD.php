<?php

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_exercices','root','');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
?>