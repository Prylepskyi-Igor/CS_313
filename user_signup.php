<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="footer_script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" 
              media="screen">
    <title>Album</title>

    <?php 
        session_start();

        require("dbConnector.php");

        $db = loadDatabase();
    ?>
</head>
    <body>
        <header class="page_header">
            <h1>Please, select the user:</h1>
        </header>

        <main>
        	<?php
            
            if (isset($_GET['user_name']) && isset($_GET['user_password'])) {
                $user_name = $_GET['user_name'];
                $user_password = $_GET['user_password'];

                // add user to the database
                $stmt = $db->prepare('INSERT INTO users (user_name, user_password, create_date) VALUES(:user_name, :user_password, CURDATE())');
                $stmt->bindValue(':user_name', $user_name);
                $stmt->bindValue(':user_password', $user_password);
                $stmt->execute();

                $stmt->closeCursor();
            }

            echo "<form action=\"user_login.php\" method=\"get\">";
            echo "  New User: <input type=\"text\" name=\"user_name\"><br>";
            echo "  New Password: <input type=\"text\" name=\"user_password\"><br>";
            echo "  <input type=\"submit\">";
            echo "</form>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="user_login.php">To User Login</a>
        </footer>
    </body>
</html>