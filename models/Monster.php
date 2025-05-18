<?php
namespace Models;

class Monster {
    private ?string $id;
    private string $name;
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

    public function setName(string $name) : void {
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
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