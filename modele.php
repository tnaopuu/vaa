<?php 
    function getJours()
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=vaa;charset=utf8', 'root', 'root');
        }
        
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $req = $bdd->query('SELECT id, jours FROM jours');

        return $req; 
    }

    
?>