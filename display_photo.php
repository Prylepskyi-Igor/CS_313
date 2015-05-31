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

        if (isset($_GET['pic_note'])) {
                $stmt = $db->prepare('UPDATE photos SET photo_note = :photo_note');
                $stmt->bindValue(':photo_note', $_GET['pic_note']);
                $stmt->execute();
                $stmt->closeCursor();

                $_SESSION["pic_note"] = $_GET['pic_note'];
            }

            if (isset($_GET['pic_name'])) {
                $stmt = $db->prepare('UPDATE photos SET photo_name = :photo_name');
                $stmt->bindValue(':photo_name', $_GET['pic_name']);
                $stmt->execute();
                $stmt->closeCursor();

                $_SESSION["pic_name"] = $_GET['pic_name'];
            }
    ?>

    <script type="text/javascript">
    function myfunc() {
        <?php 
        $stmt = $db->prepare('DELETE FROM photos WHERE P_ID = :P_ID');
        $stmt->bindValue(':P_ID', $_SESSION["P_ID"]);
        $stmt->execute();

        ob_start();

        $url =  "display_photo.php";

        while (ob_get_status()) 
        {
            ob_end_clean();
        }

        header( "Location: $url" );
        ?>
    }
    </script>

</head>
    <body>
        <header>
            
        </header>

        <main>
        	<?php 
            echo "<form action=\"display_photo.php\" method=\"get\">";

            echo "<h1 class=\"page_header\"><input type=\"text\" name=\"pic_name\" value=\"" . $_SESSION["pic_name"] . "\"></input></h1>";

            echo "<div id=\"single_photo\">";
            echo "<img src=\"" . $_SESSION["pic_path"] . "\"/><br>";
            echo "<p><textarea rows=\"8\" cols=\"50\" name=\"pic_note\" value=\"" . $_SESSION["pic_note"] . "\"></textarea></p>";
            echo "</div><br>";

            echo "<input type=\"submit\" value=\"Save\"><br>";
            echo "<input type=\"button\" onclick=\"myfunc()\" value=\"Delete\">";
            echo "</form>";
            ?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="php-database-access.php">Back to album</a>
        </footer>
    </body>
</html>