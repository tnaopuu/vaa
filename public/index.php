<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../src/pdoVaa.php';

    $pdo = get_pdo();
    $managerReservation = new Vaa\ManagerReservation($pdo);
    //récupération des jours période
    $joursPeriode = $managerReservation->getJourPeriode();
    //récupération des places vaa
    $placesVaa = $managerReservation->getPlaceVaa();
    //récupération des adhérents
    $adherents = $managerReservation->getAdherent();

    $jourPeriode="";
    $placeVaa="";
    $adherent="";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Jourspériode
    if(isset($_POST["choixJourPeriode"]) && $_POST["choixJourPeriode"]!= ""){
        //restriction des élèves
        $req = "inner join jourperiode ON reservation.codeJourPer=jourperiode.idJourPer WHERE codeJourPer='".h($_POST['choixJourPeriode'])."' AND ";  
        //récupération du level selectionné pour le présélectionner
        $jourPeriode=h($_POST['choixJourPeriode']);
    }else{
        $req = "WHERE ";
    }
    $req .="1=1";
    $reservations = $managerReservation->getAll($req);
    }else{
    $reservations = $managerReservation->getAll();
    }
    
    require '../inc/header.php';
?>

<div class="calendar">

    <div>
        <h1>Affichage des réservation le <?= !empty($jourPeriode)?"de ".$jourPeriode:"" ?></h1>
    </div>
  
    <form method="POST">
        <div class="form-group">
            <label for="choixJourPeriode">Choix du jour</label>
            <select class="form-control" id="choixJourPeriode" name="choixJourPeriode">
                <option value="">Tous</option>
                    <?php 
                        for ($i = 0; $i < sizeof($joursPeriode); $i++): 
                        
                            if($joursPeriode[$i] === $jourPeriode){?>
                                <option selected value="<?= $joursPeriode[$i]?>"><?= $joursPeriode[$i]?></option>
                            <?php }else{?>
                                <option value="<?= $joursPeriode[$i]?>"><?= $joursPeriode[$i]?></option>
                                <?php 
                                }
                        endfor;
                    ?>
            </select>       
        </div>
        <button type="submit">Submit</button>
    </form>
  
    <table>
        <?php for ($i = 0; $i < sizeof($reservations); $i++): ?>
            <tr>
                <td><?= $reservations[$i]->getPlaceVaa() . " : " .$reservations[$i]->getAdherent()?></td>
            </tr>
        <?php endfor; ?>
    </table>

</div>

<?php require '../inc/footer.php'; ?>
