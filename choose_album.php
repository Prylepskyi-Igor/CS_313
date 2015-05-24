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
    ?>
</head>
    <body>
        <header class="page_header">
            <h1>Please, select the user:</h1>
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

            foreach ($db->query('SELECT A_ID, album_name FROM albums') as $row)
            {
                echo "<a href=\"user_login.php?A_ID=" . $row['A_ID'] . "\">" . $row['album_name'] . "</a>";
            }
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="user_login.php">Back to user selection/a>
        </footer>
    </body>
</html>