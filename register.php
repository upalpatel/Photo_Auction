<?php
    require('header.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <!--OurStyles-->
        <link rel="stylesheet" href="css/styles.css?1422585377" type="text/css">
        
    </head>

    <body>

        <!--Registration Form-->
        <div  class="container mx-auto" style="width: 600px;">
            <form action="registerHandler.php" method="post">
                <h1 class="h3 mb-3 font-weight-normal text-center">Registration Form</h1>
                <div class="input-group mb-2">
                    <label for="firstName" class="sr-only">First Name</label>
                        <input class="form-control" placeholder="First Name" id="firstName" type="text" name="first_name" required autofocus></input>
                    <label for="lastName" class="sr-only">Last Name</label>
                        <input class="form-control" placeholder="Last Name" id="lastName" type="text" name="last_name" required autofocus></input><br>
                </div>
                <div class="input-group mb-4">
                    <label for="streetAddress" class="sr-only">Street Address</label>
                        <input class="form-control" placeholder="Street Address" id="streetAddress" type="text" name="street_address" required autofocus></input>
                    <label for="city" class="sr-only">City</label>
                        <input class="form-control" placeholder="City" id="city" type="text" name="city" required autofocus></input>
                    <label for="state" class="sr-only">State</label>
                        <input class="form-control" placeholder="State" id="state" type="text" name="state" required autofocus></input>
                    <label for="zip" class="sr-only">Zip</label>
                        <input class="form-control" placeholder="zip" id="zip" type="text" name="zip" required autofocus></input><br>
                </div>
                <div class="input-group mb-3">
                    <label for="phoneNumber" class="sr-only">Phone Number</label>
                        <input class="form-control" placeholder="000-000-0000" id="phoneNumber" type="tel" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required></input>
                    <label for="email" class="sr-only">Email</label>
                        <input class="form-control" placeholder="Email" id="email" type="email" name="email" required></input>
                    <label for="password" class="sr-only">Password</label>
                        <input class="form-control" placeholder="Password" id="password" type="password" name="password" required></input>
                </div>
                <button class ="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
            </form>
        </div>
    </body>
</html>
<?php
    require('footer.php');
?>