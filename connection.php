<?php 
    $conn = mysqli_connect("localhost", "root", "", "userdata");
    if(!$conn){
        die("Error: Failed to connect to database!");
    }

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        echo json_encode("Error");
    }else{
        $insert = "INSERT INTO user (username, password, confirm_password) VALUES ('".$username."', '".$password."', '".$confirmpassword."')";
        $query = mysqli_query($conn, $insert);
        if($query){
            echo json_encode("Success");
        }else{
            echo json_encode("Error");
        }
    }
?>