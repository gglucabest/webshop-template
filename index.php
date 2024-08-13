<?php
// Functie om de inhoud dynamisch te laden op basis van de geselecteerde pagina
function loadContent($page) {
    switch ($page) {
        case 'producten':
            return '
                <h2>Onze Producten</h2>
                <div class="product">
                    <img src="img/product1.jpg" alt="Product 1">
                    <h3>Product 1</h3>
                    <p>Beschrijving van product 1.</p>
                    <a href="#" class="button">Koop Nu</a>
                </div>
                <div class="product">
                    <img src="img/product2.jpg" alt="Product 2">
                    <h3>Product 2</h3>
                    <p>Beschrijving van product 2.</p>
                    <a href="#" class="button">Koop Nu</a>
                </div>
                <div class="product">
                    <img src="img/product3.jpg" alt="Product 3">
                    <h3>Product 3</h3>
                    <p>Beschrijving van product 3.</p>
                    <a href="#" class="button">Koop Nu</a>
                </div>';
        case 'overons':
            return '
                <h2>Welkom op dit website template!</h2>
                <p>Deze pagina komt binnenkort beschikbaar.</p>';
        case 'contact':
            return '
                <h2>Contact</h2>
                <p>Neem contact met ons op via <a href="mailto:info@lucadevelopment.nl">info@lucadevelopment.nl</a>.</p>';
        default:
            return '
                <h2>Home</h2>
                <p>Welkom bij onze webshop! Ontdek onze producten en meer informatie over onze diensten.</p>';
    }
}

// Verkrijg de pagina die geladen moet worden
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Standaard naar 'home' als geen pagina is gespecificeerd
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #00264d; /* Donkerblauw */
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        footer {
            background-color: #00264d; /* Donkerblauw */
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
            width: 100%;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            flex-grow: 1;
        }

        nav {
            background-color: #003366; /* Donkerder blauw */
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px; /* Aanpassing van padding voor knoppen */
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }

        nav a:hover {
            background-color: #004080; /* Helderder blauw bij hover */
            transform: scale(1.1); /* Kleine vergroting bij hover */
        }

        .button {
            display: inline-block;
            color: white;
            background-color: #004080;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button:hover {
            background-color: #0059b3;
            transform: scale(1.05); /* Kleine vergroting bij hover */
        }

        .product {
            background: #fff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            transition: box-shadow 0.3s;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .product h3 {
            margin: 10px 0;
        }

        .product p {
            color: #666;
        }

        .product:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Schaduw bij hover */
            transform: translateY(-5px); /* Kleine verhoging bij hover */
        }

        .widgets {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .widget {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 100%;
            max-width: 300px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .widget:hover {
            transform: scale(1.05); /* Kleine vergroting bij hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Schaduw bij hover */
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        .footer-hosted {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .footer-hosted img {
            width: 20px;
            height: 20px;
        }

        /* Preloader CSS */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8); /* Semi-transparante achtergrond */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #preloader .spinner {
            border: 8px solid rgba(0, 0, 0, 0.1); /* Lichtgrijze rand */
            border-top: 8px solid #3498db; /* Blauwe rand bovenop */
            border-radius: 50%;
            width: 60px; /* Grotere spinner */
            height: 60px;
            animation: spin 1.5s linear infinite; /* Langzamere en soepelere draai-animatie */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div class="spinner"></div>
</div>

<header>
    <h1>Welkom bij de Webshop</h1>
</header>

<nav>
    <a href="?page=home">Home</a>
    <a href="?page=producten">Producten</a>
    <a href="?page=overons">Over Ons</a>
    <a href="?page=contact">Contact</a>
</nav>

<div class="container">
    <div class="content">
        <?php echo loadContent($page); ?>
    </div>

    <!-- Flexbox Widgets -->
    <div class="widgets">
        <!-- Widget 1 -->
        <div class="widget">
            <h3>Widget 1</h3>
            <p>Inhoud van widget 1.</p>
        </div>

        <!-- Widget 2 -->
        <div class="widget">
            <h3>Widget 2</h3>
            <p>Inhoud van widget 2.</p>
        </div>

        <!-- Widget 3 -->
        <div class="widget">
            <h3>Widget 3</h3>
            <p>Inhoud van widget 3.</p>
        </div>
    </div>
</div>

<footer>
    <p>Made and Developed by <a href="https://lucadevelopment.nl" style="color: white; text-decoration: none;">LucaDevelopment.nl</a></p>
    <p class="footer-hosted">Hosted 24/7 by <a href="https://luxehost.nl" style="color: white; text-decoration: none;">LuxeHost</a>
    <img src="https://cdn.discordapp.com/emojis/1245359970950578236.webp?size=240&quality=lossless" alt="Emoticon"></p>
</footer>

<!-- JavaScript code for preloader -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function simulateHeavyTask() {
            return new Promise(resolve => {
                setTimeout(() => {
                    resolve();
                }, 300); // Simuleer een zware taak van 300ms
            });
        }

        async function hidePreloader() {
            await simulateHeavyTask(); // Wacht tot de zware taak is voltooid
            document.getElementById('preloader').style.display = 'none'; // Verberg de preloader
        }

        hidePreloader();
    });
</script>

</body>
</html>
