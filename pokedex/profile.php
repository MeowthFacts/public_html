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

<br /><br />
<br /><br />
<?
//IF VIEWING PROFILE OF POKEMON
    $arrayPokemon = getPokemonProfile($pokemon);
  
  
  

    $value = $arrayPokemon[0];
    $type1 = $arrayPokemon[1];
    $type2 = $arrayPokemon[2];
    echo ("<img src='http://img.pokemondb.net/artwork/".$value->IDENTIFIER.".jpg'>"."  <a href='index.php?profile=".$value->SPECIES_ID."'>".ucwords($value->IDENTIFIER ."</a>". " ID:" . $value->SPECIES_ID ));
    echo ("<br />");
    echo ($type1->NAME);
    ?>
    <br >
    <?php
    if($type2) {
      echo ($type2->NAME);
    }
    
include('../header.php');
?>