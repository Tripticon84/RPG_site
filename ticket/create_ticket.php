<?php
include 'header.php';
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_SESSION['user_id'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $stmt = $conn->prepare('INSERT INTO tickets (user_id_uti, title, description) VALUES (?, ?, ?)');
  $stmt->bind_param('iss', $user_id, $title, $description);
  if ($stmt->execute()) {
    header('Location: tickets.php');
  } else {
    echo 'Erreur lors de la création du ticket';
  }
}
?>
