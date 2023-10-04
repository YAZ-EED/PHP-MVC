<?php

    function afficherPersones ($personnes) {
        echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th colspan='2'>Action</th>
                </tr>";

        foreach($personnes as $personne){
        echo "<tr>
                <td>$personne->id</td>
                <td>$personne->nom</td>
                <td>$personne->prenom</td>
                <td><a href='" . $_SERVER["PHP_SELF"] . "?supprimer=" . $personne->id . "'>Supprimer</a></td>
                <td><a href='" . $_SERVER["PHP_SELF"] . "?modifier=" . $personne->id . "'>Modifier</a></td>
            </tr>";
        }

        echo "
            </table>
            <button><a href='" . $_SERVER["PHP_SELF"] . "?ajouter'>Ajouter</a></button>
        ";
  
    }


    function formModifer ($id) {

        $personne = getPersonneById($id);
        echo "
            <form action='index.php' method='post'>

                <input type='text' name='id' value='".  $personne->id . "' readonly><br>
                <input type='text' name='nom' value='".  $personne->nom . "'><br>
                <input type='text' name='prenom' value='".  $personne->prenom . "'><br>

                <input type='submit' value='modifier' name='modifier'>
            </form>
        ";
    }

    function formAjouter () {

        echo '
            <form action="index.php" method="post">

                <input type="text" name="id" placeholder="Entrer ' . "l'id" . '"><br>
                <input type="text" name="nom" placeholder="Entrer le nom"><br>
                <input type="text" name="prenom" placeholder="Entrer le prenom"><br>

                <input type="submit" value="Ajouter" name="ajouter">
            </form>
        ';
    }
