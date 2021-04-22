<?php
 require_once '../data/pdogsbrapports.php'; 
 $idRapport = $_REQUEST['idRapport']; 
 $bilan = $_REQUEST['bilan']; 
 $motif = $_REQUEST['motif']; 
  $pdo = PdoGsbRapports::getPdo();
  $ret = $pdo->majRapport($idRapport,$bilan,$motif);
 echo $ret;
  
  
 ?>
