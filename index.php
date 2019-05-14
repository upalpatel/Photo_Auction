<?php
    require('header.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!--OurStyles-->
        <link rel="stylesheet" href="css/styles.css?1422585377"" type="text/css">
        
        <!--OurJavascript-->
        <script type="text/javascript" src="js/scripts.js"></script>

    </head>
    <body class="text-center vsc-initialized">

        <!--Sign in-->
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form action="indexHandler.php" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                        <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Email address" required autofocus><br>
                    <label for="inputPassword" class="sr-only">Password</label> 
                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password"><br>
                    <button class ="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>

        <!--Register-->
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form action="register.php" method="post">
                    <br><h3 class="h3 mb-3 font-weight-normal">No Account?</h1>
                    <button class="btn btn-sm btn-outline-light btn-block" type="submit" name="register">Register</button>
                </form>
            </div>
        </div>

    </body>
</html>
<?php
    require('footer.php');
?>