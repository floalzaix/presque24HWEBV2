<?php

namespace Views;

use Config\Config;

$this->layout("templates", ["title" => Config::get("title")]);

// Générateur de numéro aléatoire
$randomNumber = random_int(0, 3);

?>

<link rel="stylesheet" href="public/css/profil.css">
<script src="public/css/profil.css"></script>

<div class="profil">
    <div class="container-photo-profile">
        <img src="public/images/assets/joueur<?= $randomNumber ?>.png" alt="Photo de profil" class="photo-profile">
    </div>
    <h3><?= $name ?></h3>
    <h3><?= $surname ?></h3>
    <h4><?= $status ?></h4>
</div>
