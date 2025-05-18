<?php
namespace Models;

class Bounty {
    private ?string $id;
    private string $monster;
    private int $cost;

    public function setId(?string $id) : void {
        if ($id === null) {
            $id = uniqid();
        }
        $this->id = $id;
    }

    public function getId() : ?string {
        return $this->id;
    }

    public function setMonster(string $monster) : void {
        $this->monster = $monster;
    }

    public function getMonster() : string {
        return $this->monster;
    }

    public function setCost(int $cost) : void {
        $this->cost = $cost;
    }

    public function getCost() : int {
        return $this->cost;
    }

    public function hydrate(array $data) : Unit {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }
}