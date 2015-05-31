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
            <?php 
            echo "<h1><input type=\"text\" value=\"" . $_SESSION["pic_name"] . "\"></input></h1>"
            ?>
        </header>

        <main>
        	<?php 
            echo "<div id=\"single_photo\">";
            echo "<img src=\"" . $_SESSION["pic_path"] . "\"/><br>";
            echo "<p>" . $_SESSION["pic_note"] . "</p>";
            echo "</div>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="php-database-access.php">Back to album</a>
        </footer>
    </body>
</html>