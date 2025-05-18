<?php
    $this->layout('templates', ['title' => 'La Guilde']);
    $listMonsters = [
        "public/images/assets/babayaga.png",
        "public/images/assets/banshee.png",
        "public/images/assets/basilic.png",
        "public/images/assets/corbeau.png",
        "public/images/assets/demon.png",
        "public/images/assets/draugr.png",
        "public/images/assets/espritforet.png",
        "public/images/assets/goblin.png",
        "public/images/assets/gremlin.png",        
        "public/images/assets/leshi.png",
        "public/images/assets/loup.png"
    ];
?>

<link rel="stylesheet" href="public/css/monster.css">
<script src="public/js/monsters.js"></script>

<main id="contenu">
    <div class="container">
        <div class="slide">
            <?php foreach ($listMonsters as $monster): ?>
                <div class="item" style="background-image: url('<?= htmlspecialchars($monster) ?>');">
                    <div class="monster-content"></div>
                </div>
            <?php endforeach; ?>  
        </div>
        <div class="lr_button">
            <button id="left-button"><img src="./public/images/fleche-gauche.png" alt="Précédent"></button>
            <button id="right-button"><img src="./public/images/fleche-droite.png" alt="Suivant"></button>
        </div>
    </div>
</main>
