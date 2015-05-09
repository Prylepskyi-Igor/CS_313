<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>Assignments</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">

    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }
        
        legend.scheduler-border {
            width: inherit;
            /* Or auto */
            
            padding: 0 10px;
            /* To give a bit of padding on the left and right */
            
            border-bottom: none;
        }
    </style>

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
            <h1 class="page_header">PHP Survey</h1>
        </header>
        
        <main class="container">
            <form class="form-horizontal" action="php-survey-results.php" method="POST" role="form">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Question: </legend>
                    <div class="checkbox">
                        <label><input type="radio" name="_answer1" value="Answer1" required> Answer1</label>
                        <label><input type="radio" name="_answer2" value="Answer2" required> Answer2</label>
                        <label><input type="radio" name="_answer3" value="Answer3" required> Answer3</label>
                    </div>
                </fieldset>
                
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">Back to assignments page</a>
        </footer>
    </body>
</html>