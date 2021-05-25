<?php
namespace Vaa;

class Reservation{

    private $id;
    private $libellePlaceVaa;
    private $nom_prenomAdhe;
    

    public function __construct($nom_prenomAdhe=""){
        $this->nom_prenomAdhe = $nom_prenomAdhe;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getLibellePlaceVaa(): string {
        return $this->libellePlaceVaa;
    }

    public function getNom_PrenomAdhe (): string {
        return $this->nom_prenomAdhe;
    }

    public function setId (string $id) {
        $this->id = $id;
    }

    public function setLibellePlaceVaa (string $libellePlaceVaa) {
        $this->libellePlaceVaa = $libellePlaceVaa;
    }

    public function setNom_PrenomAdhe (string $nom_prenomAdhe) {
        $this->nom_prenomAdhe = $nom_prenomAdhe;
    }

}
