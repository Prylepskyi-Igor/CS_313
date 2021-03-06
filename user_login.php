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
        require('password.php');

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
                foreach ($db->query('SELECT user_name, user_password, user_id FROM users') as $row)
                {
                    $hash = $row['user_password'];

                    //if (password_verify($_GET['user_password'], $hash) && $row['user_name'] === $_GET['user_name']) {
                    if ($row['user_password'] === $_GET['user_password'] && $row['user_name'] === $_GET['user_name']) {
                        $_SESSION["user_id"] = $row['user_id'];

                        ob_start(); 

                        $url =  "choose_album.php";

                        while (ob_get_status()) 
                        {
                            ob_end_clean();
                        }
                                
                        header( "Location: $url" );
                        
                        goto exit_db_loop;
                    }
                }

                echo "Signin error!<br>";
            }

            exit_db_loop:

            echo "<form action=\"user_login.php\" method=\"get\">";
            echo "  User: <input type=\"text\" name=\"user_name\"><br>";
            echo "  Password: <input type=\"password\" name=\"user_password\"><br>";
            echo "  <input type=\"submit\"><br>";
            echo "  <a href=\"user_signup.php\">Signup</a>";
            echo "</form>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>