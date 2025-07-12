<?php
include '../includes/auth.php';
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
  $stmt->bind_param("ssi", $title, $content, $id);
  $stmt->execute();
  header("Location: dashboard.php");
}

$post = $conn->query("SELECT * FROM posts WHERE id = $id")->fetch_assoc();
?>

<form method="post">
  <input type="text" name="title" value="<?= $post['title'] ?>" required><br>
  <textarea name="content"><?= $post['content'] ?></textarea><br>
  <button type="submit">Update</button>
</form>
