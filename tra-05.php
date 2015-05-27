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
        	if (isset($_GET['book'])) {
        		$db->query('INSERT INTO Scriptures (book, chapter, verse, content)
                    VALUES (' . $_GET["book"] . ', ' . $_GET["chapter"] . ', ' . $_GET["verse"] . 
                    	', ' . $_GET["content"] . ');');

        		foreach ($db->query('SELECT name FROM Topics') as $row)
				{
        			if (isset($_GET[$row['name']])) {
        				$db->query('INSERT INTO scriptures_topics (scripture_id, topic_id)
                		    VALUES (' . $mysqli->insert_id . ', ' . $_GET[$row['name']] . ');');
        			}
        		}
        		
        		echo "Scripture was added successfully!<br>";
            }
            	

        		echo "<form action=\"tra-05.php\" method=\"get\">
				  Book: <input type=\"text\" name=\"book\" required><br>
				  Chapter: <input type=\"text\" name=\"chapter\" required><br>
				  Verse: <input type=\"text\" name=\"verse\" required><br>
				  Content: <textarea rows=\"4\" cols=\"50\" name=\"content\" required></textarea><br>";

				  foreach ($db->query('SELECT name FROM Topics') as $row)
				  {
					echo "<input type=\"checkbox\" name=\"" . $row['name'] . "\" value=\"" . 
					$row['name'] . "\">" . $row['name'] . "<br>";
				  }

				echo "<input type=\"submit\" value=\"Submit\">
				</form>";
        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">Back to assignments</a>
        </footer>
    </body>
</html>