<?php
    include('../../config/database.php');

    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_pass = md5($password);

    $sql_validate_email = "SELECT * FROM users WHERE email ='$email'";
    $result = pg_query($conn, $sql_validate_email);
    $total= pg_num_rows($result);

    if($total>0){
        echo "<script>alert('Email has been registered')</script>";
        header("refresh:0; url=../Home.php");
    }else{
    $sql = "
        INSERT INTO users (fullname, email, password) 
            VALUES ('$fullname', '$email','$enc_pass')
    ";

    $ans = pg_query($conn,$sql);
    if ($ans){
        echo "<script>alert('User has been registered')</script>";
        header("refresh:0; url=../Home.php");
    }else{
       
        echo "Error: " . pg_last_error();
    }
    }
pg_close($conn)
?>