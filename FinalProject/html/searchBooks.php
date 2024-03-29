<!-- Programmer: Cassandra Horne,
	 Program Due: August 6th 2019
--> 
<!DOCTYPE html> 
<?php
    session_start();
    
    require_once 'fploginInfo.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $client_category_id = 5;

    if (isset($_SESSION['$client_category_id'])){
        $client_category_id = $_SESSION['$client_category_id'];
    } else {
        $client_category_id = 5;
    }
?>
<html>
    <head>
        <link href="http://horne112.myweb.cs.uwindsor.ca/60334/assignments/FinalProject/css/finalProjectSiteCSS.css" rel="stylesheet" type="text/css">  
    </head>
    <h3 align=right><a href="loginout.php"><b>Sign in/Sign out</b></a></h3>
   
    <h1 class=header align=center>
        <IMG id="libraryIcon" alt="Library Icon" src="http://horne112.myweb.cs.uwindsor.ca/60334/assignments/FinalProject/pictures/logo.jpg" BORDER="2%" align="left">
          <a href=index.php>  Rivendell Library </a>
    </h1>
        
    <body>
        <table>
            <td class=menu>
               <ul class=column>
                 <li><a href="index.php"><b>Home</a> </li>
                 <li><a href="searchBooks.php">Search Books</b></a> </li>
                   
                <?php
                    if(($client_category_id == 1)||($client_category_id == 2)||($client_category_id == 3)){
                        echo '<li><a id="LI6" href="libraryStatistics.php"><b>Library Statistics</b></a> </li><li><a id="ST1" href="userBalance.php"><b>Your balance</b></a> </li>';
                    }
                       
                    if($client_category_id == 1){    
                        echo '<li><a id="LI1" href="searchPeople.php"><b>Search Users</a> </li>
                         <li><a id="LI2" href="searchResultsOverdue.php">Currently Overdue Books</a> </li>  
                         <li><a id="LI3" href="addRemoveBooks.php">Add/Remove Books</a> </li>
                         <li><a id="LI4" href="addRemoveUsers.php">Add/Remove Users</a> </li>
                         <li><a id="LI5" href="withdrawReturn.php">Withdraw/Return Books</a></b></li>';   
                    }
                ?> 
              </ul>
            </td>
            <td class=content>
                <ul class=clearfix>
                    <h2>
                        <form action="searchBooksResults.php" method="post"><pre>  
Author: <input type="text" name="author">
Title: <input type="text" name="title">
Category: <select name="category">
<option value="Any">Any</option>
                        <?php 
                            $query = "SELECT category FROM book GROUP BY category;";
                            $result = $conn->query($query);
                            while($row = mysqli_fetch_array($result)){ 
                                echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
                            }
                         ?>
                        </select>
Year: <input type="text" name="year">
ISBN: <input type="text" name="isbn">
Book ID: <input type="text" name="book_id">
Shelf Location: <select  name="shelf_loc">    
<option value="Any">Any</option>
                        <?php 
                            $query = "SELECT shelf_loc FROM book GROUP BY shelf_loc;";
                            $result = $conn->query($query);
                            while($row = mysqli_fetch_array($result)){ 
                                echo '<option value="'.$row['shelf_loc'].'">'.$row['shelf_loc'].'</option>';
                            }
                         ?>
                        </select>
Availability: <select  name="availablity">    
                        <option value="Any">Any</option>
                        <option value="Available">Available</option>
                        <option value="Withdrawn">Withdrawn</option>             
                        </select>
<input type="submit" value="Submit">
                    </pre></form>
                    <?php
                      $result->close();
                      $conn->close();
                    ?>
                    </h2>
                </ul>
            </td>
        </table>
    </body>
    <h4 class=footer>You may contact the site builder at horne112@uwindsor.ca</h4>
</html> 
