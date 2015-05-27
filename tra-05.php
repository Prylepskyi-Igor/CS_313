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
        	if (isset($_GET['book']) && isset($_GET['chapter']) && isset($_GET['verse']) && isset($_GET['content'])) {
        		$db->query('INSERT INTO Scriptures (book, chapter, verse, content)
                    VALUES (' . $_GET["book"] . ',' . $_GET["chapter"] . ',' . $_GET["verse"] . ',' . $_GET["content"] . ')');

        		echo "Scripture was added successfully!<br>";
            }
            else
            	echo "All fields are required!";

        		echo "<form action=\"tra-05.php\" method=\"get\">
				  Book: <input type=\"text\" name=\"book\"><br>
				  Chapter: <input type=\"text\" name=\"chapter\"><br>
				  Verse: <input type=\"text\" name=\"verse\"><br>
				  Content: <textarea rows=\"4\" cols=\"50\" name=\"content\"></textarea><br>";

				  foreach ($db->query('SELECT name FROM Topics') as $row)
				  {
					echo "<input type=\"checkbox\" name=\"" . $row['name'] . "\" value=\"" . $row['name'] . "\">" . $row['name'] . "<br>";
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