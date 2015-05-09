<?php
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //retreive data from form
    $answer = $_POST['_answer'];

    // Append a new person to the file
    $str = serialize(array("0", "1", "2"));

    // Write the contents back to the file
    file_put_contents('voting-results.txt', $str);

    // Open the file to get existing content
    $content = file_get_contents('voting-results.txt');
    $result = unserialize($content);

    echo "Result 1: ". $result[0]. "\nResult 2: ". $result[1]. "\nResult 3: ". $result[2]. "\n";
    
} else {
    header('Location: php-survey.php');
    exit;
}
