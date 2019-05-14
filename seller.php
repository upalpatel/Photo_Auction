<!DOCTYPE html>
<html lang="en">
<head>
    <title>Seller</title>
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
<?php
    require('header.php');
?>
<?php

include('config.php');


if (isset($_GET["sellerInfo"])) {
    //Obtaining Seller ID from details.php
    $sellerInfo = $_GET["sellerInfo"];
    
    $sql = "SELECT * FROM member WHERE mid = '$sellerInfo'";
    $sellerInfo= mysqli_query($db, $sql);
    $sellerInfo=$sellerInfo->fetch_assoc();

    //Get user accessing Page Info
    $currentUserID= $_SESSION['login_user_ID'];

    //Get Item Info
    $sellerReviewInfo=$_GET["ItemID"];
    $sql = "SELECT * FROM rating WHERE ino = '$sellerReviewInfo'";
    $sellerReviewInfo = mysqli_query($db, $sql);

    //For Get and breadCrumb
    $itemID=$_GET["ItemID"];

    //ReturnId
    $returnId=$_GET['ItemID'];
    //BreadCrumb Info
    $previousBreadCrumb1=$_GET["previousBreadCrumb1"];
    $previousBreadCrumb2=$_GET["previousBreadCrumb2"];
    $currentBreadCrumb = $sellerInfo['fname'] . " ". $sellerInfo['lname'];

}
elseif(isset($_GET["reply"])){
    //Get Item Info
    $sellerReviewInfo = $_GET['itemIdGet'];
    $sql = "SELECT * FROM rating WHERE ino = '$sellerReviewInfo'";

    //Update Comment With User Reply
    $itemDetails = mysqli_query($db, $sql);
    $itemDetails = $itemDetails->fetch_assoc();
    $itemReviewing = $itemDetails['ino'];
    $ratingNum = $_GET['ratingNum'];

    $reply = $_GET['sellerReply'];
    mysqli_query($db, "UPDATE rating SET sellerRating = '$ratingNum', sellerComment = '$reply' WHERE ino = '$itemReviewing' ") or die($mysqli->error());

    //get SellerId
    $sellerInfo = $_GET["sellerIdGet"];

    $sql2 = "SELECT * FROM member WHERE mid = '$sellerInfo'";
    $sellerInfo = mysqli_query($db, $sql2);
    $sellerInfo = $sellerInfo->fetch_assoc();

    //Get user accessing Page Info
    $currentUserID = $_SESSION['login_user_ID'];
    
    //For Get & breadcrumb
    $itemID = $_GET["itemIdGet"];

    //Get item Info Part 2 (fixes double comment)
    $sellerReviewInfo = mysqli_query($db, $sql);

    //BreadCrumb Info
    $previousBreadCrumb1 = $_GET["previousBreadCrumb1"];
    $previousBreadCrumb2 = $_GET["previousBreadCrumb2"];
    $currentBreadCrumb = $sellerInfo['fname'] . " " . $sellerInfo['lname'];

  
}

?>

<body>

    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class='breadcrumb-item enabled' aria-current="page"><a href="logout.php">Logout</a></li>
            <li class="breadcrumb-item active"><a href="welcome.php">Search</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="search.php?returnBread=<?php echo urlencode($previousBreadCrumb1) ?>"><?php echo $previousBreadCrumb1 ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="details.php?returnBread=<?php echo urlencode($previousBreadCrumb2) ?>&returnedItemID=<?php echo $itemID ?>"><?php echo $previousBreadCrumb2 ?></a></li>
            <li class="breadcrumb-item disabled" aria-current="page"><?php echo $currentBreadCrumb ?></li>
        </ol>
    </nav>

    <div class="container-fluid w-75 h-100 bg-dark text-white">
        <h1 class="cover-heading text-center">Seller Profile</h1>
        <h3 class="cover-heading text-center">Name: <?php echo $sellerInfo['fname'] . " " . $sellerInfo['lname'] ?> </h3>
        
        <div class="container">
            <br><h1 class="h3 mb-3 font-weight-bold text-center">Sellers Feedback</h1>

            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Buyer Rating</th>
                        <th>Buyer Comment</th>
                        <th>Seller Rating</th>
                        <th>Seller Comment</th>
                        <?php if($currentUserID==$sellerInfo['mid']){
                        echo "<th></th>";
                        }?>
                    </tr>
                </thead>
            
                <?php 
                    if ($sellerReviewInfo->num_rows > 0) {
                        while ($row = $sellerReviewInfo->fetch_assoc()){
                        echo "<form action ='' method = 'get'>" . "<tr>" .
                                    "<td>"  . $row['buyerRating']  . "</td>" .
                                    "<td>" . $row['buyerComment'] . "</td>";
                    
                                    //If User accessing their own profile
                                    if ($currentUserID == $sellerInfo['mid'] && $row['sellerRating']==null && $row['sellerComment']==""){
                                    //Rating
                                    echo "<td>" ."<div class='input-group'>
                                                <select aria-label='Select a category for search' size='1' id='gh-cat' name='ratingNum'>  
                                                        <option value='1'>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        <option value='4'>4</option>
                                                        <option value='5'>5</option>
                                                </select>
                                            </div>". "</td>";
                                    echo "<td>" . "<input type='text' name='sellerReply'>" . "</td>";
                                    echo "<td>" . "<button type='sumbit' class ='btn btn-success' name='reply'>Reply</button>";
                                    //HIDDEN VALUES
                                    //seller ID
                                    echo "<input type='hidden' name='sellerIdGet' value=" . $sellerInfo['mid']. "></input>";
                                    //Item ID
                                    echo "<input type='hidden' name='itemIdGet' value=" . $itemID . "></input>";
                                    //BreadCrumbs
                                    echo "<input type='hidden' name='previousBreadCrumb1' value=" . urlencode($previousBreadCrumb1) . "></input>";
                                    echo "<input type='hidden' name='previousBreadCrumb2' value=" . urlencode($previousBreadCrumb2) . "></input>";
                                
                                    }
                                    else{
                                    //If seller not accessing page
                                    echo "<td>" . $row['sellerRating'] . "</td>" .
                                    "<td>" . $row['sellerComment'] . "</td>";
                                    
                                    }
                            echo "</tr>" . "</form>" ;
                        }  

                    }
                ?>
            </table>
        </div>
    </div>

</body>
</html>
<!--Rating -->
<!--Footer-->
<?php
    require('footer.php');
?>