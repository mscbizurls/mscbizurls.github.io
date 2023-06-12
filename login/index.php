<?php
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validate the username and password
  // Replace this with your own authentication logic
  if ($username === "mscbizfounder" && $password === "20091009") {
    // Authentication successful, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
  } else {
    // Authentication failed, display an error message
    $errorMessage = "Invalid username or password.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Login">
      </div>
      <?php if (isset($errorMessage)) { ?>
        <p class="error"><?php echo $errorMessage; ?></p>
      <?php } ?>
    </form>
  </div>
</body>
</html>
