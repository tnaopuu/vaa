<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page de réservation</title>
        
       
       <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
         <!-- on inclut jQuery via CDN 
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
   
    </head>
        
    <body>
        <h1>Réservation</h1>

             
                <div class="row row-cols-7 align-items-center">
                    <div class="col">
                        <strong>DATE : </strong>
                        
                        <?php 
                            //require_once "listeJours.php";
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
                        ?>

                    </div>

                    <div class="col">
                        <strong>1 - FA'AHORO</strong>
                            <?php                                 
                                //require_once "listeAdhe.php";
                                $reqA = $bdd->query("select id, nom, prenom from membre");

                                echo '<td>';
                                //echo '<p>' . $reqA['nom'] . ' ' . $reqA['prenom'] . '</p>';
                                foreach ($reqA as $data){
                                        
                                    echo '<p>' . $data['nom'] . ' ' . $data['prenom'] . '</p>';
                                        
                                }
                                echo '</td>';
                                $reqA->closeCursor();
                            ?>                        
                    </div>
                    <div class="col">
                        <strong>2 - MONO FA'AHORO</strong>
                    </div>
                    <div class="col">
                        <strong>3 - TARE</strong>
                    </div>
                    <div class="col">
                        <strong>4 - TURAI</strong>
                    </div>
                    <div class="col">
                        <strong>5 - MONO PEPERU</strong>
                    </div>
                    <div class="col">
                        <strong>6 - PEPERU</strong>
                    </div>
                </div>
            

       
    
        <?php
        /*while ($donnees = $req->fetch()) {
        ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($donnees['nom']); ?>
                <?= htmlspecialchars($donnees['prenom']); ?>                
            </h3>                   
        </div>
        <?php
        }
        $req->closeCursor();
        */?>

        </body>
</html>