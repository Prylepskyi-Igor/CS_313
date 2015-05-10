<?php
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Open the file to get existing content
    $content = file_get_contents('voting-results.txt');
    $result = unserialize($content);
    echo "check 1<br>";
    // Append a new person to the file
    $str = serialize(array(0, 0, 0));
    echo "check 2<br>";    
    $getChoice = $_POST['_answer'];
    echo "check 3<br>";
    if($getChoice === "0")
    {
        result[0]++;
    }
    elseif($getChoice === "1")
    {
        result[1]++;        
    }
    elseif($getChoice === "2")
    {
        result[2]++;        
    }
    else
        result[0] = 99;

    echo "Result 1: ". $result[0]. "<br>Result 2: ". $result[1]. "<br>Result 3: ". $result[2]. "\n";

    // Write the contents back to the file
    file_put_contents('voting-results.txt', $str);
    
} else {
    header('Location: php-survey.php');
    exit;
}
