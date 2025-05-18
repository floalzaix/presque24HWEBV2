<?php
namespace Models;

class BountyDAO extends BasePDODAO {

    public function __construct() {
        $sql = "CREATE TABLE IF NOT EXISTS BOUNTY (
            id VARCHAR(32) PRIMARY KEY,
            monster VARCHAR(255) NOT NULL,
            cost INT NOT NULL
        )";
        $this->execRequest($sql);
    }

    public function getAll() : array {
        $Bountys = $this->execRequest("SELECT * FROM BOUNTY ORDER BY monster;")->fetchAll(\PDO::FETCH_CLASS, "\Models\Bounty");
        return $Bountys;
    }

    public function getByID(string $idBounty) : ?Bounty {
        $stmt = $this->execRequest("SELECT * FROM BOUNTY WHERE id = :id;", ["id" => $idBounty]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "\Models\Bounty");
        $bounty = $stmt->fetch();
        return !$bounty ? null : $bounty;
    }

    public function createBounty(Bounty $bounty) : void {
        $error = new \PDOException("Error while creating bounty");
        $stmt = $this->execRequest("INSERT INTO BOUNTY (id, monster, cost) VALUES (:id, :monster, :cost);",
            ['id' => $bounty->getId(), 'monster' => $bounty->getMonster(), 'cost' => $bounty->getCost()], $error);
        if ($stmt === false) {
            throw $error;
        }
    }

    public function deleteBounty(string $idBounty) : void {
        $error = new \PDOException("Error while deleting bounty");
        $stmt = $this->execRequest("DELETE FROM BOUNTY WHERE id = :id;", ["id" => $idBounty], $error);
        if ($stmt === false) {
            throw $error;
        }
        if ($stmt->rowCount() == 0) {
            throw new \Exception("Bounty not deleted, id not found");
        }
    }

    public function updateBounty(Bounty $bounty) : void {
        $error = new \PDOException("Error while updating bounty");
        $stmt = $this->execRequest("UPDATE BOUNTY SET monster = :monster, cost = :cost WHERE id = :id;",
            ['id' => $bounty->getId(), 'monster' => $bounty->getMonster(), 'cost' => $bounty->getCost()], $error);
        if ($stmt === false) {
            throw $error;
        }
    }

    public function search(string $search, string $attribute = 'monster') : array {
        if ($search === '') {
            return $this->getAll();
        }
        $error = new \PDOException("Error while searching Bounty");
        $stmt = $this->execRequest("SELECT * FROM BOUNTY WHERE $attribute LIKE :search ORDER BY $attribute;", ["search" => "%$search%"], $error);
        
        if ($stmt === false) {
            throw $error;
        }
        $Bountys = $stmt->fetchAll(\PDO::FETCH_CLASS, "\Models\Bounty");
        return $Bountys;
    }
}