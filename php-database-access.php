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
</head>
    <body>
        <header class="page_header">
            <h1 class="page_header">Scripture Resources</h1>
        </header>
        
        <main>
        	<?php 
	        	foreach ($db->query('SELECT photo_path FROM photos') as $row)
				{
					echo "<img src=\"" . $row['photo_path'] . "\" width=\"400px\" length=\"300px\" />";
				}

        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>