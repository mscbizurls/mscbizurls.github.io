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

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the submitted document data
  $documentTitle = $_POST["title"];
  $documentContent = $_POST["content"];

  // Validate and process the document data
  // Replace this with your own logic for document creation and storage

  // Example: Save the document data to a file
  $filename = uniqid() . ".txt"; // Generate a unique filename
  $filePath = "documents/" . $filename; // Set the path to the documents folder

  // Create the document file
  $file = fopen($filePath, "w");
  if ($file) {
    fwrite($file, $documentContent); // Write the document content to the file
    fclose($file);
    $successMessage = "Document created successfully!";
  } else {
    $errorMessage = "Failed to create the document.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Create Document</h2>
    <form action="create_document.php" method="post">
      <div class="form-group">
        <label for="title">Document Title:</label>
        <input type="text" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">Document Content:</label>
        <textarea id="content" name="content" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Create">
      </div>
      <?php if (isset($successMessage)) { ?>
        <p class="success"><?php echo $successMessage; ?></p>
      <?php } ?>
      <?php if (isset($errorMessage)) { ?>
        <p class="error"><?php echo $errorMessage; ?></p>
      <?php } ?>
    </form>
  </div>
</body>
</html>
