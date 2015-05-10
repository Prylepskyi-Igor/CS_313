<?php
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_SESSION["stop"] = "true";

    $result = array(array(0,0,0,0), array(0,0,0,0), array(0,0,0,0), array(0,0,0,0));

    file_put_contents('voting-results.php', serialize($result));

    // Open the file to get existing content
    $content = file_get_contents('voting-results.php');
    $result = unserialize($content);
   
    $getChoice1 = $_POST['_answer1'];
    $getChoice2 = $_POST['_answer2'];
    $getChoice3 = $_POST['_answer3'];
    $getChoice4 = $_POST['_answer4'];

    if($getChoice1 === "0")
    {
        $result[0][0]++;
    }
    elseif($getChoice1 === "1")
    {
        $result[0][1]++;        
    }
    elseif($getChoice1 === "2")
    {
        $result[0][2]++;        
    }
    elseif($getChoice1 === "3")
    {
        $result[0][3]++;        
    }
    else
        echo "Error!<br>";

    if($getChoice2 === "0")
    {
        $result[1][0]++;
    }
    elseif($getChoice2 === "1")
    {
        $result[1][1]++;        
    }
    elseif($getChoice2 === "2")
    {
        $result[1][2]++;        
    }
    elseif($getChoice2 === "3")
    {
        $result[1][3]++;        
    }
    else
        echo "Error!<br>";

    if($getChoice3 === "0")
    {
        $result[2][0]++;
    }
    elseif($getChoice3 === "1")
    {
        $result[2][1]++;        
    }
    elseif($getChoice3 === "2")
    {
        $result[2][2]++;        
    }
    elseif($getChoice3 === "3")
    {
        $result[2][3]++;        
    }
    else
        echo "Error!<br>";

    if($getChoice4 === "0")
    {
        $result[3][0]++;
    }
    elseif($getChoice4 === "1")
    {
        $result[3][1]++;        
    }
    elseif($getChoice4 === "2")
    {
        $result[3][2]++;        
    }
    elseif($getChoice4 === "3")
    {
        $result[3][3]++;        
    }
    else
        echo "Error!<br>";

    echo "Hours spent for school.<br> 0-4: ". $result[0][0]. "<br>4-8: ". $result[0][1]. "<br>8-12: ". $result[0][2]. "<br>12+:  ". $result[0][3]. "\n";
    echo "<br><br>Number of classes taking.<br> 1:  ". $result[1][0]. "<br>2:  ". $result[1][1]. "<br>3:  ". $result[1][2]. "<br>4+: ". $result[1][3]. "\n";
    echo "<br><br>Computer Science major.<br> yes: ". $result[2][0]. "<br> no:  ". $result[2][1]. "\n";
    echo "<br><br>Would like to change their major to Software Engineering.<br> yes: ". $result[3][0]. "<br> no:  ". $result[3][1]. "\n";

    // Write the contents back to the file
    file_put_contents('voting-results.php', serialize($result));
    
} else {
    $result = array(array(0,0,0,0), array(0,0,0,0), array(0,0,0,0), array(0,0,0,0));

    // Open the file to get existing content
    $content = file_get_contents('voting-results.php');
    $result = unserialize($content);

    echo "Hours spent for school.<br> 0-4: ". $result[0][0]. "<br>4-8: ". $result[0][1]. "<br>8-12: ". $result[0][2]. "<br>12+:  ". $result[0][3]. "\n";
    echo "<br><br>Number of classes taking.<br> 1:  ". $result[1][0]. "<br>2:  ". $result[1][1]. "<br>3:  ". $result[1][2]. "<br>4+: ". $result[1][3]. "\n";
    echo "<br><br>Computer Science major.<br> yes: ". $result[2][0]. "<br> no:  ". $result[2][1]. "\n";
    echo "<br><br>Would like to change their major to Software Engineering.<br> yes: ". $result[3][0]. "<br> no:  ". $result[3][1]. "\n";

    // Write the contents back to the file
    file_put_contents('voting-results.php', serialize($result));
}

echo "<footer class=\"page_footer\">
            <a class=\"page_footer\" href=\"http://php-megiddo.rhcloud.com/php-survey.php\">Back to assignments page</a>
        </footer>";
