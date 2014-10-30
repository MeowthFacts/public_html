#!/usr/local/bin/php

<?php
ini_set('display_errors',1);

error_reporting(E_ALL);

$url = $_SERVER['QUERY_STRING'];
parse_str($url);

if(isset($pokemon)){
  echo $pokemon;
}

echo (" ");
include('../phpfuncts/getPokemon.php');
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
	  <input type="text" class="searchTextBox" name="pokemon" placeholder="Enter Username or Pokemon to Search">
	  <button type="submit" class="btn btn-custom" value="searchBut">Search</button>
	  </form>
	</center>
    </div>

<center>
<?php

//IF PERSON IS SEARCHING WHOLE POKEDEX OR JUST PARTICULAR POKEMON
    if(!isset($pokemon)){
      $result = getAllPokemon();
      ?>
      <table class="table">
      <thead>
        <tr>
          <th>#</th>
	  <th></th>
          <th>Pokemon</th>
        </tr>
      </thead>
      <?
      while(!isset($profile) && $value = getNext($result)){
	if($value->ID < 10000){
	  ?><tr>
	  <td><?echo (sprintf("%03s", $value->SPECIES_ID));
	  ?><td><?echo ("<img src='../dbimgs/".((intval($value->SPECIES_ID) > 649) ?  0:($value->SPECIES_ID)).".png'>");
	  ?><td><?echo ("<a href='profile.php?pokemon=".$value->SPECIES_ID."'>".ucwords($value->IDENTIFIER ."</a>"));
	  ?></td></tr><?
	}
      }
    }else{
      $result = getPokemon($pokemon);
      $i = 0;
      while(!isset($profile) && $value = getNext($result)){
	echo ("<img src='../dbimgs/".$value->SPECIES_ID.".png'>"."  <a href='profile.php?pokemon=".$value->SPECIES_ID."'>".ucwords($value->IDENTIFIER ."</a>". " ID:" . $value->SPECIES_ID ));
	echo ("<br />");
	$i = 1;
      }
      
      ?>
      </table>
      <?php
      if(!isset($profile) && $i = 0 && $value == false){
	echo "Pokemon not found";
      }
    }

?>
</center>

<?php
include('../header.php');
?>


  </body>

</html>
