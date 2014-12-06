#!/usr/local/bin/php
<!DOCTYPE html>
<html>
  <head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">    
    <link href="css/styles1.css" rel="stylesheet" media="screen">
  </head>




  <body>
   
    <div class="jumbotron Jumbheader">     
	  <div class="buttonBox" id="buttonSearch"> 
	<center>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='pokedex/'">POKEDEX</button>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='trainers/'">TRAINERS</button>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='meowpedia/'">MEOWPEDIA</button>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='compare/'">COMPARE</button>
	  <br /><br />
	  
	  <form action="search/index.php" class="searchBox" >
	  <input type="text" class="searchTextBox" name="search" placeholder="Enter Username or Pokemon to Search" id="searchbar">
	  <button type="submit" class="btn btn-custom" value="searchBut">Search</button>
	  
	  </form>
	  <br />
	  <button type="button" class="btn btn-custom" onclick="window.location.href='advancedSearch/'">ADVANCED SEARCHING</button>
	</center>
    </div>
  </div>

	


  
    



</div>
<br ><br><br ><br><br ><br>


<?php
include('header.php');
?>



  </body>

</html>
