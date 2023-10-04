<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display: inline-block;
            width: 100px;
        }
        table{
            border-collapse: collapse;
            margin-top: 10px;
        }
        td,
        th{
            border: 1px solid;
            padding: 5px;
        }
        form{
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <?php

        require "Model.php";
        require "View.php";
        
        if(isset($_GET['modifier']))
            formModifer($_GET['modifier']);

        if(isset($_POST['modifier']))
            modifierPersonneById($_POST['id'],$_POST['nom'],$_POST['prenom']);

        if(isset($_GET['supprimer']))
            supprimerPersonneById($_GET['supprimer']);

        if(isset($_GET['ajouter']))
            formAjouter();

        if(isset($_POST['ajouter']))
            ajouterPersonne($_POST['id'],$_POST['nom'],$_POST['prenom']);

        $personnes = getAllPersonnes() ;
        afficherPersones($personnes);

    ?>

    
</body>
</html>