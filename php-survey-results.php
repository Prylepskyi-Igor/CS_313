<?php
session_start();

function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION["redirect"] = "true";

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

    echo "VOTE RESULTS<br><br>";
    echo "Hours spent for school.<br> Number of students answered 0-4 is ". $result[0][0]. "<br>Number of students answered 4-8 is ". $result[0][1]. "<br>Number of students answered 8-12 is ". $result[0][2]. "<br>Number of students answered 12+ is ". $result[0][3]. "\n";
    echo "<br><br>Number of classes taking.<br> Number of students answered 1 is  ". $result[1][0]. "<br>Number of students answered 2 is ". $result[1][1]. "<br>Number of students answered 3 is ". $result[1][2]. "<br>Number of students answered 4+ is ". $result[1][3]. "\n";
    echo "<br><br>Computer Science major.<br> Number of students answered yes is ". $result[2][0]. "<br> Number of students answered no is ". $result[2][1]. "\n";
    echo "<br><br>Would like to change your major to Software Engineering.<br> Number of students answered yes is ". $result[3][0]. "<br> Number of students answered no is  ". $result[3][1]. "<br><br>";

    // Write the contents back to the file
    file_put_contents('voting-results.php', serialize($result));
    
} else {
    $result = array(array(0,0,0,0), array(0,0,0,0), array(0,0,0,0), array(0,0,0,0));

    // Open the file to get existing content
    $content = file_get_contents('voting-results.php');
    $result = unserialize($content);

    echo "VOTE RESULTS<br><br>";
    echo "Hours spent for school.<br> Number of students answered 0-4 is ". $result[0][0]. "<br>Number of students answered 4-8 is ". $result[0][1]. "<br>Number of students answered 8-12 is ". $result[0][2]. "<br>Number of students answered 12+ is ". $result[0][3]. "\n";
    echo "<br><br>Number of classes taking.<br> Number of students answered 1 is  ". $result[1][0]. "<br>Number of students answered 2 is ". $result[1][1]. "<br>Number of students answered 3 is ". $result[1][2]. "<br>Number of students answered 4+ is ". $result[1][3]. "\n";
    echo "<br><br>Computer Science major.<br> Number of students answered yes is ". $result[2][0]. "<br> Number of students answered no is ". $result[2][1]. "\n";
    echo "<br><br>Would like to change your major to Software Engineering.<br> Number of students answered yes is ". $result[3][0]. "<br> Number of students answered no is  ". $result[3][1]. "<br><br>";

    // Write the contents back to the file
    file_put_contents('voting-results.php', serialize($result));
}

echo "<a class=\"page_footer\" href=\"assignments.php\">Back to assignments page</a>";
