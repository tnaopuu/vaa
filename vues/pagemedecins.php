<div data-role = "page" id = "pagemedecins">
<?php
    include "vues/entetepagemedecins.html";
?>
    
    
    <div data-role = "content">
        <label id = "rechMedecin"><h3> Recherche du médecin </h3></label>
        <div class = "ui-field-contain">
            <form class="ui-filterable">
                <input id="autocomplete-input" data-type="search" placeholder="Find a city...">
            </form>
            <ul id="autocomplete" data-role="listview" data-inset="true" data-filter="true" data-input="#autocomplete-input"></ul>
        </div>
        <label id ="affNom"><h3> Nom médecin </h3></label>
        <div class = "ui-field-contain">
            <form class="ui-filterable">
                <input type = "text">
            </form>
        </div>

    </div> <!-- /fin content -->
<?php    
    include "vues/piedpage.html";
?>
</div><!-- /fin page -->

