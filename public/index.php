<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../src/pdoVaa.php';

    $pdo = get_pdo();
    $managerReservation = new Vaa\ManagerReservation($pdo); 
    //récupération des jours 
    $joursPeriode = $managerReservation->getJourPeriode();

    $jourPeriode="";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //les jours de la semaine
      if(isset($_POST["choixJourPeriode"]) && $_POST["choixJourPeriode"]!= ""){
        //restriction des réservations
        $req = "INNER JOIN jourperiode ON reservation.idJourPer=jourperiode.idJourPer WHERE jourperiode.idJourPer='".htmlentities($_POST['choixJourPeriode'])."' AND ";  
        //récupération du jour selectionné pour le présélectionner
        $jourPeriode=htmlentities($_POST['choixJourPeriode']);
      }else{
        $req = "WHERE ";
      }

      $req .= "1=1";
      $reservations = $managerReservation->getAll($req);
    }else{
      $reservations = $managerReservation->getAll();
    }

    require '../inc/header.php';
?>

<div class="calendar">

    <div>
    <?php 
          foreach ($joursPeriode as $key => $value): 
        
            if($key == $jourPeriode){
            
              $JP = $value;
            }   
          endforeach;
          unset($value);
    ?>
        <h1>Affichage des réservation(s) <?= !empty($JP)?"de ".$JP:"" ?></h1>
    </div>
  
    <form method="POST">
      <div class="form-group">
        <label for="choixJourPeriode">Choix du jour</label>
        <select class="form-control" id="choixJourPeriode" name="choixJourPeriode">
          <option value=""> --- </option>
          <?php 
          foreach ($joursPeriode as $key => $value): 
        
            if($key == $jourPeriode){?>
              <option selected value="<?= $key?>"><?= $value?></option>
            <?php }else{?>
              <option value="<?= $key?>"><?= $value?></option>
              <?php 
              }          
          endforeach;
          unset($value); // Détruit la référence sur le dernier élément
        ?>
            </select>  
        </div>
        <button type="submit">Afficher</button>
    </form>
    
    <table>
    
        <?php for ($i = 0; $i < sizeof($reservations); $i++): ?>
            <tr>
                <td><?php if($jourPeriode != ""){ echo $reservations[$i]->getLibellePlaceVaa() . " : " .$reservations[$i]->getNom_PrenomAdhe();} else{ echo "";}?></td>
            </tr>
        <?php endfor; ?>
    </table>

</div>

<?php require '../inc/footer.php'; ?>
