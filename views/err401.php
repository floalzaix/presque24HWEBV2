<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

?>

<div class="err">
    Erreur 401 access denied !
</div>