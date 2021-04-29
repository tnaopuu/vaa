<?php
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=vaa;charset=utf8', 'root', 'root');
        }
        
    catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    $idJour = require_once "listeJours.php";
    /*$query = "select id, nom, prenom from membre m";
    $query .= "join reservation r on m.membre = r.membre";
    $query .= "and r.jour = :idJour";*/
    $req = $bdd->query("select id, nom, prenom from membre, reservation where membre.membre = reservation.membre and reservation.jour = 1");

    echo '<td>';
    echo '<p>' . $req['nom'] . ' ' . $req['prenom'] . '</p>';
    /*foreach ($req as $data){
            
        echo '<p>' . $data['nom'] . ' ' . $data['prenom'] . '</p>';
            
    }*/
    echo '</td>';
    $req->closeCursor();
?>