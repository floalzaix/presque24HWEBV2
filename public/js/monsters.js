document.addEventListener('DOMContentLoaded', function () { // On charge un DOM
    // On récupère les éléments du DOM
    const next = document.getElementById('right-button');
    const prev = document.getElementById('left-button');
    const slide = document.querySelector('.slide');
    const items = document.querySelectorAll('.slide .item');

    if (!next || !prev || !slide || items.length === 0) { // Si un élément n'est pas trouvé
        console.error('Un élément clé est introuvable.'); // On affiche un message d'erreur
        return;
    }

    let index = 0;
    
    function moveNext() { // On crée une fonction pour passer à l'élément suivant
        const firstItem = slide.firstElementChild; // On récupère le premier élément
        slide.appendChild(firstItem); // On le déplace à la fin
    }

    function movePrev() { // On crée une fonction pour passer à l'élément précédent
        index = (index - 1 + items.length) % items.length; // On calcule l'index de l'élément précédent
        const lastItem = items[index];
        slide.insertBefore(lastItem, slide.firstChild); // On insère l'élément précédent au début
    }
    next.addEventListener('click', moveNext); // On écoute le clic sur le bouton suivant
    prev.addEventListener('click', movePrev); // On écoute le clic sur le bouton précédent
});

function change(){
    var elem = document.getElementById("add-uni-bt"); //on récupère l'élément pour ajouter une unité ( aller sur la page d'ajout d'unité)

    location.href = "index.php?action=add-unit" //on redirige vers la page d'ajout d'unité
}

function ok_btn() {
    const messageDiv = document.getElementById('message-erreur'); // On récupère l'élément du message d'erreur
    messageDiv.style.display = 'none'; // On cache le message d'erreur
}