// Coordonnées approximatives de la forêt de Brocéliande
var map = L.map('map', {
    center: [48.0167, -2.1833],
    zoom: 13,
    dragging: false,
    scrollWheelZoom: false,
    doubleClickZoom: false,
    boxZoom: false,
    keyboard: false,
    zoomControl: false,
    touchZoom: false
});

// Fond de carte sobre
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Icône personnalisée verte
const customIcon = L.icon({
    iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

// Points d'intérêt avec histoires
const points = [
    {
        coords: [48.0167, -2.1833],
        title: "Forêt de Brocéliande",
        info: "La légendaire forêt de Brocéliande, berceau de nombreux mythes arthuriens. On raconte que Merlin l'Enchanteur y aurait été emprisonné par la fée Viviane."
    },
    {
        coords: [48.025, -2.2],
        title: "Le Val sans Retour",
        info: "Un lieu mythique associé à la fée Morgane, célèbre pour ses paysages mystérieux. Morgane y aurait retenu prisonniers les chevaliers infidèles."
    },
    {
        coords: [48.018, -2.191],
        title: "Le Tombeau de Merlin",
        info: "Selon la légende, Merlin l'Enchanteur reposerait ici, enfermé pour l'éternité par Viviane sous un amas de pierres."
    },
    {
        coords: [48.013, -2.178],
        title: "La Fontaine de Barenton",
        info: "Source magique où se produiraient des phénomènes étranges. C'est ici que Viviane aurait rencontré Merlin."
    },
    {
        coords: [48.019, -2.207],
        title: "L'Arbre d'Or",
        info: "Un châtaignier recouvert de feuilles d'or, symbole de renaissance après l'incendie de 1990. Il attire de nombreux visiteurs."
    }
];

// Ajoute les marqueurs et gère le clic
points.forEach(point => {
    const marker = L.marker(point.coords, { icon: customIcon }).addTo(map)
        .bindPopup(point.title);

    marker.on('click', function() {
        document.getElementById('map-info').innerHTML = `
            <div class="info-content">
                <h3>${point.title}</h3>
                <p>${point.info}</p>
            </div>
        `;
    });
});
