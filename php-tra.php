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
    <title>Intro</title>
</head>
    <body>
        <header class="page_header">
            <h1 class="page_header">PHP Database</h1>
        </header>
        
        <main>
        	<?php 
        	<select name="TofD" size="3">
			<option value="Morning">Morning</option>
			<option value="Day">Day</option>
			<option value="Night">Night</option></select><br />

        	foreach ($db->query('SELECT book FROM Scripture') as $row)
			{
			   echo 'Scripture: ' . $row['book'];
			   echo '<br />';
			}
        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>