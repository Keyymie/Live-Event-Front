document.addEventListener('DOMContentLoaded', function() {
    fetch('http://localhost/wordpress/wp-json/tribe/events/v1/events/')
        .then(response => response.json())
        .then(data => {
            // Récupération des événements
            const events = data.events;

            // Groupement des événements par catégorie
            const eventsByCategory = {};

            events.forEach(event => {
                // Accès au nom de la première catégorie de l'événement
                const categoryName = event.categories[0].name;

                if (!eventsByCategory[categoryName]) {
                    eventsByCategory[categoryName] = [];
                }
                eventsByCategory[categoryName].push(event);
            });

            // Sélection du conteneur dans lequel les événements seront affichés
            const eventsContainer = document.getElementById('events-container');

            // Affichage des événements par catégorie
            for (const category in eventsByCategory) {
                const eventsInCategory = eventsByCategory[category];

                // Création d'un conteneur pour les événements de cette catégorie
                const categoryContainer = document.createElement('div');
                categoryContainer.classList.add('general_c1');
                categoryContainer.innerHTML = `<h1>${category}</h1>`;

                // Création et affichage des éléments HTML pour chaque événement de la catégorie
                eventsInCategory.forEach(event => {
                    categoryContainer.innerHTML += `
    <div id="test" class="general_c2">
      <h2>${event.title}</h2>
      <p class="dateC">Date : ${event.start_date}</p>
      <p class="locationC">Emplacement : ${event.venue.venue}</p>
      <p class="descriptionC">Description : ${event.description}</p>
    </div>`;
                });

                // Ajout du conteneur de catégorie au conteneur principal
                eventsContainer.appendChild(categoryContainer);
            }

        })
        .catch(error => {
            console.error('Erreur lors de la récupération des événements :', error);
        });
});
