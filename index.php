<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" 
              media="screen">
              <script>
	$(document).ready(function(){
	    $("footer").hover(function(){
	        $("footer").css("font-size", "30px");
	        },function(){
	        $("footer").css("font-size", "50px");
	    });
	});
</script>
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
            <a class="page_footer" href="assignments.php">To assignments page</a>
        </footer>
    </body>
</html>