$(document).ready(function(){
    $("footer > a").hover(
        function(){
            $("footer > a").css("color", "green");
            },
        function(){
            $("footer > a").css("color", "black");
        }
    );
});