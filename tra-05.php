<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="footer_script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" 
              media="screen">
    <?php 
    	session_start();
        
        require("dbConnector.php");

        $db = loadDatabase();
    ?>
    <title>Scripture Topic</title>
</head>
    <body>
        <header class="page_header">
        	<h1 class="page_header">Scripture Database Connect</h1>
        </header>
        
        <main>
        	<?php 
        		echo "<form action=\"connect_scripture_database.php\">
				  Book: <input type=\"text\" name=\"book\"><br>
				  Chapter: <input type=\"text\" name=\"chapter\"><br>
				  Verse: <input type=\"text\" name=\"verse\"><br>
				  Content: <textarea rows=\"4\" cols=\"50\"></textarea><br>";

				  foreach ($db->query('SELECT name FROM Topics') as $row)
				  {
					echo "<input type=\"checkbox\" name=\"" . $row . "\" value=\"" . $row . "\">" . $row;
				  }

				echo "<input type=\"submit\" value=\"Submit\">
				</form>";
        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="choose_album.php">Back to album selection</a>
        </footer>
    </body>
</html>