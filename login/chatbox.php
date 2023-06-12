<?php
// Load the chat history from a file
$chatHistory = [];
$filePath = 'chat_history.txt';

if (file_exists($filePath)) {
    $chatHistory = unserialize(file_get_contents($filePath));
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];

    // Add the new message to the chat history
    $chatHistory[] = [
        'timestamp' => time(),
        'message' => $message,
    ];

    // Save the updated chat history to the file
    file_put_contents($filePath, serialize($chatHistory));

    // Redirect to prevent form resubmission
    header("Location: chatbox.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Chat Box</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .chat-container {
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .chat-container h2 {
            text-align: center;
        }

        .chat-history {
            border: 1px solid #ddd;
            max-height: 300px;
            overflow-y: scroll;
            padding: 10px;
        }

        .chat-message {
            margin-bottom: 10px;
        }

        .chat-form input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        .chat-form input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 14px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <h2>Employee Chat Box</h2>

        <div class="chat-history">
            <?php foreach ($chatHistory as $chat) { ?>
                <div class="chat-message">
                    <span class="timestamp"><?php echo date('Y-m-d H:i:s', $chat['timestamp']); ?></span>
                    <p><?php echo $chat['message']; ?></p>
                </div>
            <?php } ?>
        </div>

        <form class="chat-form" action="chatbox.php" method="post">
            <input type="text" name="message" placeholder="Type your message" required>
            <input type="submit" value="Send">
        </form>
    </div>
</body>
</html>
