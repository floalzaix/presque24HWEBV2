<?php

namespace Router;
use Exception;

/**
 * Class Route pour gérer les actions GET et POST
 * @package Router
 */
class Route {
    /**
     * Méthode pour gérer les requêtes GET
     * 
     * @param array $params
     * @return array
     */
    public function get(array $params = []) {
        $response = [];
        foreach ($params as $key => $value) {
            $response[$key] = "GET_$value";
        }
        return $response;
    }

    /**
     * Méthode pour gérer les requêtes POST
     * 
     * @param array $params
     * @return array
     */
    public function post(array $params = []) {
        $response = [];
        foreach ($params as $key => $value) {
            $response[$key] = "POST_$value"; 
        }
        return $response;
    }

    /**
     * Méthode pour exécuter l'action en fonction de la méthode HTTP
     * 
     * @param array $params
     * @param string $method
     * @return array
     * @throws Exception
     */
    public function action(array $params = [], string $method = 'GET') {
        if ($method === 'GET') {
            return $this->get($params);
        } elseif ($method === 'POST') {
            return $this->post($params);
        } else {
            throw new Exception("Méthode HTTP non prise en charge : $method");
        }
    }

    /**
     * Méthode pour obtenir un paramètre d'un tableau
     * 
     * @param array $array
     * @param string $paramName
     * @param bool $canBeEmpty
     * @return mixed
     * @throws Exception
     */
    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true) {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        } else {
            throw new Exception("Paramètre '$paramName' absent");
        }
    }
}