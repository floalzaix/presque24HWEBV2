<?php

namespace Route;
use Router\Route;

class RouteMap extends Route {

    private $controller;

    /* Constructeur de la classe RouteAddOrigin */
    public function __construct($ctrl) {
        $this->controller = $ctrl;
    }

    public function displayMap() {
        return $this->controller;
    }

    /**
     * Méthode pour gérer les requêtes GET
     * 
     * @param array $params
     * @return void
     */
    public function get(array $params = []) {
        $this->controller->displayMap();
    }

    /**
     * Méthode pour gérer les requêtes POST
     * 
     * @param array $params
     * @return void
     */
    public function post(array $params = []) {

    }
}