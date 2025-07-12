<?php
include '../includes/auth.php';
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $content);
  $stmt->execute();
  header("Location: dashboard.php");
}
?>
<form method="post">
  <input type="text" name="title" required placeholder="Title"><br>
  <textarea name="content" required placeholder="Content"></textarea><br>
  <button type="submit">Publish</button>
</form>
