<?php

    class PdoVaa{

        private static $serveur='mysql:host=localhost';
        private static $bdd='dbname=vaa';   		
        private static $user='root' ;    		
        private static $mdp='root' ;
        private static $monPdo;
        private static $monPdoVaa = null;

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
                        if(self::$monPdoVaa == null){
                            self::$monPdoVaa = new PdoVaa();
                        }
                        return self::$monPdoVaa;  
                    }

            /**
             * Retourne les informations dans la base de donnees vaa
             */

                public function getJours(){            
                    $req = "select id, jours from jours";
                    $stm = self::$monPdo->prepare($req);
                    $stm->execute();
                    return $stm->fecth();                    
                }
    }
?>