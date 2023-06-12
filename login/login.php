<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the submitted username and password
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Perform basic authentication
  // Replace this with your own authentication logic

  // Example: check if the username is "mscbizfounder" and the password is "20091009"
  if ($username === "mscbizfounder" && $password === "20091009") {
    // Successful login
    // Redirect to the dashboard or desired page
    header("Location: dashboard.php");
    exit();
  } else {
    // Invalid credentials
    $errorMessage = "Invalid username or password";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Employee Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Employee Login</h2>
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
