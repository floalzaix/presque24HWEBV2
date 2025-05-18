<?php

namespace Controllers\Router\Route;

use Controllers\BountyController;
use Router\Route;

class RouteBounty extends Route {
    //
    //  Instance variables
    //
    private $bountyController;

    //
    //  Constructor
    //
    public function __construct(BountyController $bountyController) {
        $this->bountyController = $bountyController;
    }

    //
    //  Methods
    //
    public function get(array $param = []): void {
        $this->display();
    }

    public function post(array $param = []): void {
        
        $data = [
            "monster" => $_POST["monster"],
            "cost" => $_POST["cost"]
        ];
        $this->bountyController->addBounty($data);
    }

    private function display() : void {
        $param = [
            "listMonsters" => ['babayaga', 'banshee', 'basilic', 'corbeau', 'demon', 'draugr', 'espritforet', 'goblin', 'gremlin', 'leshi', 'loup', 'loupgarou', 'vampire']
        ];

        $this->bountyController->displayBounty($param);
    }
}