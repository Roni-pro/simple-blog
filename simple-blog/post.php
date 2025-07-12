<?php include 'C:\xampp\htdocs\simple-blog\includes\db.php';
$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id = $id")->fetch_assoc();
?>
<h1><?= $post['title'] ?></h1>
<p><?= nl2br($post['content']) ?></p>
<a href="index.php">← Back to home</a>
