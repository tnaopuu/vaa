<?php
    /*$sqlpr = "SELECT
    FROM provenance, sondage WHERE idsondage = '".$id."'
    " ;
    $requetepr = mysqli_query( $bdd,$sqlpr) ;
    echo '<td>
            <select name="txtprovenance" id="txtprovenance" class="input-sm" required placeholder="provenance" >';
              if( $_GET['idsondage'] == $result['idsondage']){
                while( $resultpr = mysqli_fetch_array( $requetepr ) ) { 
                  $selected = (condition) ? ' selected="selected" ' : '';
                  echo '<option value="'. $resultpr['txtprovenance'].'" '.$selected.'>'; 
                  echo $resultpr['txtprovenance']);
                  echo '</option>';
    
                }
              }
    echo '</select>';*/
?>

<?php
    require('model.php');
    
    $req = getJours();
    
    echo '<td>
            <select name="jours" id="jour" class="input-sm">';
            foreach ($req as $data){
                echo '<option value="' . $data['id'] . '">' . $data['jours'] . '</option>';
            }
    echo '</select>';
    $req->closeCursor();
?>