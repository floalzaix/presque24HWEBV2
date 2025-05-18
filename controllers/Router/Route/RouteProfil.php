<?php

namespace Controllers\Router\Route;

use Controllers\ProfilController;
use Router\Route;

class RouteProfil extends Route {
    //
    //  Instance variables
    //
    private $profilController;

    //
    //  Constructor
    //
    public function __construct(ProfilController $profilController) {
        $this->profilController = $profilController;
    }

    //
    //  Methods
    //
    public function get(array $param = []): void {
        $this->display();
    }

    public function post(array $param = []): void {
        $this->display();
    }

    private function display() : void {
        if (!isset($_SESSION["connected"])) {
            header('Location: index.php?action=auth');
            exit();
        }

        $param = [
            "name" => $this->getParam($_SESSION, "user_name", false),
            "surname" => $this->getParam($_SESSION, "user_surname", false),
            "status" => $this->getParam($_SESSION, "user_admin", false)
        ];

        $this->profilController->displayProfil($param);
    }
}