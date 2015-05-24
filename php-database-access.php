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
    <title>Album</title>
</head>
    <body>
        <header class="page_header">
        	<?php 
        		foreach ($db->query('SELECT album_name FROM albums WHERE A_ID = 1') as $row)
				{
					echo "<h1 class=\"page_header\">" . $row['album_name'] . "</h1>";
				}
        	?>
        </header>
        
        <main>
        	<?php 
        		foreach ($db->query('SELECT album_note FROM albums WHERE A_ID = 1') as $row)
				{
					echo "<p class=\"page_header\">" . $row['album_note'] . "</p>";
				}

	        	foreach ($db->query('SELECT photo_path, photo_note, photo_name FROM photos') as $row)
				{
					$_SESSION["pic_note"] = $row['photo_note'];
					$_SESSION["pic_name"] = $row['photo_name'];
					$_SESSION["pic_path"] = $row['photo_path'];

					echo "<a href=\"display_photo.php\"><img class=\"photos\" href=\"" . $row['photo_path'] . "\" src=\"" . $row['photo_path'] . "\" width=\"400px\" length=\"300px\" /></a>";
				}

        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>