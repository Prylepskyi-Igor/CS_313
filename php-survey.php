<?php 
    if($_SESSION["running"] == true)
    {
        header("Location: http://php-megiddo.rhcloud.com/php-survey-results.php"); /* Redirect browser */
        exit();
    }

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();

        $_SESSION["stop"] = false;
    }
    
    ?>

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
                    <legend class="scheduler-border">How many hours per week do you spen for CS 313? </legend>
                    <div class="checkbox">
                        <label><input type="radio" name="_answer1" value="0" required> 0-4</label>
                        <label><input type="radio" name="_answer1" value="1" required> 4-8</label>
                        <label><input type="radio" name="_answer1" value="2" required> 8-12</label>
                        <label><input type="radio" name="_answer1" value="3" required> 12+</label>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">How many classes are you taking? </legend>
                    <div class="checkbox">
                        <label><input type="radio" name="_answer2" value="0" required> 1</label>
                        <label><input type="radio" name="_answer2" value="1" required> 2</label>
                        <label><input type="radio" name="_answer2" value="2" required> 3</label>
                        <label><input type="radio" name="_answer2" value="3" required> 4+</label>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Are you Computer Science major? </legend>
                    <div class="checkbox">
                        <label><input type="radio" name="_answer3" value="0" required> yes</label>
                        <label><input type="radio" name="_answer3" value="1" required> no</label>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Would you like to switch to Software Engineering? </legend>
                    <div class="checkbox">
                        <label><input type="radio" name="_answer4" value="0" required> yes</label>
                        <label><input type="radio" name="_answer4" value="1" required> no</label>
                    </div>
                </fieldset>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="http://php-megiddo.rhcloud.com/php-survey-results.php">Results</a>
            </form>
        </main>

        <footer class="page_footer">
            <a class="page_footer" href="assignments.php">Back to assignments page</a>
        </footer>
    </body>
</html>