<?php
namespace Vaa;

class ManagerReservation {

    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Récupère un Réservation
     * @param int $id
     * @return Reservation
     * @throws \Exception
     */
    public function find (int $id): Reservation {
        $statement = $this->pdo->query("SELECT * FROM reservation WHERE idReserv = $id LIMIT 1");
        if($row = $statement->fetch()) {
            
            //appel du constructeur paramétré
            $reservation = new Reservation(h($row['codeJourPer']),h($row['codePlaceVaa']),h($row['codeAdhe']));            
            
            //positionnement de l'id
            $reservation->setId(h($row['idReserv']));

        }
        if ($row === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $reservation;
    }

    /**
     * Sélectionne un(des) critere(s) dans la base.
     * 
     * Méthode générique de SELECT qui renvoie un tableau de critere correspondant aux critères de sélection spécifiés.
     * Si aucun paramètre n'est précisé, la valeur par défaut du paramètre 'WHERE 1' permet d'obtenir tous les criteres.
     * 
     * @param string Chaîne de caractère devant être une restriction SQL valide.
     * @return array Renvoie un tableau d'objet(s) critere.
     */
    public function getAll($restriction='WHERE 1')
    {
        $query = "select * from `reservation` ".$restriction;
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
            $reservation = new Reservation(h($row['codeJourPer']),h($row['codePlaceVaa']),h($row['codeAdhe']));
            //positionnement de l'id
            $reservation->setId(h($row['idReserv']));
            //ajout de l'objet à la fin du tableau
            $reservationsList[] = $reservation;
        }
        //retourne le tableau d'objets 'critere'
        return $reservationsList;   
    }

    /**
     * Méthode qui récupère les Jours Période des reservations
     */
    public function getJourPeriode()
    {
        $query = "select distinct(jourperiode.idJourPer), libelleJourPer from `jourperiode` inner join reservation ON reservation.codeJourPer=jourperiode.idJourPer order by libelleJourPer";
        $jourPeriodelList = Array();

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
            $jourPeriodelList[$row["idJourPer"]] = $row["libelleJourPer"];
        }
        //retourne le tableau d'objets 'level'
        return $jourPeriodelList;   
    }


    public function getPlaceVaa()
    {
        $query = "select distinct(placevaa.idPlace), libellePlace from `placevaa` inner join reservation ON reservation.codePlaceVaa=placevaa.idPlace order by libellePlace";
        $placeVaaList = Array();

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
            $placeVaaList[$row["idPlace"]] = $row["libellePlace"];
        }
        //retourne le tableau d'objets 'level'
        return $placeVaaList;   
    }

    public function getAdherent()
    {
        $query = "select distinct(adherent.idAdhe), nomAdhe, prenomAdhe from `adherent` inner join reservation ON reservation.codeAdhe=adherent.idAdhe order by nomAdhe";
        $adherentList = Array();

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
            $adherentList[$row["idAdhe"]] = $row["nomAdhe"];
        }
        //retourne le tableau d'objets 'level'
        return $adherentList;   
    }
}
