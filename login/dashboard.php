<?php
// Check if the user is authenticated
// You can implement your own authentication logic here
// For example, you can check if the user is logged in by verifying session or cookie data

// If the user is not authenticated, redirect to the login page
// Replace "login.php" with the actual login page URL
if (!isset($_SESSION['authenticated'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Employee Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Welcome to the Employee Dashboard</h2>
    <p>Here, you can access important information and perform various tasks.</p>
    <div class="button-container">
      <a class="dashboard-button" href="https://github.com/mscbizurls/mscbizurls.github.io" target="_blank">Go to GitHub</a>
      <a class="dashboard-button" href="create_document.php">Create Document</a>
      <a class="dashboard-button" href="chatbox.php">Chat Box</a>
    </div>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
