<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Events</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="assets/css/css.css" rel="stylesheet" />
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDh_JU8Nyx-STIx1FdFLk9JHu_cXvUj4tw"></script>
</head>

<body>
    <!-- En-tête -->
    <header>
        <h1>Live Events 2024</h1>
        <p>Une expérience inoubliable de musique, de culture et de plaisir !</p>
    </header>

    <html lang="fr">
    <!-- Navigation -->
    <nav>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <div class="nav-links">
            <a href="/index.php">Accueil</a>
            <a href="/src/events.php">Programme</a>
            <a href="/src/concert.php">Concerts</a>
            <a href="/src/partner.php">Partenaires</a>
            <a href="/src/faq.php">FAQ</a>
        </div>
    </nav>

    <!-- Highlights -->
    <section class="highlights">
        <div class="highlight">
            <img src='https://t3.ftcdn.net/jpg/05/47/49/28/240_F_547492877_oXh5yqUJO7NFbfvLsaeQUkvpu8OvloQK.jpg' alt="Concert Live">
            <h3>Concerts Live</h3>
            <p>Assistez aux performances des plus grands artistes du moment dans une ambiance électrique.</p>
        </div>
        <div class="highlight">
            <img src='https://images.stockcake.com/public/1/5/4/15424fd0-5b95-4696-9b67-75c5d4d31bb4_large/food-truck-festival-stockcake.jpg' alt="Food Festival">
            <h3>Food Trucks</h3>
            <p>Découvrez des saveurs du monde entier avec une sélection de food trucks variée.</p>
        </div>
        <div class="highlight">
            <img src='https://static.actu.fr/uploads/2019/07/D_eSFljXkAM-aRt.jpg' alt="Feu d'artifice">
            <h3>Feu d'Artifice</h3>
            <p>Admirez un spectacle pyrotechnique grandiose pour clôturer le festival en beauté.</p>
        </div>
    </section>

    <section class="highlights">
        <div class="highlight">
            <img src='https://t3.ftcdn.net/jpg/05/47/49/28/240_F_547492877_oXh5yqUJO7NFbfvLsaeQUkvpu8OvloQK.jpg' alt="Concert Live">
            <h3>Concerts Live</h3>
            <p>Assistez aux performances des plus grands artistes du moment dans une ambiance électrique.</p>
        </div>
        <div class="highlight">
            <img src='https://images.stockcake.com/public/1/5/4/15424fd0-5b95-4696-9b67-75c5d4d31bb4_large/food-truck-festival-stockcake.jpg' alt="Food Festival">
            <h3>Food Trucks</h3>
            <p>Découvrez des saveurs du monde entier avec une sélection de food trucks variée.</p>
        </div>
        <div class="highlight">
            <img src='https://static.actu.fr/uploads/2019/07/D_eSFljXkAM-aRt.jpg' alt="Feu d'artifice">
            <h3>Feu d'Artifice</h3>
            <p>Admirez un spectacle pyrotechnique grandiose pour clôturer le festival en beauté.</p>
        </div>
    </section>

    <footer>
        <div>
            <p class="le_footer">Live Events</p>
        </div>
        <div>
            <a href="https://twitter.com/votrecompte" target="_blank"><i class="fab fa-twitter">&nbsp;Twitter</i></a>
            <a href="https://www.instagram.com/votrecompte" target="_blank"><i class="fab fa-instagram">&nbsp;Instagram</i></a>
            <a href="https://www.facebook.com/votrepage" target="_blank"><i class="fab fa-facebook">&nbsp;Facebook</i></a>
        </div>
        <div>
            <p class="le_footer">Mentions légales</p>
        </div>
    </footer>

    <script>
    document.querySelector('.menu-toggle').addEventListener('click', function() {
        document.querySelector('.nav-links').classList.toggle('active');
    });
</script>
</body>
</html>
