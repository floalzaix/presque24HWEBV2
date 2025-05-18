<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<div class="err">
    Erreur 404 !
</div>