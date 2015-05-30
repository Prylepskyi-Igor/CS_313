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
            <h1>Please, select the album:</h1>
        </header>

        <main>
        	<?php 
            if (isset($_GET['A_ID'])) {
                $_SESSION["A_ID"] = $_GET['A_ID'];

                ob_start(); 

                $url =  "php-database-access.php";

                while (ob_get_status()) 
                {
                    ob_end_clean();
                }
                
                header( "Location: $url" );
            }

            if (isset($_GET['album'])) {
                $album_name = $_GET['album'];

                $stmt = $db->prepare('INSERT INTO albums (album_name, create_date) VALUES(:album_name, CURDATE())');
                $stmt->bindValue(':album_name', $album_name);
                $stmt->execute();

                $newId = $pdo->lastInsertId();

                $stmt = $db->prepare('INSERT INTO users (A_ID) VALUES(:newId)');
                $stmt->bindValue(':newId', $newId);
                $stmt->execute();

                $stmt->closeCursor();
            }

            foreach ($db->query('SELECT A_ID, album_name FROM albums WHERE A_ID =' . $_SESSION["A_ID"]) as $row)
            {
                echo "<a href=\"choose_album.php?A_ID=" . $row['A_ID'] . "\">" . $row['album_name'] . "</a>";
            }

            echo "<form action=\"user_album.php\" method=\"get\">";
            echo "  New Album: <input type=\"text\" name=\"album\">";
            echo "  <input type=\"submit\">";
            echo "</form>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="user_login.php">Back to user selection</a>
        </footer>
    </body>
</html>