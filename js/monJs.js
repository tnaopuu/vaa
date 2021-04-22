$(function(){
    
   /*-----------------------Page connexion----------------------------------*/
    $('#pageconnexion #btnconnexion').bind("click", function(e) {
            e.preventDefault();
            var mdp = $("#pageconnexion #mdp").val(); 
            var login = $("#pageconnexion #login").val();
            $.post("ajax/traiterconnexion.php",{
                        "mdp" : mdp,        
                        "login" : login },
                        foncRetourConnexion,"json" );
    });

    
     function foncRetourConnexion(data){
            if(data != null){
                $.mobile.changePage("#pageaccueil");
             }
             else{
                $("#pageconnexion #message").css({color:'red'});
                $("#pageconnexion #message").html("erreur de login et/ou mdp");
             }
    }
     /*-----------------------------page choisir rapport à modifier----------------------------*/ 
        
       $("#pagechoisirrapportamodifier #date").bind("change",function(){
            var date = $("#pagechoisirrapportamodifier #date").val();
            var legende = "Visites effectuées le : " + date + " chez les médecins : ";
            $("#pagechoisirrapportamodifier #lgddate").html(legende) ;
            $.post("ajax/traiterlesvisitesaunedate.php",{
                        "date" : date        
                    }, foncRetourListeRapports,"json" );
        });
        
        function foncRetourListeRapports(data){
           $("#pagechoisirrapportamodifier #listerapports").empty();
           for( i = 0; i < data.length; i++){
                var unRapport = data[i];
                var idRapport = unRapport['idRapport'];
                var nomMedecin = unRapport['nomMedecin'] ;
                var prenomMedecin = unRapport['prenomMedecin'] ; 
                var html = "<li id =" + idRapport + "><a href='#' >" + nomMedecin + " " + prenomMedecin +"</a></li>";
                $("#pagechoisirrapportamodifier #listerapports").append(html);
            } 
            $("#pagechoisirrapportamodifier #listerapports").listview('refresh');
        }
        
       $("#pagechoisirrapportamodifier #listerapports").on("click","li", function(e) {  
              var idRapport = $(this).prop("id");
              window.idRapport = idRapport;
              var nomprenommedecin  = $(this).text();
              window.nomprenommedecin = nomprenommedecin;
              $.post("ajax/traiterchoixrapport.php",{
                    "idRapport" : idRapport
                     },
                     foncRetourChoixRapport,"json" );
          });
          
          function foncRetourChoixRapport(data){
              
               $.mobile.changePage("#pagerapportamodifier");
               $("#pagerapportamodifier #lblmedecin").html("Médecin : " + window.nomprenommedecin);
               var bilan = data['bilan'];
               var motif = data['motif'];
               $("#pagerapportamodifier #bilan").text(bilan); // l'attribut value n'est pas reconnu par un textarea
               $("#pagerapportamodifier #motif").text(motif);
           }
      /*-----------------------------page rapport à modifier----------------------------*/ 
       
        $("#pagerapportamodifier #btnmajrapport").bind("click",function(e){
            var motif = $("#pagerapportamodifier #motif").text();
            var bilan = $("#pagerapportamodifier #bilan").text();
            $.post("ajax/traitermajrapport.php",{
                    "idRapport" : window.idRapport,
                    "motif" : motif,
                    "bilan" : bilan
                     },
                     foncRetourMajRapport,"json" );
        });
        
        function foncRetourMajRapport(data){
           var message = "Votre mise à jour a bien été enregistrée";
           if(data != 1) 
                message = " Un incident nous empèche de traiter votre demande, veuillez recommencer ultérieurement"
           alert(message); 
           $.mobile.changePage("#pageaccueil");
        } 
    
   
});     // Fin fonction principale

