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
    </style>
</head>
<body>

    <?php

        if(!empty($_POST)){

            include 'ConnecterBD.php';

            try {

                switch($_POST['button']){

                    case 'Ajouter' :

                        $prepare = $pdo->prepare('
                        insert into exercice(titre,auteur,dateC) values( :titre, :auteur, :dateC)
                        ');

                        $prepare->execute([
                            'titre' => $_POST['titre'],
                            'auteur' => $_POST['auteur'],
                            'dateC' => $_POST['dateC'],
                        ]);

                        echo 'Bien ajouter'; 
                        break ;

                    case 'modifier' :

                        $prepare = $pdo->prepare('

                            update exercice
                            set titre  = :titre,
                                auteur = :auteur,
                                dateC  = :dateC
                            where id = :id

                        ');

                        $prepare->execute([
                            'id' => $_POST['id'],
                            'titre' => $_POST['titre'],
                            'auteur' => $_POST['auteur'],
                            'dateC' => $_POST['dateC'],
                        ]);

                        break ;

                }

            } catch (PDOException $e) {

                echo $e->getMessage();

            }

        }
    ?>
    
    <form action="" method="post">

        <fieldset>

            <legend>Ajouter un exercice</legend>

            <label>Titre</label>
            <input type="text" name="titre"><br>

            <label>Auteur</label>
            <input type="text" name="auteur"><br>

            <label>Date creation</label>
            <input type="date" name="dateC"><br>

            <input type="submit" value="Ajouter" name="button">

        </fieldset>

    </form>

    <?php

        include 'ConnecterBD.php';

        try {

            $pdoS = $pdo->query('select * from exercice');
            $exercices = $pdoS->fetchAll(PDO::FETCH_OBJ);
            
            if(count($exercices)>0){

                echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date</th>
                        <th colspan='2'>Action</th>
                    </tr>";

                foreach($exercices as $exercice){
                    echo "<tr>
                            <td>$exercice->id</td>
                            <td>$exercice->titre</td>
                            <td>$exercice->auteur</td>
                            <td>$exercice->dateC</td>
                            <td><a href='modifier.php?id=" . $exercice->id . "'>Modifier</td>
                            <td><a href='supprimer.php?id=" . $exercice->id . "'>Supprimer</td>
                        </tr>";
                }

                echo "</table>";
                
            }

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    ?>

</body>
</html>

