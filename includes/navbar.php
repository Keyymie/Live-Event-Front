<header>
    <h1>Live Events 2024</h1>
    <p>Une expérience inoubliable de musique, de culture et de plaisir !</p>
</header>   
<nav>
        <button class="menu-toggle" onclick="toggleMenu()">☰</button>
        <div class="nav-links">
            <a href="index.php">Accueil</a>
            <a href="src/events.php">Programme</a>
            <a href="src/concert.php">Concerts</a>
            <a href="src/partner.php">Partenaires</a>
            <a href="src/faq.php">FAQ</a>
        </div>
    </nav>
    <script>
    document.querySelector('.menu-toggle').addEventListener('click', function() {
        document.querySelector('.nav-links').classList.toggle('active');
    });
</script>
<main>