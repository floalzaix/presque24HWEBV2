<?php
    $this->layout('templates', ['title' => 'La Guilde']);
?>

<div class="map-container">
    <div id="map" class="map-square"></div>
    <div id="map-info" class="map-info">
        <h3>Sélectionnez un point sur la carte pour voir les informations ici.</h3>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>



    <!-- Css personnalisé-->
<link rel="stylesheet" href="./public/css/map.css">

<script src="./public/js/map.js"></script>

<img src="./public/images/assets/fond.png" style="display:none;" alt="">
