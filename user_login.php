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

            foreach ($db->query('SELECT user_name, user_id FROM users') as $row)
            {
                echo "<a href=\"user_login.php?user_id=" . $row['user_id'] . "\">" . $row['user_name'] . "</a><br>";
            }
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>