<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Igor Prylepskyi">
    <script src="C:\Users\Megiddo\php\snowflake.js"></script>
    <title>Project</title>
</head>
    <body onload="
    				alert('Start!');
                    var snowflakes = [];
                    var element;
                    var att;
                    var snow;
                    var numSnowflakes = 400;
                    // create snowflakes
                    for(var i = 0; i < numSnowflakes; i++){
                    alert('Start!');

                        snow = new snowflake();
                        snowflakes.push(snow);
                        snowflakes[i].createSnowflake(i);}
                    // move snowflakes
                    setInterval(function(){
                        for(var i = 0; i < numSnowflakes; i++)
                            snowflakes[i].movePoint(i);
                    },1);
                                ">
        <header id="page_header">   
            <?php /*include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.html';*/  ?> 
            <h1></h1>
        </header>
        
        <main>
                <img src="C:\Users\Megiddo\php\snowflake.png">
            <span id='snowflakeContainer'></span>
        </main>
        <footer id="page_footer">
            
        </footer>
    </body>
</html>