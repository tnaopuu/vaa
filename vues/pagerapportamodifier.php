
<div data-role = "page" id = "pagerapportamodifier">
<?php
    include "vues/entetepageavecboutons.html";
?>
    
    
    <div data-role = "content"> 
      <div class = "ui-field-contain"> 
            <label id ="lblmedecin"> </label> 
            <label for = "motif">Motif </label>
            <textarea  name = "nom" id = "motif"  class = "required" ></textarea>
            <label for = "bilan">Bilan</label>
            <textarea name = "bilan" id = "bilan"  class = "required"></textarea>
            <a href = "#" data-role = "button" id = "btnmajrapport" data-inline="true"  > Valider </a>
        </div>
        
      
       
       
    </div> <!-- /fin content -->
<?php    
    include "vues/piedpage.html";
?>
</div><!-- /fin page -->

