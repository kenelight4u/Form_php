<?php
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    if(!empty($first_name)){
        if (!empty($last_name)) {
            if (!empty($password)) {
               
                $host = "e11wl4mksauxgu1w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
                $dbusername = "a8nlf26bm5nqydgq";
                $dbpassword = "k1h00l35rb8mlcwf";
                $dbname = "youtube";

                // Create Connection
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                if (mysqli_connect_error()) {
                    die('Connect Error ('.mysqli_connect_errno() .') '
                        . mysqli_connect_error());
                }else {
                    $sql = "INSERT INTO form ( first_name, last_name, email, password)
                    values ('$first_name', '$last_name', '$email', '$password' )";

                    if ($conn->query($sql)) {
                        echo "New record is inserted successfully";
                    }
                    else {
                        echo "Error: " . $sql ."<br>".$conn->error;
                    }
                    $conn->close();
                }
                

            }else {
                echo "Password should not be empty";
                die();
            }
        }else{
            echo "Last Name should not be empty";
            die();
        }
    }else{
        echo "First Name should not be empty";
        die();
    }

?>
