<?php
include 'db.php';

// Create new row
function createRow(){
    if(isset($_POST['submit'])){
        global $connection;
        /* $name = mysqli_real_escape_string($connection, $_POST['name']);
        $difficulty = mysqli_real_escape_string($connection, $_POST['difficulty']);
        $distance = mysqli_real_escape_string($connection, $_POST['distance']);
        $time = mysqli_real_escape_string($connection, $_POST['duration']);
        $h_diff = mysqli_real_escape_string($connection, $_POST['height_difference']);

        $query = "INSERT INTO hiking(name, difficulty, distance, duration, height_difference) ";
        $query .= "VALUES ('$name', '$difficulty', '$distance', '$time', '$h_diff')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Query FAILED' . mysqli_error());
        }else{
            echo "La randonnée a été ajoutée avec succès.";
        } */

        try{
            $name = $_POST['name'];
            $difficulty = $_POST['difficulty'];
            $distance = $_POST['distance'];
            $time = $_POST['duration'];
            $h_diff = $_POST['height_difference'];

            $query = "INSERT INTO hiking(name, difficulty, distance, duration, height_difference) ";
            $query .= "VALUES (:name, :difficulty, :distance, :time, :h_diff)";

            $result = $connection->prepare($query);
            $result->execute(array(':name' => $name, ':difficulty' => $difficulty, ':distance' => $distance, ':time' => $time, ':h_diff' => $h_diff));

            if(!$result){
                die('Query FAILED');
            }else{
                echo "La randonnée a été ajoutée avec succès.";
            }
        }catch(PDOException $e){
            print "Erreur!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

// Read rows from the database
function readRows(){
    global $connection;
    
    // MySQL version
    /* $query = "SELECT * FROM hiking";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $difficulty = $row['difficulty'];
        $distance = $row['distance'];
        $time = $row['duration'];
        $h_diff = $row['height_difference'];

        echo "<tr>";
        echo "<th scope='row'>$id</th>";
        echo "<td>$name</td>";
        echo "<td>$difficulty</td>";
        echo "<td>$distance km</td>";
        echo "<td>$time</td>";
        echo "<td>$h_diff m</td>";        
        echo "</tr>";
    } */

    // PDO version
    try{
        $query = "SELECT * FROM hiking";
        foreach($connection->query($query) as $row){
            $id = $row['id'];
            $name = $row['name'];
            $difficulty = $row['difficulty'];
            $distance = $row['distance'];
            $time = $row['duration'];
            $h_diff = $row['height_difference'];

            echo "<tr>";
            echo "<th scope='row'>$id</th>";
            // Put hyperlink on names for connected users only
            if(isUserConnected()){
                // String of variables to pass to the next page
                $vars_to_pass = "id=$id&name=$name&difficulty=$difficulty&distance=$distance&duration=$time&height_difference=$h_diff";
                echo "<td><a href='./update.php?$vars_to_pass'>$name</a></td>";
            }else{
                echo "<td>$name</td>";
            }
            echo "<td>$difficulty</td>";
            echo "<td>$distance km</td>";
            echo "<td>$time</td>";
            echo "<td>$h_diff m</td>";
            // Show delete button for connected users only
            if(isUserConnected()){
                echo "<td><a href='./delete.php?id=$id' class='btn btn-danger'>Supprimer</a></td>";
            }
            echo "</tr>";
        }
    }catch(PDOException $e){
        print "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }
}

// Update a row in the database
function updateRow(){
    global $connection;
    if(isset($_POST['submit'])){
        global $connection;

        try{
            $id = $_POST['id'];
            $name = $_POST['name'];
            $difficulty = $_POST['difficulty'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];
            $h_diff = $_POST['height_difference'];

            $query = "UPDATE hiking SET ";
            $query .= "name = :name, ";
            $query .= "difficulty = :difficulty, ";
            $query .= "distance = :distance, ";
            $query .= "duration = :duration, ";
            $query .= "height_difference = :h_diff ";
            $query .= "WHERE id = :id";

            $result = $connection->prepare($query);
            $result->execute(array(':name' => $name, ':difficulty' => $difficulty, ':distance' => $distance, ':duration' => $duration, ':h_diff' => $h_diff, ':id' => $id));

            if(!$result){
                die('Query FAILED');
            }else{
                echo "La randonnée n°$id a été modifiée avec succès.";
                header('Location: '.'./read.php');
            }
        }catch(PDOException $e){
            print "Erreur!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

// Delete row from the database
function deleteRow(){
    global $connection;
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM hiking ";
        $query .= "WHERE id = ?";

        $result = $connection->prepare($query);
        $result->execute(array($id));
        header('Location: '.'./read.php');
    }
}

// Print select options
function showUpdateOptions(){
    $arr = ['très facile', 'facile', 'moyen', 'difficile', 'très difficile'];
    $difficulty = $_GET['difficulty'];

    for($i = 0; $i < sizeof($arr); $i++){
        echo "<option value=\"" . $arr[$i] . "\"" . ($arr[$i] === $difficulty ? 'selected' : '') .">" . ucfirst($arr[$i]) ."</option>";
    }
}

function showIfSet($v){
    if(isset($_GET[$v])){
        echo $_GET[$v];
    }
}

function showLogInOrOutButton(){
    if(isUserConnected()){
        echo "<a class='nav-item nav-link' href='./log/logout.php'>Logout</a>";
    }else{
        echo "<a class='nav-item nav-link' href='./login.php'>Login</a>";
    }
}
?>