<?php
namespace Vaa;

class Reservation{

    private $id;    
    private $jourPer;
    private $plcVaa;
    private $adhe;
    

    public function __construct($jourPer ="", $plcVaa="", $adhe=""){
        $this->jourPer = $jourPer;
        $this->plcVaa = $plcVaa;
        $this->adhe = $adhe;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getJourPer(): string {
        return $this->jourPer;
    }

    public function getPlcVaa (): string {
        return $this->plcVaa;
    }

    public function getAdhe (): string {
        return $this->adhe;
    }

    public function setId (string $id) {
        $this->id = $id;
    }
     
    public function setJourPer (string $jourPer) {
        $this->jourPer = $jourPer;
    }

    public function setPlcVaa (string $plcVaa) {
        $this->plcVaa = $plcVaa;
    }

    public function setAdhe (string $adhe) {
        $this->adhe = $adhe;
    }
}
