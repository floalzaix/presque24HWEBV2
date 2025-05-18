<?php

namespace Controllers;

use League\Plates\Engine;

class BountyController {
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

    public function displayBounty(array $param = []): void {
        echo $this->template->render("add-bounty", $param);
    }

    public function addBounty(array $data) : void {
        $bounty = new \Models\Bounty();
        $bounty->setId(null);
        $bounty->setMonster($data['monster']);
        $bounty->setCost($data['cost']);
        (new \Models\BountyDAO())->createBounty($bounty);
        header("Location: ./index.php");
        exit;
    }
}
