<?php
namespace Vaa;

class ManagerReservation {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Récupère une réservation
     * @param int $id
     * @return Reservation
     * @throws \Exception
     */
    public function find (int $id): Reservation {
        $statement = $this->pdo->query("SELECT * FROM reservation join `placevaa` on placevaa.idPlace=reservation.idPlaceVaa join `adherent` on adherent.idAdhe=reservation.idAdhe WHERE idJourPer = $id LIMIT 1");
        if($row = $statement->fetch()) {
            
            //appel du constructeur paramétré
            $reservation = new Reservation();
            //positionnement de l'id
            $reservation->setId(htmlentities($row['idJourPer']));
            //modifie le libelle Place Vaa positionné par l'idPlaceVaa par le libelle Place Vaa de la table placevaa
            $reservation->setLibellePlaceVaa(htmlentities($row['libellePlace']));
            //modifie le nom_prenom de l'adhérent positionné par l'idAdhe par le nom_prenom de l'adhérent de la table adherent
            $reservation->setNom_PrenomAdhe(htmlentities($row['nomPrenomAdhe']));     

        }
        if ($row === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $reservation;
    }

    /**
     * Sélectionne une réservation dans la base en sélectionnant comme critère le jour de la semaine.
     * 
     * Si aucun paramètre n'est précisé, la valeur par défaut du paramètre 'WHERE 1' permet de ne rien afficher.
     * Méthode générique de SELECT qui renvoie un tableau de critere correspondant au critère de sélection spécifié.
     * 
     * @param string Chaîne de caractère devant être une restriction SQL valide.
     * @return array Renvoie un tableau d'objet(s) critere.
     */
    public function getAll($restriction='WHERE 1')
    {
        $query = "select * from `reservation` join `placevaa` on placevaa.idPlace=reservation.idPlaceVaa join `adherent` on adherent.idAdhe=reservation.idAdhe ".$restriction;
        $reservationsList = Array();

        //execution de la requete
        try
        {
            $result = $this->pdo->Query($query);
        }
        catch(PDOException $e)
        {
            die ("Erreur : ".$e->getMessage());
        }

        //Parcours du jeu d'enregistrement
        while ($row = $result->fetch())
        {
            //appel du constructeur paramétré
            $reservation = new Reservation();
            //positionnement de l'id
            $reservation->setId(htmlentities($row['idJourPer']));
            //modifie le libelle Place Vaa positionné par l'idPlaceVaa par le libelle Place Vaa de la table placevaa
            $reservation->setLibellePlaceVaa(htmlentities($row['libellePlace']));
            //modifie le nom_prenom de l'adhérent positionné par l'idAdhe par le nom_prenom de l'adhérent de la table adherent
            $reservation->setNom_PrenomAdhe(htmlentities($row['nomPrenomAdhe']));   

            $reservationsList[] = $reservation;
        }
        //retourne le tableau d'objets 'critere'
        return $reservationsList;   
    }

    /**
     * Méthode qui récupère les jours de chaque réservation
     */

    public function getJourPeriode(){
        $query = "select distinct(jourperiode.idJourPer), libelleJourPer from jourperiode inner join reservation ON reservation.idJourPer=jourperiode.idJourPer";
        $joursPeriodeList = Array();

        //execution de la requete
        try
        {
            $result = $this->pdo->Query($query);
        }
        catch(PDOException $e)
        {
            die ("Erreur : ".$e->getMessage());
        }

        //Parcours du jeu d'enregistrement
        while ($row = $result->fetch())
        {
            //ajout de l'objet à la fin du tableau
            $joursPeriodeList[$row["idJourPer"]] = $row["libelleJourPer"];
        }
        //retourne le tableau d'objets 'joursPeriodeList'
        return $joursPeriodeList;   
    }

}
