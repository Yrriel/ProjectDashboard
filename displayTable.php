<?php

include 'connection.php'; 

//sets number of rows to display in a page
$start = 0;
$rowsPerPage = 4;


//for pagination show number of pages
$pageVisible = 5;
$pageMiddle = ceil($pageVisible / 2 ) ;

//get the total number of rows
$records = $conn->query("SELECT * FROM `login`");
$numOfRows = $records->num_rows;

//calculating the number of rows each pages.
$pages = ceil($numOfRows / $rowsPerPage);

//if the user clicks on the pagination buttons, we set a new starting point.
if (isset($_GET['page-nr'])){
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rowsPerPage;
}


$result = $conn->query("SELECT * FROM `login` LIMIT $start,$rowsPerPage");

?>