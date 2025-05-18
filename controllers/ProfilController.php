<?php

namespace Controllers;

use League\Plates\Engine;

class ProfilController {
    //
    //  Instance varaibles
    //
    private $template;

    //
    //  Constructor
    //
    public function __construct() {
        $this->template = new Engine("views");
    }

    //
    //  Methods
    //

    public function displayProfil(array $param = []): void {
        echo $this->template->render("profil", $param);
    }
}
