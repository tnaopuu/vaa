<?php
    function getAdherentPlace()
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=vaa;charset=utf8', 'root', '');
        }
        
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }            

        $req = $bdd->query('SELECT id, prenom FROM membre WHERE id = 1');

        return $req; 
    }

?>