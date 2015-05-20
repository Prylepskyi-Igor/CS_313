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
	        	function displayScripture(value)
				{
				  echo "Book - " . value . "</br>";
				}

	        	foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row)
				{
					echo '<strong>';
				   echo $row['book'] . ' ';
				   echo $row['chapter'] . ':';
				   echo $row['verse'] . '. ';
				   echo '</strong>';
				   echo '"';
				   echo $row['content'];
				   echo '"';
				   echo '<br /><br />';
				}

				echo "<select onchange=\"displayScripture(this.value);\">";
				foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row)
				{
					echo "<option value=\"" . $row['book'] . "\">" . $row['book'] . "</option>";
				}
				echo "</select>";

        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>