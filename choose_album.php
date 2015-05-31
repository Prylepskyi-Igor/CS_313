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

            if (isset($_GET['album_name'])) {
                // insert album into the database
                $stmt = $db->prepare('INSERT INTO albums (album_name, create_date) VALUES(:album_name, CURDATE())');
                $stmt->bindValue(':album_name', $_GET['album_name']);
                $stmt->execute();

                // copy A_ID from albums table to users table
                $stmt = $db->prepare('INSERT INTO users (A_ID) SELECT MAX(A_ID) FROM albums WHERE user_id = :newId');
                $stmt->bindValue(':newId', $_SESSION["user_id"]);
                $stmt->execute();

                // extract last album id from the database
                //$stmt = $db->prepare("SELECT MAX(A_ID) FROM albums");
                //$stmt->execute();
                //$stmt->bind_result($id);

                //$stmt = $db->prepare('INSERT INTO users (A_ID) VALUES(:newA_ID) WHERE user_id = :U_ID');
                //$stmt->bindValue(':U_ID', $U_ID);
                //$stmt->bindValue(':A_ID', $newA_ID);
                //$stmt->execute();

                //$stmt->closeCursor();
            }

            foreach ($db->query('SELECT A_ID, album_name FROM albums WHERE A_ID = ' . $_SESSION['A_ID']) as $row)
            {
                echo "<a href=\"choose_album.php?A_ID=" . $row['A_ID'] . "\">" . $row['album_name'] . "</a><br>";
            }

            echo "<form action=\"choose_album.php\" method=\"get\">";
            echo "  New Album: <input type=\"text\" name=\"album_name\">";
            echo "  <input type=\"submit\">";
            echo "</form>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="user_login.php">Back to user selection</a>
        </footer>
    </body>
</html>