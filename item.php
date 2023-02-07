<?php
require_once('Models/AuctionDataSet.php');
require_once ("Models/User.php");

$view = new stdClass();
$_SESSION["ThisItem"]=0;

if (isset($_POST["ViewButton"])) {
    $_SESSION["ThisItem"]=$_POST["AuctionId"]+1;//gets the id of the item from auction.php you clicked
}

if (isset($_POST["Bid"])) {//checks to see if the bid button is pressed
    $bidding = new AuctionDataSet();
    if($_POST["Bid"] > $_POST["oldBid"]) {//checks to see if the new bid is higher than the old bid
        $bidding->bid($_POST["theId"], $_POST["Bid"]);// bids on the item
        header("Location: auction.php");//goes to the auction table
        exit();
    }
    else {
        header("Location: auction.php");//goes to the auction table
        echo "<p>Please enter a number higher than the current highest bid</p>";
        exit();
    }
}

require_once ("views/item.phtml");
