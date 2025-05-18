<?php

namespace Controllers\Router\Route;

use Controllers\AuthController;
use Router\Route;

use Exception;

class RouteAuth extends Route {
    //
    //  Instance varaibles
    //
    private AuthController $authController;

    //
    //  Constructor
    //
    public function __construct(AuthController $authController) {
        $this->authController = $authController;
    }

    //
    //  Method
    //

    public function get(array $param = [])  : void{
        $this->authController->displayConnectionPage();
    }

    public function post(array $param = [])  : void{
        try {
            $this->authController->login(
            $this->getParam($param, "auth_login", false),
            $this->getParam($param, "auth_pwd", false)
            );

            header('Location: index.php?action=profil');
            exit();
        } catch (Exception $_) {
            $this->authController->displayConnectionPage("Mauvais login ou mot de passe !");
        }
    }
}
