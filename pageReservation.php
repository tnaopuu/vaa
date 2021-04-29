<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page de réservation</title>
        
       
       <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <?php
            try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=vaa;charset=utf8', 'root', 'root');
                }
            catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
                $req="SELECT * FROM jours";
                $jours=$bdd->query($req);    
        ?>
    </head>
        
    <body>
        <h1>Réservation</h1>

             
                <div class="row row-cols-7 align-items-center">
                    <div class="col">
                        <strong>DATE : </strong>
                        <select name="jours" id="jour" class="input-sm">
                        <?php
                             foreach ($jours as $data){
                                $idJ = $data['id'];
                                echo '<option value="' . $idJ . '">' . $data['jours'] . '</option>';
                            }
                        ?>
                        </select>                        
                    </div>

                    <div class="col">
                        <strong>1 - FA'AHORO</strong>
                        <?php                                                                 
                            $sql = "SELECT * FROM membre INNER JOIN reservation ON membre.id = reservation.membre";                                
                            $sql .= " AND reservation.jour = ".$idJ;    
                            $sql .= " AND reservation.placeVaa = 1 ";
                            $reservs = $bdd->query($sql);
                            if($reservs==false){
                                echo '<p> VIDE </p>';
                            }
                            
                            /*foreach($reservs as $reserv){
                                echo $reserv['nom'];
                            }   */                         
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
        </body>
</html>