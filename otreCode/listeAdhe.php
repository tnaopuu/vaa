<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=vaa;charset=utf8', 'root', '');
    }
    
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }            

    $req = $bdd->query('SELECT id, nom, prenom FROM membre');

    echo '<td>';
        foreach ($req as $data){
            echo '<p>' . $data['nom'] . ' ' . $data['prenom'] . '</p>';
        }
    echo '</td>';

    $req->closeCursor();

?>