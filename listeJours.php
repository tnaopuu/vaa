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