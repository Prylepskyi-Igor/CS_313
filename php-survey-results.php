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

    // Open the file to get existing content
    $current = file_get_contents('voting-results.txt');
    // Append a new person to the file
    $current = "0";
    // Write the contents back to the file
    file_put_contents('voting-results.txt', $current);

    echo $current;
    
} else {
    header('Location: php-survey.php');
    exit;
}
