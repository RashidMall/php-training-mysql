<?php
include './dbUser.php';

function isUserConnected(){
    return isset($_SESSION['username']) && isset($_SESSION['password']);
}

function checkUser(){
    global $connectionUser;
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = ORM::for_table('user')->where('username', $_POST['username'])->find_one();
        
        if ($user['username'] == $_POST['username'] && $user['password'] == $_POST['password']) {
            session_start ();

            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
    
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
