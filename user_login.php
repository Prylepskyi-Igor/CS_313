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
            if (isset($_GET['user_id'])) {
                $_SESSION["user_id"] = $_GET['user_id'];

                ob_start(); 

                $url =  "choose_album.php";

                while (ob_get_status()) 
                {
                    ob_end_clean();
                }
                
                header( "Location: $url" );
            }
            
            if (isset($_GET['user'])) {
                $user_name = $_GET['user'];

                // add user to the database
                $stmt = $db->prepare('INSERT INTO users (user_name, create_date) VALUES(:user_name, CURDATE())');
                $stmt->bindValue(':user_name', $user_name);
                $stmt->execute();

                // extract last user id from the database
                $stmt = $db->prepare('SELECT MAX(user_id) FROM user');
                $stmt->execute();
                $stmt->bind_result($id);

                // store user id into session variable
                $_SESSION["newId"] = $id;

                $stmt->closeCursor();
            }

            foreach ($db->query('SELECT user_name, user_id FROM users') as $row)
            {
                echo "<a href=\"user_login.php?user_id=" . $row['user_id'] . "\">" . $row['user_name'] . "</a><br>";
            }

            echo "<form action=\"user_login.php\" method=\"get\">";
            echo "  New User: <input type=\"text\" name=\"user\">";
            echo "  <input type=\"submit\">";
            echo "</form>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>