<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" 
              media="screen">
    <title>Assignments</title>
    <script>
        $(document).ready(function(){
            $("footer > a").hover(function(){
                $("a").css("color", "green");
                },function(){
                $("a").css("color", "black");
            });
        });
    </script>
</head>
    <body>
        <header class="page_header">
            <h1 class="page_header">Web Engineering II Assignments</h1>
        </header>
        
        <main>
        	<table id="assignments">
                <td>
                    <a href="assignment1.php">Assignment 1</a>
                </td>
            </table>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="index.php">Back to introduction page</a>
        </footer>
    </body>
</html>