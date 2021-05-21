<?php
namespace Vaa;

class JourPeriode{

    private $id;
    private $jourPeriode;

    public function __construct($jourPeriode =""){
        $this->jourPeriode = $jourPeriode;        
    }

    public function getId(): string {
        return $this->id;
    }

    public function getJourPeriode(): string {
        return $this->jourPeriode;
    }

    public function setId (string $id) {
        $this->id = $id;
    }

    public function setJourPeriode (string $jourPeriode) {
        $this->jourPeriode = $jourPeriode;
    }
}
