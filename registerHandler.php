<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Store variables to use in session
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

    //The function mysqli_real_escape_string adds an escape character, the backslash, \, 
    //before certain potentially dangerous characters in a string passed in to the function. 
    //The characters escaped are

    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $street_address = mysqli_real_escape_string($db, $_POST['street_address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $zip = mysqli_real_escape_string($db, $_POST['zip']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    //$password = mysqli_real_escape_string($db, $_POST['password']);

    //Generates Encryption
    $password = mysqli_real_escape_string($db, password_hash($_POST['password'], PASSWORD_BCRYPT));
    //$hash = mysqli_real_escape_string($db, md5(rand(0, 1000)));

    $result = mysqli_query($db, "SELECT * FROM member WHERE email='$email'") or die($mysqli->error());

    if ($result->num_rows > 0) {
        $_SESSION['message'] = 'This email is already taken!';
        echo "This email is already taken!";
        //header("location: error.php");
    } else {
        
        //values that will be added
        $sql = "INSERT INTO member(email, fname, lname, street , city , state, zip, phone, password)"
            . "VALUES ('$email','$first_name', '$last_name', '$street_address', '$city', '$state','$zip','$phone_number' ,'$password')";

        if (mysqli_query($db, $sql)) {
            echo "Account has been successfully created!!";

            //Fixing Errors Come here if error occurs again
            $password= (password_hash($_SESSION['password'], PASSWORD_BCRYPT));
            $sqlAddSession = mysqli_query($db, "SELECT * FROM member WHERE password='$password'") or die($mysqli->error());
            $sqlAddSession=$sqlAddSession->fetch_assoc();
            $_SESSION['login_user_ID']=$sqlAddSession['mid'];
            header("location: welcome.php"); //go to welcome.php
        } else {
            echo "Failure!";
        }
    }
}
?>