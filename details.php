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
    require('header.php');
?>
<?php
include('config.php');

//GET CHECKER FOR BID
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //From Posting Comment
    if (isset($_GET['getSellerInfo'])) {
        
        $data= mysqli_real_escape_string($db, $_GET['getSellerInfo']);
        $prevBreadCrumb = mysqli_real_escape_string($db, $_GET['getPrevCrumbInfo']);
    }
    //From Seller Page
    elseif(isset($_GET['returnedItemID'])){
        
        $data = mysqli_real_escape_string($db, $_GET['returnedItemID']);
        $prevBreadCrumb = mysqli_real_escape_string($db, $_GET['returnBread']);
    }
}
//START HERE
elseif(isset($_GET["categoryIdReturned"])!=null) {
    $data = $_Get['categoryIdReturned'];
    echo $data;

}
else{
    
    //Change Data to INO after fix
    $data=mysqli_real_escape_string($db, $_POST['data']);
    $prevBreadCrumb = mysqli_real_escape_string($db, $_POST['breadCrumb']);
}

//changed to ino already, if bug its gonna be here
$result = mysqli_query($db, "SELECT * FROM item WHERE ino = '$data'") or die($mysqli->error());

$row = $result->fetch_assoc();
$currentBreadCrumb = $row['title'];


//Get Image
$currentImage = $row['ino'];
$imgLink = "SELECT * FROM images WHERE ino = '$currentImage'";
$imgLink = mysqli_query($db, $imgLink);
$imgLink = $imgLink->fetch_assoc();

//Get Current Winner Needed Data
$currentWinner = $row['winnerId'];
$currentWinnerInfo = mysqli_query($db, "SELECT * FROM member WHERE mid='$currentWinner'");
$currentWinnerInfo= $currentWinnerInfo->fetch_assoc();

//Get Current Seller
$sellerID = $row['sellerId'];
$currentSeller = mysqli_query($db, "SELECT * FROM member where mid ='$sellerID'");
$currentSeller = $currentSeller->fetch_assoc();

//from GET gonna add comment code here
//gonna need another if reqeust==get
//update item bid
//store comment in rating table, this page will come out as empty again
//click on user, comments come out there 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['newBid'])){
        $sessionUser= $_SESSION['login_user_ID'];
        $rowINO = $row['ino'];
        $newBid= $_GET['newBid'];

        if($newBid<$row['startingBid']+$row['bidIncrement']){

        }
        else{
        mysqli_query($db, "UPDATE item SET winnerId = '$sessionUser' WHERE ino = '$rowINO' ") or die($mysqli->error());
        mysqli_query($db, "UPDATE item SET startingBid = '$newBid' WHERE ino = '$rowINO' ") or die($mysqli->error());

        //reupdating row
        $result = mysqli_query($db, "SELECT * FROM item WHERE ino = '$data'") or die($mysqli->error());
        $row = $result->fetch_assoc();
        }
    }
    elseif (isset($_GET['comment'])) {
        $itemIno = $row['ino'];
        $buyerRating = $_GET['ratingNum'];
        $buyerComment=$_GET['comment'];
        $sql = "INSERT INTO rating(ino, buyerRating, buyerComment)"
            . "VALUES('$itemIno', '$buyerRating', '$buyerComment')";

        mysqli_query($db, $sql);
      
    }
}

?>
<body> 


    <div class="container-fluid w-75 h-100 bg-dark text-white">

        <!--BreadCrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class='breadcrumb-item enabled' aria-current="page"><a href="logout.php">Logout</a></li>
                <li class="breadcrumb-item active"><a href="welcome.php">Search</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="search.php?returnBread=<?php echo urlencode($prevBreadCrumb) ?>"><?php echo $prevBreadCrumb ?></a></li>
                <li class="breadcrumb-item disabled" aria-current="page"><?php echo $currentBreadCrumb ?></li>
            </ol>
        </nav>

        <h1 class="cover-heading text-center">Photo Details</h1>
        <h2 class="cover-heading text-center"><?php echo $row['title'] ?></h1>
        <!--Bid Info-->
        <div class="bg-dark mx-5 w-75 cover-heading text-right">
            <div class="row mb-2">
                <div class="d-flex flex-column">
                    <!--Add Image Here-->
                    <img src=<?php echo $imgLink['image']?> class="img-fluid" align="top">
                </div>
                <div class="col-md-8 flex-md-row">
                        <!--Empty for Spacing-->      
                </div>
                <div class="col-md-4 flex-md-row">
                    <br><h3>Starting Bid</h3>
                    <h4><?php echo $row['startingBid']; ?></h4>
                    <br><h3>Current Bid</h3>
                    <h4><?php echo $row['startingBid']; ?></h4>
                    <br><h5>winning:</h5>
                        <h5><?php echo $currentWinnerInfo['fname'] . " " . $currentWinnerInfo['lname'] ?></h5>
                    <br><h3>Place Bid</h3>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-8 flex-md-row">
                        <!--Empty for Spacing-->
                        
                </div>
                <!--Bid Option-->
                <div class="col-md-4 flex-md-row">
                    <!--Form for Bid-->
                    <form action='' method='get'>
                        <div class="input-group">
                            <label for="bid" class="sr-only">Bid</label>
                                <input type="hidden" name="getSellerInfo" value=<?php echo $data ?>></input>
                                <input type="hidden" name="getPrevCrumbInfo" value=<?php echo $prevBreadCrumb ?>></input>
                                <input class="form-control mr-sm-2" placeholder="Bid" id="newBid" name="newBid" type="text" required></input>
                                <?php 
                                $userID = $_SESSION['login_user_ID'];
                                $sellerID =  $currentSeller['mid'];
                        
                                if($userID != $sellerID){
                                //Show bid button if user accessing page is not same user who posted listing
                               echo "<span class='input-group-btn'>
                                    <button class ='btn btn-primary' type='submit' name='submit'>Submit</button>
                                </span>
                                ";}?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Discription-->
        <div class="bg-dark cover-heading text-end">
            <!--Seller Link-->
            <br><h5>Seller: <a href="seller.php?sellerInfo=<?php echo urlencode($currentSeller['mid'])?>&ItemID=<?php echo urlencode($row['ino'])?>&previousBreadCrumb1=<?php echo urlencode($prevBreadCrumb) ?>&previousBreadCrumb2=<?php echo urlencode($currentBreadCrumb)?>"><?php echo $currentSeller['fname'] . " " . $currentSeller['lname'] ?></a></h5><br>
            <br><h5>Discription: <?php echo $row['description']?></h5><br>
                <h4>Place Feedback<h4><br>
                    <!--Form for Comment-->
                    <?php if ($sellerID != $_SESSION['login_user_ID']) {
                    echo "<form action='' method='get'>
                        <div class='form-group'>" . 
                            //Rating
                            "<div class='input-group'>
                                <h3>Rating  &nbsp</h3>
                                <select aria-label='Select a category for search' size='1' id='gh-cat' name='ratingNum'>  
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                </select>
                            </div>";
                            //Comment Box
                            
                            echo "<label for='comment' class='sr-only'>Comment</label>
                                <textarea class='form-control' rows='5' placeholder='Comment' id='comment' name='comment' type='text required'></textarea>
                        </div>
                        <input type='hidden' name='getSellerInfo' value=" . $data . "></input>
                        <input type='hidden' name='getPrevCrumbInfo' value=" . $prevBreadCrumb . "></input>
                        <button type='submit' class='btn btn-success btn-lg btn-block'>Submit Comment</input>
                            
                    </form>";
                    } ?>
        </div>
    </div>

</body>

<?php
    require('footer.php');
?>