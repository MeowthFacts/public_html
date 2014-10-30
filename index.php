#!/usr/local/bin/php
<!DOCTYPE html>
<html>
  <head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">    
    <link href="css/styles.css" rel="stylesheet" media="screen">
  </head>




  <body>
    <div class="jumbotron Jumbheader">     

    </div>

	


    <div class="buttonBox"> 
	<center>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='pokedex/'">POKEDEX</button>
	  <button type="button" class="btn btn-custom">TRAINERS</button> 
	  <button type="button" class="btn btn-custom">MEOWPEDIA</button>
	  <button type="button" class="btn btn-custom">COMPARE</button>
	  <br /><br />
	  <form action="pokedex/index.php" class="searchBox">
	  <input type="text" class="searchTextBox" name="pokemon" placeholder="Enter Username or Pokemon to Search">
	  <button type="submit" class="btn btn-custom" value="searchBut">Search</button>
	  </form>
	</center>
    </div>
    



</div>
<br ><br><br ><br><br ><br>


<?php
include('header.php');
?>



  </body>

</html>
