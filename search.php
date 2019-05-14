<?php
    require('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!--OurStyles-->
    <link rel="stylesheet" href="css/styles.css?1422585377" type="text/css">

    <!--OurJavascript-->
    <script type="text/javascript" src="js/scripts.js"></script>
    
</head>
<?php
include("config.php");

//get search keyword
if (isset($_GET["returnBread"])) {
    $search = $_GET["returnBread"];
}else{
    $search = mysqli_real_escape_string($db, $_POST['search']);
}
$search_Refined = "%" . $search . "%"; //apenned search condition for keyword search



//Search for keyword in title by category
if(isset($_POST['categories'])){

    if($_POST['categories'] == 'All Categories'){
        $result = mysqli_query($db, "SELECT * FROM item WHERE title LIKE '$search_Refined'") or die($mysqli->error());
    }
    else{
        $category=$_POST['categories'];
        $result = mysqli_query($db, "SELECT * FROM item WHERE category = '$category' AND title LIKE '$search_Refined'") or die($mysqli->error());
    }
}
else{
    $result = mysqli_query($db, "SELECT * FROM item WHERE title LIKE '$search_Refined'") or die($mysqli->error());
}
?>
<body>
    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class='breadcrumb-item enabled' aria-current="page"><a href="logout.php">Logout</a></li>
            <li class="breadcrumb-item active"><a href="welcome.php">Search</a></li>
            <li class="breadcrumb-item disabled" aria-current="page"><?php echo $search ?></li>
        </ol>
    </nav>

  
<?php 

    if ($result->num_rows > 0) {

        //Item list
        echo "<div class=\"container\">
        <br><h1 class=\"h3 mb-3 font-weight-bold text-center\">List of Items</h1>

        <table class=\"table table-hover table-striped table-bordered\">
            <thead class=\"thead-dark\">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Open-Date-Time</th>
                    <th>SellerID</th>
                    <th>Starting Bid</th>
                    <th>Bid Increment</th>
                    <th>Close-Date-Time</th>
                    <th>WinnerID</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            $getRowInfo = $row['ino']; //Changed to ino already, if bug its gonna be here
            echo "<form action='details.php' method='post'>
                    <tr>
                        <td>"  . $row['title']         . "</td>" .
                        "<td>" . $row['category']      . "</td>" .
                        "<td>" . $row['description']   . "</td>" .
                        "<td>" . $row['openDateTime']  . "</td>" .
                        "<td>" . $row['sellerId']      . "</td>" .
                        "<td>" . $row['startingBid']   . "</td>" .
                        "<td>" . $row['bidIncrement']  . "</td>" .
                        "<td>" . $row['closeDateTime'] . "</td>" .
                        "<td>" . $row['winnerId']      . "</td>" .
                        "<td>" . "<button type='sumbit' class ='btn btn-secondary' name='data' value='$getRowInfo'>Details</button>" . 
                    "</tr>".
                    "<input type='hidden' name='breadCrumb' value='$search'></input>" .
                "</form>";
        }
    } else {
        echo "<div class='container text-center'>
                <h1 class=\"h3 mb-3 font-weight-normal\">No Results Found!</h1>";
    }
?>
                </tbody>
            </table>
        </div>

</body>
</html>
<?php
    require('footer.php');
?>