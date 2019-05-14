<?php
    require('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
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
include("config.php");

?>
<body>
    <!--BreadCrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class='breadcrumb-item enabled' aria-current="page"><a href="logout.php">Logout</a></li>
            <li class="breadcrumb-item disabled" aria-current="page">Search</li>
        </ol>
    </nav>

        <!--Search-->
    <div class="container-fluid">
        <form class="form-inline" action="search.php" method="post">
                <div class="col-lg-4 mx-auto">
                    <div class="input-group">
                        <label for="searchOption" class="sr-only">Search</label>
                            <input class="form-control mr-sm-2" placeholder="Search" id="searchOption" name="search" type="text" required></input>
                            <select aria-label="Select a category for search" class="gh-sb gh-sprRetina" size="1" id="gh-cat" name="categories">
                                <option value="All Categories">All Categories</option>
                                    <option value="Urban:City">Urban-City</option>
                                    <option value="Urban:Bokeh">Urban-Bokeh</option>
                                    <option value="Landscape:Sunsets">Landscape-Sunsets</option>
                                    <option value="Landscape:Nature">Landscape-Nature</option>
                                    <option value="Portrait:Portrait">Portrait-Portraits</option>
                            </select>
                            <span class="input-group-btn">
                                <button class ="btn btn-secondary" type="submit" name="submit">Submit</button>
                            </span>
                    </div>
                </div>
        </form>
    </div>

    <!--Item List-->
    <div class="container">
        <br><h1 class="h3 mb-3 font-weight-bold text-center">List of Items</h1>

        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-dark">
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
                </tr>
            </thead>
            <tbody>
<?php 
            $sql = "SELECT * FROM item";

            $result = mysqli_query($db, $sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    //echo "Title: " . $row['title'] . " Category: " . $row['category'] . " Description: " . $row['description'] . " Open-Date-Time: " . $row['openDateTime'] . " SellerID: " . $row['sellerId'] . " Starting-Bid: " . $row['startingBid'] . " Bid-Increment: " . $row['bidIncrement'] . " Close-Date-Time: " . $row['closeDateTime'] . " WinnerID: " . $row['winnerId'];
                    echo "<tr>
                            <td>"  . $row['title']         . "</td>" . 
                            "<td>" . $row['category']      . "</td>" . 
                            "<td>" . $row['description']   . "</td>" .
                            "<td>" . $row['openDateTime']  . "</td>" .
                            "<td>" . $row['sellerId']      . "</td>" . 
                            "<td>" . $row['startingBid']   . "</td>" . 
                            "<td>" . $row['bidIncrement']  . "</td>" . 
                            "<td>" . $row['closeDateTime'] . "</td>" .
                            "<td>" . $row['winnerId']      . "</td>" .
                          "</tr>";
                }
            } else {
                echo "No Results Found";
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