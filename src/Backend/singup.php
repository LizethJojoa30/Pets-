<?php
    include('../../config/database.php');

    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_pass = md5($password);

    $sql = "
        INSERT INTO users (fullname, email, password) 
            VALUES ('$fullname', '$email','$enc_pass')
    ";

    $ans = pg_query($conn,$sql);
    if ($ans){
        echo "User has been created successfully";
    }else{
        echo "Error: " . pg_last_error();
    }

    
?>