<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        if(isset($_GET['id'])) : 

            include 'ConnecterBD.php';

            $req = $pdo->quote($_GET['id']);
            
            $exerciceS = $pdo->query("
                select * from exercice 
                where id = $req
            ");
            
            $exercice = $exerciceS->fetch(PDO::FETCH_OBJ);

        ?>

        <form action="Accueil.php" method="post">

            <input type="text" name="id" value="<?= $exercice->id ?>" readonly><br>
            <input type="text" name="titre" value="<?= $exercice->titre ?>"><br>
            <input type="text" name="auteur" value="<?= $exercice->auteur ?>"><br>
            <input type="text" name="dateC" value="<?= $exercice->dateC ?>"><br>

            <input type="submit" value="modifier" name="button">

        </form>

    <?php endif ; ?>

</body>
</html>