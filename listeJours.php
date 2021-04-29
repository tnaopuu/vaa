<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=vaa;charset=utf8', 'root', 'root');
    }
    
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $bdd->query('SELECT id, jours FROM jours');
    
    echo '<td>
            <select name="jours" id="jour" class="input-sm">';
            foreach ($req as $data){
                $idJ = $data['id'];
                echo '<option value="' . $idJ . '">' . $data['jours'] . '</option>';
            }
    echo '</select>';
   
    //$req->closeCursor();
    return $idJ;
?>