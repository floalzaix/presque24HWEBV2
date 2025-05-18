<?php

namespace Router;

use Controllers\AuthController;
use Controllers\ErrController;
use Controllers\MapController;
use Controllers\MonsterController;
use Controllers\ProfilController;
use Controllers\BountyController;
use Controllers\Router\Route\RouteAuth;
use Controllers\Router\Route\RouteErr;
use Controllers\Router\Route\RouteProfil;
use Controllers\Router\Route\RouteBounty;
use Route\RouteMap;
use Route\RouteMonster;

class Router {
    private array $routeList = [];
    private array $ctrlList = [];
    private string $actionKey;

    public function __construct(string $nameOfActionKey = "action") {
        $this->actionKey = $nameOfActionKey;
        $this->createControllerList();
        $this->createRouteList();
    }

    /**
     * Summary of createControllerList
     * Crée plein de controlleur pour chaque route
     * Cette fonction sert à créer une liste de controlleurs
     */
    private function createControllerList() {
        $this->ctrlList = [
            "map" => new MapController(),
            "monstre" => new MonsterController(),
            "auth" => new AuthController(),
            "err" => new ErrController(),
            "profil" => new ProfilController(),
            "bounty" => new BountyController()
        ];
    }

    /**
     * Summary of createRouteList
     * Crée plein de route pour chaque controlleur
     * Cette fonction sert à créer une liste de routes
     */
    private function createRouteList() {
        $this->routeList = [
            "map" => new RouteMap($this->ctrlList["map"]),
            "monstre" => new RouteMonster($this->ctrlList["monstre"]),
            "auth" => new RouteAuth($this->ctrlList["auth"]),
            "err" => new RouteErr($this->ctrlList["err"]),
            "profil" => new RouteProfil($this->ctrlList["profil"]),
            "bounty" => new RouteBounty($this->ctrlList["bounty"])
        ];
    }

    /**
     * Summary of routing
     * Cette fonction sert à router les requêtes. Elle récupére les données GET 
     * et POST et nous envoye ver la route correspondante à l'action de notre
     * URL
     * @param array $get
     * @param array $post
     * @return mixed
     */
    public function routing(array $get =[], array $post = []) {
        $action = $get[$this->actionKey] ?? "map"; /* Récupère l'action de l'URL */
        $method = !empty($post) ? "POST" : "GET"; /* Détermine la méthode de la requête */
        $param = $method === "GET" ? $get : $post; /* Détermine les paramètres de la requête à transmettre*/

        // Error handling
        if (!array_key_exists($action, $this->routeList)) {
            $action = "err";
            $param = ["err_type" => "404"];
        }
        // elseif ($action != "auth" && $action != "map" && !(isset($_SESSION["connected"]) ?? false)) {
        //     $action = "err";
        //     $param = ["err_type" => "401"];
        // }

        return $this->routeList[$action]->action($param, $method);
    }
}
