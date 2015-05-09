<?php
function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data); //removes HTML and PHP tags from a string
    return $data;
}//end cleanData

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Append a new person to the file
    $str = serialize(array("0", "1", "2"));

    // Write the contents back to the file
    file_put_contents('voting-results.txt', $str);

    // Open the file to get existing content
    $content = file_get_contents('voting-results.txt');
    $result = unserialize($content);

    echo $_POST['_answer1']. ": ". $result[0]. "<br>". $_POST['_answer2']. ": ". $result[1]. "<br>". $_POST['_answer3']. ": ". $result[2]. "\n";
    
} else {
    header('Location: php-survey.php');
    exit;
}
