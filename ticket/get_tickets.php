<?php
session_start();
require 'db.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare('SELECT title, description, status, created_at FROM tickets WHERE user_id_uti = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$tickets = [];
while ($row = $result->fetch_assoc()) {
  $tickets[] = $row;
}

echo json_encode($tickets);
?>
