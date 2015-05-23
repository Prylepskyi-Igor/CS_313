<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" 
              media="screen">
    <?php 
	    require("dbConnector.php");

		$db = loadDatabase();
    ?>
    <title>Scripture Resources</title>
    <script>
        $(document).ready(function(){
            $("footer > a").hover(function(){
                $("footer > a").css("color", "green");
                },function(){
                $("footer > a").css("color", "black");
            });
        });
    </script>
</head>
    <body>
        <header class="page_header">
        	<?php 
	        	$db->query('SELECT album_name FROM album WHERE album_name = "Yellowstone"');
				echo "<h1 class=\"page_header\">". $db['album_name'] . "</h1>";
        	?>
        </header>
        
        <main>
        	<?php 
        		$db->query('SELECT album_note FROM album WHERE album_name = "Yellowstone"');
				echo "<p>" . $db['album_note'] . "</p>";

	        	foreach ($db->query('SELECT photo_path FROM photos') as $row)
				{
					echo "<img class=\"photos\" src=\"" . $row['photo_path'] . "\" width=\"400px\" length=\"300px\" />";
				}

        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>