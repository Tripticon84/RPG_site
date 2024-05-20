<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Support</title>
    <link rel="stylesheet" href="../css/jim.css">
</head>
<?php
include '../includes/header.php'; ?>

<body>

    <h1>FAQ</h1>

    <div class="container">
        <h1>Règles et directives pour les utilisateurs</h1>

        <button class="accordion">Question de base</button>
        <div class="panel">
            <h3>Qu'est-ce qu'un jeu de rôle ?</h3>
            <p>Un jeu de rôle (JdR) est une activité dans laquelle les joueurs incarnent des personnages dans un univers fictif, suivant des règles prédéfinies et guidés par un maître du jeu. Les joueurs prennent des décisions et accomplissent des actions en fonction de leurs personnages.</p>
            <h3>Comment puis-je améliorer mon personnage ?</h3>
            <p>Votre personnage s'améliore généralement en gagnant de l'expérience (XP) à travers les aventures et les défis. L'XP permet de monter de niveau, ce qui augmente les compétences et les capacités de votre personnage. Les détails spécifiques dépendent du système de jeu utilisé.</p>
        </div>

        <button class="accordion">Questions avancées</button>
        <div class="panel">
            <h3>Que fait le maître du jeu (MJ) ?</h3>
            <p>Le maître du jeu (MJ) est responsable de créer l'histoire, de décrire l'univers du jeu, et de gérer les interactions entre les personnages et l'environnement. Le MJ arbitre également les règles et résout les conflits qui peuvent survenir pendant la partie.</p>
            <h3> Comment les actions des personnages sont-elles déterminées ?</h3>
            <p>Les actions des personnages sont déterminées par un mélange de décisions des joueurs et de jets de dés (ou d'autres mécanismes aléatoires) pour simuler les chances de succès ou d'échec. Les règles du jeu définissent comment ces actions sont résolues.</p>
            <h3>Mesure de sécurité</h3>
            <p>Les mesures de sécurité en place sont destinées à protéger les utilisateurs et leurs données. Toute tentative de contourner ou de compromettre ces mesures sera sévèrement punie.</p>
            <h3>Que faire si je ne suis pas d'accord avec une décision du MJ ?</h3>
            <p>Si vous n'êtes pas d'accord avec une décision du MJ, discutez-en de manière respectueuse en dehors du jeu. Le MJ a le dernier mot, mais une communication ouverte peut aider à résoudre les conflits et améliorer l'expérience de jeu pour tout le monde.</p>
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

    <div class="pic-container">
        <img src="../img/FAQ.jpg" alt="faq">
    </div>

    <p>Si vous rencontrez un bug ou un problème technique en jeu, veuillez utiliser notre système de signalement de problèmes ci-dessous . Décrivez le problème aussi clairement que possible, en indiquant les étapes pour le reproduire, et notre équipe technique travaillera pour le résoudre dès que possible</p>
    <form action="index.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Message :</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Code pour envoyer le message par email ou le stocker dans une base de données
        echo "<p>Merci, $name. Votre message a été envoyé.</p>";
    }
    ?>
</body>
<?php include '../includes/footer.php'; ?>

</html>