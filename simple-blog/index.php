<?php include 'C:\xampp\htdocs\simple-blog\includes\db.php'; ?>
<h1>Simple Blog</h1>
<?php
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()):
?>
  <div>
    <h2><a href="C:\xampp\htdocs\simple-blog\post.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h2>
    <p><?= substr($row['content'], 0, 150) ?>...</p>
  </div>
<?php endwhile; ?>
