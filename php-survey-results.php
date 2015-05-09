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

    $myfile = fopen("voting-results.txt", "w") or die("Unable to open file!");
    $txt = fread($myfile,filesize("voting-results.txt"));
    eval('$test = 0;');
    $test++;
    fwrite($myfile, (string)$test);
    fclose($myfile);
    
} else {
    header('Location: php-survey.php');
    exit;
}
