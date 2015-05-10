<?php
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $result1 = array(0, 0, 0);

    file_put_contents('\voting-results.txt', serialize($result1));

    // Open the file to get existing content
    $content = file_get_contents('\voting-results.txt');
    $result = unserialize($content);
   
    $getChoice = $_POST['_answer'];

    if($getChoice === "0")
    {
        $result[0]++;
    }
    elseif($getChoice === "1")
    {
        $result[1]++;        
    }
    elseif($getChoice === "2")
    {
        $result[2]++;        
    }
    else
        echo "Error!<br>";

    echo "Result 1: ". $result[0]. "<br>Result 2: ". $result[1]. "<br>Result 3: ". $result[2]. "\n";

    // Write the contents back to the file
    file_put_contents('\voting-results.txt', serialize($result));
    
} else {
    header('Location: php-survey.php');
    exit;
}
