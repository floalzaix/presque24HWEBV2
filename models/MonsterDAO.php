<?php
namespace Models;

class MonsterDAO extends BasePDODAO {

    public function getAll() : array {
        $Monsters = $this->request("SELECT * FROM MONSTER ORDER BY name;")->fetchAll(\PDO::FETCH_CLASS, "\Models\Monster");
        return $Monsters;
    }

    public function getByID(string $idMonster) : ?Monster {
        $stmt = $this->request("SELECT * FROM MONSTER WHERE id = :id;", ["id" => $idMonster]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "\Models\Monster");
        $monster = $stmt->fetch();
        return !$monster ? null : $monster;
    }

    public function createMonster(Monstre $monster) : void {
        $error = new \PDOException("Error while creating monster");
        $stmt = $this->request("INSERT INTO MONSTER (id, name, cost) VALUES (:id, :name, :cost);",
            ['id' => $monster->getId(), 'name' => $monster->getName(), 'cost' => $monster->getCost()]);
        if ($stmt === false) {
            throw $error;
        }
    }

    public function deleteMonster(string $idMonster) : void {
        $error = new \PDOException("Error while deleting monster");
        $stmt = $this->request("DELETE FROM MONSTER WHERE id = :id;", ["id" => $idMonster]);
        if ($stmt === false) {
            throw $error;
        }
        if ($stmt->rowCount() == 0) {
            throw new \Exception("Monster not deleted, id not found");
        }
    }

    public function updateMonster(Monster $monster) : void {
        $error = new \PDOException("Error while updating monster");
        $stmt = $this->request("UPDATE MONSTER SET name = :name, cost = :cost WHERE id = :id;",
            ['id' => $monster->getId(), 'name' => $monster->getName(), 'cost' => $monster->getCost()]);
        if ($stmt === false) {
            throw $error;
        }
    }

    public function search(string $search, string $attribute = 'name') : array {
        if ($search === '') {
            return $this->getAll();
        }
        $error = new \PDOException("Error while searching Monster");
        $stmt = $this->request("SELECT * FROM MONSTER WHERE $attribute LIKE :search ORDER BY $attribute;", ["search" => "%$search%"], $error);
        
        if ($stmt === false) {
            throw $error;
        }
        $Monsters = $stmt->fetchAll(\PDO::FETCH_CLASS, "\Models\Monster");
        return $Monsters;
    }
}