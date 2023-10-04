<?php

    try {

        $con = new PDO('mysql:host=localhost;dbname=ville','root','',[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);

        function getAllPersonnes(){
            global $con;
            $pdoS = $con->query('select * from personne');
            $personnes = $pdoS->fetchAll();
            return $personnes;
        }

        function getPersonneById($id){
            global $con;
            $QuoteId = $con->quote($id);
            $pdoS = $con->query("
                select * from personne 
                where id = $QuoteId
            ");
            $personne = $pdoS->fetch();
            return $personne ;
        }

        function modifierPersonneById($id, $nom, $prenom){
            global $con;
            $prepare = $con->prepare("
                            update personne
                            set nom  = :nom,
                                prenom = :prenom
                            where id = $id
                        ");
            $prepare->execute([
                'nom' => $nom,
                'prenom' => $prenom,
            ]);
        }

        function supprimerPersonneById($id){
            global $con;
            $prepare = $con->prepare('
                delete from personne
                where id = :id
            ');

            $prepare->execute([
                'id' => $id
            ]);
        }

        function ajouterPersonne($id){
            global $con;
            $prepare = $con->prepare('
                        insert into personne(id,nom,prenom) values( :id, :nom, :prenom)
                    ');

            $prepare->execute([
                'id' => $_POST['id'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
            ]);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
?>