<?php
namespace Vaa;

class Reservation{

    private $id;    
    private $jourPer;
    private $plcVaa;
    private $adhe;
    

    public function __construct($name ="", $size="", $energy=""){
        $this->name = $name;
        $this->size = $size;
        $this->energy = $energy;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSize (): int {
        return $this->size;
    }

    public function getEnergy (): int {
        return $this->energy;
    }

    public function getLipide (): int {
        return $this->lipide;
    }

    public function getGlucide (): int {
        return $this->glucide;
    }

    public function getProtide (): int {
        return $this->protide;
    }

    public function getType (): int {
        return $this->type;
    }
    public function setId (string $id) {
        $this->id = $id;
    }

    public function setName (string $name) {
        $this->name = $name;
    }

    public function setSize (int $size) {
        $this->size = $size;
    }

    public function setEnergy (int $energy) {
        $this->energy = $energy;
    }
     
    public function setGlucide (int $glucide) {
        $this->glucide = $glucide;
    }

    public function setLipide (int $lipide) {
        $this->lipide = $lipide;
    }

    public function setProtide (int $protide) {
        $this->protide = $protide;
    }

    public function setType (int $type) {
        $this->type = $type;
    }
}
