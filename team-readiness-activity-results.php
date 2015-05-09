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

    echo "User's name: ".$name.".<br>";
    echo "Email Address: <a href='mailto:$email'>".$email."</a>.<br>";
    echo "BYUI Major: ".$major.".<br>";
    echo "Visited Places :";
    if (empty($places)) {
        echo("You have not traveled a lot to say.<br>");
    } else {
        $N = count($places);
        echo "<ul>";
        for ($i = 0; $i < $N; $i++) {
            echo "<li>$places[$i]</li>";
        }
        echo "</ul>";
    }
    echo "Comments: ";
    if (empty($comments)) {
        echo ("You have no too much to say.");
    } else {
        echo $comments;
    }
} else {
    header('Location: Assigments.html');
    exit;
}
