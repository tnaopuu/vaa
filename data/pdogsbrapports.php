<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application Gsb Rapport Mobile
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsbRapports qui contiendra l'unique instance de la classe
 * @package default
 * @author Cheri Bibi Rev MB
 * @version    2.0 Nov2020
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsbRapports{   		
      	 /*--------------------Version locale---------------------------------------- */
      private static $serveur='mysql:host=localhost';
      private static $bdd='dbname=gsbrapports';   		
      private static $user='root' ;    		
      private static $mdp='' ;
      private static $monPdo;
      private static $monPdoGsbRapports = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
            self::$monPdo = new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp); 
            self::$monPdo->query("SET CHARACTER SET utf8");
	}
        
	public function _destruct(){
            self::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsbRapports = PdoGsbRapports::getPdo();
 
 * @return l'unique objet de la classe PdoGsbRapports
 */
	public  static function getPdo(){
		if(self::$monPdoGsbRapports == null){
			self::$monPdoGsbRapports = new PdoGsbRapports();
		}
		return self::$monPdoGsbRapports;  
	}
/**
 * Retourne les informations du visiteur
 * @param $login 
 * @param $mdp
 * @return le tableau associatif ou NULL
*/
	public function getLeVisiteur($login, $mdp){
		$req = "select id, nom, prenom from visiteur where login = :login and mdp = :mdp";
                $stm = self::$monPdo->prepare($req);
                $stm->bindParam(':login', $login);
                $stm->bindParam(':mdp', $mdp);
                $stm->execute();
        	$laLigne = $stm->fetch();
                if(count($laLigne)>1)
                   return $laLigne;
                else              
                    return NULL;
	}
        public function getLesVisitesUneDate($login, $mdp, $date){
                $req = "select rapport.id as idRapport ,medecin.nom as nomMedecin, medecin.prenom as prenomMedecin ";
                $req .= " from visiteur, rapport, medecin where visiteur.login = :login and visiteur.mdp = :mdp";
                $req.= " and rapport.idVisiteur = visiteur.id ";
                $req .=" and rapport.idMedecin = medecin.id and rapport.date = :date ";
                $stm = self::$monPdo->prepare($req);
                $stm->bindParam(':login', $login);
                $stm->bindParam(':mdp', $mdp);
                $stm->bindParam(':date', $date);
                $stm->execute();
                $lesLignes = $stm->fetchall();
                return $lesLignes;
         }
         public function getLeRapport($idRapport){
                $req = "select * from rapport where id = :idRapport" ; 
                $stm = self::$monPdo->prepare($req);
                $stm->bindParam(':idRapport', $idRapport);
                $stm->execute();
                $laLigne = $stm->fetch();
                return $laLigne;
         }
        public function majRapport($idRapport,$bilan,$motif){
                $req = "update rapport set bilan = :bilan ,motif = :motif where id = :idRapport";
                $stm = self::$monPdo->prepare($req);
                $stm->bindParam(':idRapport', $idRapport);
                $stm->bindParam(':motif', $motif); 
                $stm->bindParam(':bilan', $bilan); 
                return $stm->execute();
                 
        } 
        
       
        
        
        
        
}   // fin classe
?>


