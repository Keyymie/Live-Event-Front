<?php
require_once(__DIR__ . '/../includes/header.php');
?>

<label for="filter">Filtrer par :</label>
<select id="filter">
  <option value="hour">Heure</option>
  <option value="day">Jour</option>
</select>

<div id="events"></div>

<script>
  const filterSelect = document.getElementById('filter');
  const eventsContainer = document.getElementById('events');

  filterSelect.addEventListener('change', () => {
    fetchData();
  });

  function fetchData() {
    const apiUrl = 'http://localhost/wordpress/wp-json/tribe/events/v1/events/';

    fetch(apiUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        const filter = filterSelect.value;
        renderEvents(data, filter);
      })
      .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
      });
  }

  function renderEvents(data, filter) {
    // Copie des événements pour éviter de modifier l'original
    let events = [...data.events];

    // Filtrer les événements pour ne conserver que ceux ayant la catégorie "concert"
    events = events.filter(event => {
      return event.categories.some(category => category.name === 'Concert');
    });

    // Tri des événements en fonction de la date de début
    events.sort((a, b) => {
      const dateA = new Date(a.start_date_details.year, a.start_date_details.month - 1, a.start_date_details.day, a.start_date_details.hour, a.start_date_details.minutes);
      const dateB = new Date(b.start_date_details.year, b.start_date_details.month - 1, b.start_date_details.day, b.start_date_details.hour, b.start_date_details.minutes);
      return dateA - dateB;
    });

    let html = '';

    events.forEach(event => {
      if (filter === 'hour') {
        const hour = event.start_date_details.hour;
        html += `
<div id="test" class="general_c2">
  <h2>${event.title}</h2>
  <p class="dateC">Date : ${event.start_date}</p>
  <p class="locationC">Emplacement : ${event.venue.venue}</p>
  <p class="descriptionC">Description : ${event.description}</p>
</div>
`;
      } else if (filter === 'day') {
        const day = event.start_date_details.day;
        html += `
<div id="test" class="general_c2">
  <h2>${event.title}</h2>
  <p class="dateC">Date : ${event.start_date}</p>
  <p class="locationC">Emplacement : ${event.venue.venue}</p>
  <p class="descriptionC">Description : ${event.description}</p>
</div>
`;
      }
    });

    eventsContainer.innerHTML = html;
  }

  // Initial rendering
  fetchData();
</script>