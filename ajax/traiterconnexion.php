<?php
    session_start();
    require_once '../data/pdogsbrapports.php';   
    $mdp = $_REQUEST['mdp'];
    $login = $_REQUEST['login'];
    $pdo = PdoGsbRapports::getPdo();
    $visiteur = $pdo->getLeVisiteur($login,$mdp);// retourne le visiteur
    if($visiteur != NULL){
        $_SESSION['membre'] = $visiteur ;
        $_SESSION['membre']['mdp'] = $mdp;
        $_SESSION['membre']['login'] = $login;
    }
    echo json_encode($visiteur);
?>
