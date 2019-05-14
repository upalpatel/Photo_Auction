<?php
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$hash = password_hash($password, PASSWORD_DEFAULT);

//fetch matching row in member with email
$result = mysqli_query($db, "SELECT * FROM member WHERE email='$email'");

//check if result returned nothing
if($result->num_rows==0){
    $_SESSION['message']= "Email does not exist!";
    echo "Email does not exist!";
}
else{
    //fetch data in row and store in user
    $user = $result->fetch_assoc();
 
    //if($user['password']==$password){
    if(password_verify($password, $hash)){

        $_SESSION['login_user']=$user['fname']; //login user set to first name of user
        $_SESSION['login_user_ID']=$user['mid'];//Obtain user ID
        
        header("location: welcome.php"); //go to welcome.php
        exit();
    }
}
?>