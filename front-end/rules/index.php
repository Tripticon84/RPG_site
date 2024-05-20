<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Règles</title>
    <link rel="stylesheet" href="../css/jim.css">
</head>

<?php include '../includes/header.php'; ?>

<head>
    <link rel="stylesheet" href="../css/jim.css">
</head>

<body>
    <div class="rules">
        <h2>Règles de Roll-Of-Odyssey</h2>
        <p>Voici les règles de bases de Roll-Of-Odyssey. Veuillez les lire attentivement avant de commencer à jouer.</p>
        <ul>
            <li>Règle 1 : Choisissez une race pour votre personnage parmi les options disponibles.</li>
            <li>Règle 2 : Sélectionnez une classe qui représente les compétences et les capacités de votre personnage.</li>
            <li>Règle 3 : Répartissez les points de caractéristiques (force, dextérité, intelligence, etc.) selon les règles fournies.</li>
            <li>Règle 4 : Choisissez des compétences et des capacités spéciales pour personnaliser votre personnage.</li>
            <div class="pic-container">
                <img src="../img/terrain1.png" alt="terrain">
            </div>

            <!-- Ajoutez d'autres règles ici -->
        </ul>
    </div>

    <h2>règles de base</h2>
    <ul>
        <li>-Pour effectuer une action, lancez un dé et ajoutez votre modificateur de compétence approprié.</li>
        <li>-Le Maître de Jeu décide des résultats des actions en fonction des jets de dés et des circonstances de la situation.</li>
        <li>-Le combat est résolu en tours, chaque personnage et ennemi -agissant dans un ordre déterminé par l'initiative.</li>
        <li>-La santé de votre personnage est représentée par des points de vie (PV) ; lorsque ceux-ci atteignent zéro, votre personnage est inconscient ou mort.</li>
        <div class="container">
            <h1>Règles et directives pour les utilisateurs</h1>

            <button class="accordion">Règles de sécurités</button>
            <div class="panel">
                <h3>Conditions d'utilisation</h3>
                <p>Les conditions d'utilisation de notre site sont essentielles pour assurer une expérience agréable et sécurisée pour tous les joueurs. Vous devez accepter ces conditions avant de commencer à jouer.</p>
                <h3>Mentions légales</h3>
                <p>Les mentions légales décrivent les responsabilités légales de notre site et de ses utilisateurs. Veuillez les lire attentivement pour comprendre vos droits et obligations.</p>
            </div>

            <button class="accordion">Règles avancées</button>
            <div class="panel">
                <h3>Usage politique</h3>
                <p>L'utilisation politique de notre site est strictement régulée. Toute tentative de promouvoir des agendas politiques ou de manipuler les discussions à des fins politiques est interdite.</p>
                <h3>Action interdite</h3>
                <p>Les actions interdites incluent, sans s'y limiter, le harcèlement, la tricherie, et tout comportement nuisible ou perturbateur. Le non-respect de ces règles peut entraîner des sanctions sévères, y compris l'expulsion définitive du site.</p>
                <h3>Mesure de sécurité</h3>
                <p>Les mesures de sécurité en place sont destinées à protéger les utilisateurs et leurs données. Toute tentative de contourner ou de compromettre ces mesures sera sévèrement punie.</p>
                <h3>Temps limité</h3>
                <p>Les règles concernant le temps limité sont en place pour assurer une distribution équitable du temps de jeu entre tous les utilisateurs. Veillez à respecter les limites de temps afin de garantir une expérience équilibrée pour tous.</p>
            </div>
        </div>


        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        </script>
    </ul>
    </div>
</body>

</html>

<?php include '../includes/footer.php'; ?>