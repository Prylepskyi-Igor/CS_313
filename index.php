<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script>
    	function changeFont(x) {
    		x.style.changeFont = "50px";
    	}
    </script>
    <link rel="stylesheet" type="text/css" href="style.css" 
              media="screen">
    <title>Intro</title>
</head>
    <body>
        <header class="page_header">
            <h1 class="page_header">Introduction</h1>
        </header>
        
        <main>
        	<img id="mypic" src="my-picture.jpg">
        	<p>My name is Igor. I'm from Ukraine. I'm Senior in Software Engineering.</p>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php" onmouseover="changeFont(this);">To assignments page</a>
        </footer>
    </body>
</html>