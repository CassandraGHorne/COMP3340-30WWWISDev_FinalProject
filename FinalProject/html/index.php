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
            <td class=largemenu>
               <h1>
                 <li class=liLarge><a href="index.php"><b>Home</a> </li>
                 <li class=liLarge><a href="searchBooks.php">Search Books</b></a> </li>
                   
                <?php
                    
                   if(($client_category_id == 1)||($client_category_id == 2)||($client_category_id == 3)){
                        echo '<li class=liLarge><a id="LI6" href="libraryStatistics.php"><b>Library Statistics</a></b> </li>
                        <li class=liLarge><a id="ST1" href="userBalance.php"><b>Your balance</b></a> </li>';
                    }
                       
                    if($client_category_id == 1){    
                        echo '<li class=liLarge><a id="LI1" href="searchPeople.php"><b>Search Users</a> </li>
                         <li class=liLarge><a id="LI2" href="searchResultsOverdue.php">Currently Overdue Books</a> </li>  
                         <li class=liLarge><a id="LI3" href="addRemoveBooks.php">Add/Remove Books</a> </li>
                         <li class=liLarge><a id="LI4" href="addRemoveUsers.php">Add/Remove Users</a> </li>
                         <li class=liLarge><a id="LI5" href="withdrawReturn.php">Withdraw/Return Books</a> </b></li>';  
                    }
                ?>
              </h1>
            </td>
        </table>
    </body>
    <h4 class=footer>You may contact the site builder at horne112@uwindsor.ca</h4>
</html> 
