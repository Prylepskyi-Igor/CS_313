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

        if (isset($_GET['delete'])) {
            $stmt = $db->prepare('DELETE FROM photos WHERE P_ID = :P_ID');
            $stmt->bindValue(':P_ID', $_SESSION["P_ID"]);
            $stmt->execute();

            session_unset();
        }
    ?>
    <title>Album</title>
</head>
    <body>
        <header class="page_header">
        	<?php 
        		foreach ($db->query('SELECT album_name FROM albums WHERE A_ID = '. $_SESSION["A_ID"]) as $row)
				{
					echo "<h1 class=\"page_header\">" . $row['album_name'] . "</h1>";
				}
        	?>
        </header>
        
        <main>
        	<?php 
        		foreach ($db->query('SELECT album_note FROM albums WHERE A_ID = ' . $_SESSION["A_ID"]) as $row)
				{
					echo "<p class=\"page_header\">" . $row['album_note'] . "</p>";
				}

	        	foreach ($db->query('SELECT photo_path, photo_note, photo_name, P_ID FROM photos WHERE A_ID = ' . $_SESSION["A_ID"]) as $row)
				{
					$_SESSION["pic_note"] = $row['photo_note'];
					$_SESSION["pic_name"] = $row['photo_name'];
					$_SESSION["pic_path"] = $row['photo_path'];
                    $_SESSION["P_ID"] = $row['P_ID'];

					echo "<a href=\"display_photo.php\"><img class=\"photos\" href=\"" . $row['photo_path'] . "\" src=\"" . $row['photo_path'] . "\" width=\"400px\" length=\"300px\" /></a>";
				}

        	?>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="choose_album.php">Back to album selection</a>
        </footer>
    </body>
</html>