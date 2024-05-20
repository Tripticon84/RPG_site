<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Système de Ticketing</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-isabelline text-licorice">
  <header class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="primary-firebrick">Système de Ticketing</h1>
      <nav>
        <ul class="nav">
          <li class="nav-item"><a class="nav-link" href="tickets.php">Mes Tickets</a></li>
          <li class="nav-item"><a class="nav-link" href="get_tickets.php">Créer un Ticket</a></li>
          <li class="nav-item"><a class="nav-link" href="profile.php">Mon Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
          <li class="nav-item"><button class="btn btn-outline-secondary" onclick="toggleTheme()"><i class="fas fa-adjust"></i></button></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- Le reste du contenu -->
