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
    $name = cleanData($_POST['_name']);
    $email = cleanData($_POST['_email']);
    $major = $_POST['_major'];
    $places = $_POST['_places'];
    $comments = cleanData($_POST['_comments']);

    
} else {
    header('Location: php-survey.php');
    exit;
}
