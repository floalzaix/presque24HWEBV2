<?php

namespace Controllers;

use Config\Config;
use GuzzleHttp\Client;
use League\Plates\Engine;

class AuthController
{
    //
    //  Variables d'instance
    //
    private Client $client;
    private Engine $template;

    //
    //  Constructor
    //
    public function __construct()
    {
        $this->client = new Client();
        $this->template = new Engine("views");
    }

    //
    //  Methods
    //

    /**
     * Log in the API with the url, user_login and user_password in the config.ini file
     */
    public function login(string $login, string $password): void
    {
        $response = $this->client->post(Config::get("api_url"), [
            "json" => [
                "login" => $login,
                "password" => $password
            ]
        ]);

        $data = $response->getBody();

        $_SESSION["connected"] = true;
        $_SESSION["user_name"] = $data["nom"];
        $_SESSION["user_surname"] = $data["prenom"];
        $_SESSION["user_admin"] = $data["admin"];
    }

    public function displayConnectionPage(): void
    {
        echo $this->template->render("AuthView", []);
    }
}
