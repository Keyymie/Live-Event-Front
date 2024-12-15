var lat = 48.86396248691161;
var lon = 2.2660834443690714;
var map = null;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(lat, lon),
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        scrollwheel: false,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        },
        navigationControl: true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.ZOOM_PAN
        }
    });

    var location = {
        "La Fête à Neu-neu Entrée": { "lat": 48.86396248691161, "lon": 2.2660834443690714, "content": "Entrée Festival", "type": "main_entrance", "marker": null },
        "Pelouse de la Muette": { "lat": 48.86347410918536, "lon": 2.2654281098124507, "content": "Contenu spécifique à la Fête à Neu-neu, Paris", "type":"terrain", "marker": null },
        "Restaurant": { "lat": 48.86251327599013, "lon": 2.2631946678933623, "content": "Restaurant", "type":"restaurant", "marker": null },
        "Toilettes": { "lat": 48.86641760923345, "lon": 2.26450358589263, "content": "Toilettes", "type":"hygiene", "marker": null },
        "Scène Principale": {"lat": 48.8642998339678, "lon": 2.263497794878715, "content":"Podium", "type":"scène", "marker": null },
    };
    

    // Nous parcourons la liste des location
    for (loc in location) {
        var marker = new google.maps.Marker({
            // A chaque boucle, la latitude et la longitude sont lues dans le tableau
            position: { lat: location[loc].lat, lng: location[loc].lon },
            // On en profite pour ajouter une info-bulle contenant le nom de la loc
            title: loc,
            map: map
        });

        // Création de l'info-bulle personnalisée pour chaque marqueur
        var infowindow = new google.maps.InfoWindow({
            content: location[loc].content
        });

        // Ajout d'un écouteur d'événements pour ouvrir l'info-bulle lorsqu'un marqueur est cliqué
        marker.addListener('click', (function (marker, content) {
            return function () {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            };
        })(marker, location[loc].content));
    }

}

// Fonction pour filtrer les emplacements en fonction du type sélectionné
function filterLocations(type) {
    // Si le type sélectionné est "tous", afficher tous les marqueurs
    if (type === 'all') {
        for (const loc in location) {
            location[loc].marker.setMap(map);
        }
    } else {
        // Sinon, afficher uniquement les marqueurs correspondant au type sélectionné
        for (const loc in location) {
            if (location[loc].type === type) {
                location[loc].marker.setMap(map);
            } else {
                location[loc].marker.setMap(null); // Masquer les marqueurs qui ne correspondent pas au type sélectionné
            }
        }
    }
}

window.onload = function () {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();

    // Écouteur d'événement pour détecter les changements de sélection dans le menu déroulant
    document.getElementById('location-filter').addEventListener('change', function () {
        // Récupérer la valeur sélectionnée
        const selectedType = this.value;
        // Filtrer les emplacements en fonction du type sélectionné
        filterLocations(selectedType);
    });
};

// l'analyse d'unité