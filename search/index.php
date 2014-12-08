#!/usr/local/bin/php

<?php
ini_set('display_errors',1);

error_reporting(E_ALL);

$url = $_SERVER['QUERY_STRING'];
parse_str($url);


echo (" ");
include('../phpfuncts/getPokemon.php');

$pokemon = $search;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">    
    <link href="../css/styles.css" rel="stylesheet" media="screen">
  </head>


	


    <div class="buttonBox"> 
	<center>
	  <br /><br /><br />
	  <form class="searchBox">
	  <input type="text" class="searchTextBox" name="search" placeholder="Enter Username or Pokemon to Search">
	  <button type="submit" class="btn btn-custom" value="searchBut">Search</button>
	  </form>
	</center>
    </div>

<center>
  <div class="parentTable">
    
           <table class="table userTable">
	<thead>
	  <tr>
	    <th>Trainers</th>
	  </tr>
	</thead>
    <?php

      //Returns Table of People
      if(isset($search)){
        $pokemomResult = getTrainers($pokemon);


        while($value = getNext($pokemomResult)){
            ?><tr>

            <td><?echo (sprintf("%03s", $value->TRAINER_ID));
            ?>
            <?echo ("<a href='../trainers/profile.php?trainerID=".$value->TRAINER_ID."'>".ucwords($value->NAME ."</a>"));
            ?></td></tr><?


	    }
      }  
      ?>
    </table>
      <table class="table pokemonTable">
	<thead>
	  <tr>
	    <th>#</th>
	    <th></th>
	    <th>Pokemon</th>
	  </tr>
	</thead>
  <?php
  
  //Returns table of pokemon
	if(isset($search)){

	$pokemomResult = getPokemon($pokemon);
	
	while($value = getNext($pokemomResult)){
	  if($value->ID < 10000){
	    ?><tr>
	    <td><?echo (sprintf("%03s", $value->SPECIES_ID));
	    ?><td><?echo ("<img src='../dbimgs/".((intval($value->SPECIES_ID) > 721) ?  0:($value->SPECIES_ID)).".png'>");
	    ?><td><?echo ("<a href='../pokedex/profile.php?pokemon=".$value->SPECIES_ID."'>".ucwords($value->IDENTIFIER ."</a>"));
	    ?></td></tr><?
	  }
  
	}
      }
      ?>
      </table>
  
	  
      

  </div>
    
    
      <?php
      if(!isset($profile) && $i = 0 && $value == false){
	echo "Pokemon not found";
      }

?>
</center>

<?php
include('../header.php');
?>


  </body>

</html>
