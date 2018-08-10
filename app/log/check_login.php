<?php
include './dbUser.php';

function isUserConnected(){
    return isset($_SESSION['username']) && isset($_SESSION['password']);
}

function checkUser(){
    global $connectionUser;
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Retrieve username and password from the database
        $query = "SELECT * FROM user WHERE username = $username AND password = ?";
        $result = $connectionUser->prepare($query);
        $result->execute(array(sha1($password)));

        if ($username == $_POST['username'] && $password == $_POST['password']) {
            session_start ();

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            echo 'yay';
    
            header('Location: ' . './read.php');
        }
        else {
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
            echo '<meta http-equiv="refresh" content="0;URL=./read.php">';
        }
    }
    else {
        echo 'Les variables du formulaire ne sont pas déclarées.';
    }
}

// Log out 
function logOutUser(){
    session_start ();

    session_unset ();

    session_destroy ();

    header('Location: ' . '../read.php');
}
?>
