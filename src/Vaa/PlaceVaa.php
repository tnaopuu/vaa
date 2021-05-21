<?php
namespace Vaa;

class PlaceVaa{

    private $id;
    private $placeVaa;

    public function __construct($placeVaa =""){
        $this->placeVaa = $placeVaa;        
    }

    public function getId(): string {
        return $this->id;
    }

    public function getPlaceVaa(): string {
        return $this->placeVaa;
    }

    public function setId (string $id) {
        $this->id = $id;
    }

    public function setPlaceVaa (string $placeVaa) {
        $this->placeVaa = $placeVaa;
    }
}
