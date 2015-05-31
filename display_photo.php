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
            echo "<h1><input type=\"text\" name=\"pic_name\" value=\"" . $_SESSION["pic_name"] . "\"></input></h1>"
            ?>
        </header>

        <main>
        	<?php 
            echo "<form action=\"display_photo.php\" method=\"get\">";

            echo "<div id=\"single_photo\">";
            echo "<img src=\"" . $_SESSION["pic_path"] . "\"/><br>";
            echo "<p><input type=\"text\" name=\"pic_note\" value=\"" . $_SESSION["pic_note"] . "\"></input></p>";
            echo "</div><br>";

            echo "  <input type=\"Save Changes\">";
            echo "</form>";

            if (isset($_GET['pic_note'])) {
                $stmt = $db->prepare('UPDATE photos SET photo_note = :photo_note');
                $stmt->bindValue(':photo_note', $_GET['pic_note']);
                $stmt->execute();
            }

            if (isset($_GET['pic_name'])) {
                $stmt = $db->prepare('UPDATE photos SET photo_name = :photo_name');
                $stmt->bindValue(':photo_name', $_GET['pic_name']);
                $stmt->execute();
            }
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="php-database-access.php">Back to album</a>
        </footer>
    </body>
</html>