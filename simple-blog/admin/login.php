<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: dashboard.php");
  } else {
    $error = "Invalid login";
  }
}
?>
<form method="post">
  <h2>Login</h2>
  <?php if (isset($error)) echo "<p>$error</p>"; ?>
  <input type="text" name="username" required placeholder="Username"><br>
  <input type="password" name="password" required placeholder="Password"><br>
  <button type="submit">Login</button>
</form>
