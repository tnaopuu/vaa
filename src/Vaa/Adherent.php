<?php
namespace Vaa;

class Adherent{

    private $id;
    private $firstname;
    private $lastname;


    public function __construct($firstname ="", $lastname="", $level=""){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string {
        return $this->firstname;
    }

    public function getLastName (): string {
        return $this->lastname;
    }

    public function setId (int $id) {
        $this->id = $id;
    }

    public function setFirstName (string $firstname) {
        $this->firstname = $firstname;
    }

    public function setLastName (string $lastname) {
        $this->lastname = $lastname;
    }

}
