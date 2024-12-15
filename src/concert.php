<?php
require_once(__DIR__ . '/../includes/header.php');

?>
<div class="container_conc">
    <label for="day">Sélectionner un jour (1-31) :</label>
    <input type="number" id="day" min="1" max="31">
    <label for="hour">Sélectionner une heure (9-23) :</label>
    <input type="number" id="hour" min="9" max="23">
    <button id="submit">Afficher les événements</button>
    <button id="showAll">Tous</button>
</div>

<div id="events"></div>
<script src="/wordpress/wp-admin/live-events/src/js/concert.js"></script>

<div id="map-container">
    <div>CARTE</div>
    <div id="map"></div>
    <!-- <div id="filter-options">
        <select id="location-filter">
            <option value="all">Tous</option>
            <option value="restaurant">Restaurant</option>
            <option value="hygiene">Toilettes</option>
        </select>
    </div> -->
</div>

<script src="/wordpress/wp-admin/live-events/src/js/map.js"></script>       
<!-- programme -->

<?php
require_once(__DIR__ . '/../includes/footer.php');

?>