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
            if (isset($_GET['user_id'])) {
                ob_start(); 

                $url =  "php-database-access.php";

                while (ob_get_status()) 
                {
                    ob_end_clean();
                }
                
                header( "Location: $url" );
            }

            if (isset($_GET['album_name'])) {
                try {
                    // insert album into the database
                    $stmt = $db->prepare('INSERT INTO albums (album_name, create_date, user_id) VALUES(:album_name, CURDATE(), :user_id)');
                    $stmt->bindValue(':album_name', $_GET['album_name']);
                    $stmt->bindValue(':user_id', $_SESSION['user_id']);
                    $stmt->execute();
                    $stmt->closeCursor();

                    if ($stmt->execute()) {
                        echo "Successfully updated albums<br>";
                    } else {
                        print_r($stmt2->errorInfo()); // if any error is there it will be posted
                        echo "<br>";
                    }
                } catch (PDOException $e) {
                    display_db_error($e->getMessage());
                }

                ob_start(); 

                $url =  "choose_album.php";

                while (ob_get_status()) 
                {
                ob_end_clean();
                }
                        
                header( "Location: $url" );
            }

            //if(isset($_SESSION["user_id"]) === False)
            //    echo "No albums to display<br><br>";

            foreach ($db->query('SELECT user_id, album_name FROM albums WHERE user_id = ' . $_SESSION['user_id']) as $row)
            {
                echo "<a href=\"choose_album.php?user_id=" . $row['user_id'] . "\">" . $row['album_name'] . "</a><br>";
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