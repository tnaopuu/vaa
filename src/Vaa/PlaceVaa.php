<?php
namespace Vaa;

class PlaceVaa{

    private $id;
    private $placeVaa;

    public function __construct($placeVaa =""){
        $this->placeVaa = $placeVaa;        
    }

    public function getId(): int {
        return $this->id;
    }

    public function getPlaceVaa(): string {
        return $this->placeVaa;
    }

    public function setId (int $id) {
        $this->id = $id;
    }

    public function setPlaceVaa (string $placeVaa) {
        $this->placeVaa = $placeVaa;
    }
}
