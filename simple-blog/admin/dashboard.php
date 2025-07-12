<?php
include '../includes/auth.php';
include '../includes/db.php';
?>
<h1>Welcome, <?= $_SESSION['username'] ?></h1>
<a href="new-post.php">+ New Post</a>

<?php
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()):
?>
  <div>
    <h3><?= $row['title'] ?></h3>
    <a href="edit-post.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="delete-post.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete post?')">Delete</a>
  </div>
<?php endwhile; ?>
