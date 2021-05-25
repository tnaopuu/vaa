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
        $statement = $this->pdo->query("SELECT * FROM reservation join `placevaa` on placevaa.idPlace=reservation.libellePlaceVaa join `adherent` on adherent.idAdhe=reservation.nom_prenomAdhe WHERE idJourPer = $id LIMIT 1");
        if($row = $statement->fetch()) {
            
            //appel du constructeur paramétré
            $reservation = new Reservation(htmlentities($row['nom_prenomAdhe']));
            
            //positionnement de l'id
            $reservation->setId(htmlentities($row['idJourPer']));

            $reservation->setLibellePlaceVaa(htmlentities($row['libellePlace']));
            
            if($reservation->getNom_PrenomAdhe () === NULL){
                $reservation->setNom_PrenomAdhe(htmlentities($row['libellePlace']));
            }else{
                $reservation->setNom_PrenomAdhe(htmlentities($row['nomAdhe']));
            }        

        }
        if ($row === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $reservation;
    }

    /**
     * Sélectionne unvdans la base.
     * 
     * Méthode générique de SELECT qui renvoie un tableau de critere correspondant aux critères de sélection spécifiés.
     * Si aucun paramètre n'est précisé, la valeur par défaut du paramètre 'WHERE 1' permet d'obtenir tous les critères.
     * 
     * @param string Chaîne de caractère devant être une restriction SQL valide.
     * @return array Renvoie un tableau d'objet(s) critere.
     */
    public function getAll($restriction='WHERE 1')
    {
        $query = "select * from `reservation` join `placevaa` on placevaa.idPlace=reservation.libellePlaceVaa join `adherent` on adherent.idAdhe=reservation.nom_prenomAdhe ".$restriction;
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
            $reservation = new Reservation(htmlentities($row['nom_prenomAdhe']));
            //positionnement de l'id
            $reservation->setId(htmlentities($row['idJourPer']));
            //ajout de l'objet à la fin du tableau
            $reservation->setLibellePlaceVaa(htmlentities($row['libellePlace']));
            
            if($reservation->getNom_PrenomAdhe () === NULL){
                $reservation->setNom_PrenomAdhe(htmlentities($row['libellePlace']));
            }else{
                $reservation->setNom_PrenomAdhe(htmlentities($row['nomAdhe']));
            }              

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
