const dayInput = document.getElementById('day');
const hourInput = document.getElementById('hour');
const submitButton = document.getElementById('submit');
const showAllButton = document.getElementById('showAll');
const eventsContainer = document.getElementById('events');

submitButton.addEventListener('click', () => {
  const selectedDay = parseInt(dayInput.value);
  const selectedHour = parseInt(hourInput.value);
  if (isNaN(selectedDay) || selectedDay < 1 || selectedDay > 31) {
    eventsContainer.innerHTML = "<p>Veuillez saisir un jour valide entre 1 et 31.</p>";
    return;
  }
  if (isNaN(selectedHour) || selectedHour < 9 || selectedHour > 23) {
    eventsContainer.innerHTML = "<p>Veuillez saisir une heure valide entre 9 et 23.</p>";
    return;
  }
  fetchData(selectedDay, selectedHour);
});

showAllButton.addEventListener('click', () => {
  fetchData(-1, -1);
});

function fetchData(selectedDay, selectedHour) {
  const apiUrl = 'http://localhost/wordpress/wp-json/tribe/events/v1/events/';

  fetch(apiUrl)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      renderEvents(data, selectedDay, selectedHour);
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}

function renderEvents(data, selectedDay, selectedHour) {
  let html = '';

  const events = data.events.filter(event => {
    return (selectedDay === -1 || parseInt(event.start_date_details.day) === selectedDay) &&
      (selectedHour === -1 || parseInt(event.start_date_details.hour) === selectedHour) &&
      event.categories.some(category => category.name === 'Concert');
  });

  if (events.length === 0) {
    html = `<p>Il n'y a pas d'événement pour le jour ${selectedDay} à l'heure ${selectedHour}.</p>`;
  } else {
    events.forEach(event => {
      html += `
<div id="test" class="general_c2">
<h2>${event.title}</h2>
<p class="dateC">Date : ${event.start_date}</p>
<p class="locationC">Emplacement : ${event.venue.venue}</p>
<p class="descriptionC">Description : ${event.description}</p>
</div>
`;
    });
  }

  eventsContainer.innerHTML = html;
}

// Initial rendering
document.addEventListener('DOMContentLoaded', () => {
  fetchData(-1, -1); // Utiliser des valeurs non valides pour le jour et l'heure pour afficher tous les concerts
});