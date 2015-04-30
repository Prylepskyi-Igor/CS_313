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
                    var snowflakes = [];
                    var element;
                    var att;
                    var snow;
                    var numSnowflakes = 100;
                    // create snowflakes
                    for(var i = 0; i < numSnowflakes; i++){
                        snow = new snowflake();
                        snowflakes.push(snow);
                        snowflakes[i].createSnowflake(i);
                    }
                    // move snowflakes
                    setInterval(function(){
                        for(var i = 0; i < numSnowflakes; i++)
                            snowflakes[i].movePoint(i);
                    },1);
                                ">
        <header id="page_header">   
            <?php /*include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.html';*/  ?> 
            <h1>Header</h1>
        </header>
        
        <main>
        	<p>Body</p>
            <span id='snowflakeContainer'></span>
        </main>
        <footer id="page_footer">
            <p>Footer</p>
        </footer>
    </body>
</html>