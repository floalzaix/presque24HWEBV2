<?php
    $this->layout('templates', ['title' => 'La Guilde']);
?>

<div class="container">
    <div class="slide">
        <?php foreach ($listUnits as $unit): ?> <!-- On parcourt les unités -->
            <div class="item" style="background-image: url('<?= htmlspecialchars($monster->getName()) ?>');"> <!-- On affiche l'image de l'unité dans la div directement-->
                <div class="monster-content">
                    
                </div>
            </div>
        <?php endforeach; ?>  
    </div>
    <div class="lr_button">
        <button id="left-button"><img src="./public/img/fleche-gauche.png" alt="Précédent"></button> <!-- On crée un bouton pour aller à la slide précédente -->
        <button id="right-button"><img src="./public/img/fleche-droite.png" alt="Suivant"></button> <!-- On crée un bouton pour aller à la slide suivante -->
    </div>
</div>
</div>
