<?php
include 'header.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Système de Ticketing</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-isabelline text-licorice">

  
  <main>
    <section class="ticket-form-section">
      <h2 class="secondary-light-coral">Créer un Nouveau Ticket</h2>
      <form class="ticket-form" action="create_ticket.php" method="post">
        <label for="title">Titre du Ticket:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        
        <button type="submit" class="accent-sunset-orange">Créer</button>
      </form>
    </section>

    <section class="tickets-list-section">
      <h2 class="secondary-light-coral">Mes Tickets</h2>
      <div id="tickets" class="tickets-list">
        <!-- Les tickets seront affichés ici -->
      </div>
    </section>
  </main>

  <script src="scripts.js"></script>
</body>
</html>
