#!/usr/local/bin/php
<script src="http://code.jquery.com/jquery.js"></script>
<?php
ini_set('display_errors',1);

error_reporting(E_ALL);

$url = $_SERVER['QUERY_STRING'];
parse_str($url);

if(isset($pokemon)){
}


include('../phpfuncts/getPokemon.php');
include('getProfile.php');
$arrayPokemon = getPokemonProfile($pokemon);
$profilePokemon = getProfile($pokemon);
$pmoves = $profilePokemon[0];
$pstats =  $profilePokemon[1];
$pabilities = $profilePokemon[2];
$value = $arrayPokemon[0];
$type1 = $arrayPokemon[1];
$type2 = $arrayPokemon[2];
?>
<!DOCTYPE html>
<html>
<head>
    <title>MeowthFacts: Pokemon & Trainer Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/styles.css" rel="stylesheet" media="screen">
    <link href="../css/josh.css" rel="stylesheet" media="screen">

</head>
<body>
<br />

<div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
<div id="pokeandtype" class="col-md-3">
        <?
        //IF VIEWING PROFILE OF POKEMON
        ?>
        <div class="pokemonProfileInfoPicture">
	    <?php
            echo(ucwords($value->IDENTIFIER) ."</a>". " ID:" . sprintf("%03s", $value->SPECIES_ID));
            ?>

	    <br />

            <?php
            echo ("<img width='250' class='displayed'  src='http://img.pokemondb.net/artwork/".$value->IDENTIFIER.".jpg'>");
            ?>
	
            
    </div>
            
            <br />
           
            <div class="pokemonTypeSelector">
                    <button type="submit" class="types" id="<? echo($type1->NAME);?>" name="typeID" value="<? echo($type1->TYPE_ID);?>"><? echo($type1->NAME);?></button>

                
                <?php
                if($type2) {
                ?>
                    <button type="submit" class="types" id="<? echo($type2->NAME);?>" name="typeID" value="<? echo($type2->TYPE_ID);?>"><? echo($type2->NAME);?></button>
            
    
        <?php
        }
        ?>
                </div>
        </div>
<br />
            <div class="col-md-7">
    <div class="pokemonDescription">
        <p id="descriptionText"></p>
    </div>

    <div class="pokemonProfileInfoDiv" id="pokemonProfileInfoDiv">
        <table id="pokemonInfo">
            <tr><th class="pokedexcolumnheader"></th><th class="pokedexcolumnheader"></th><th class="pokedexcolumnheader"></th></tr>
            <tr><th>Ability: </th><td id="ability1"><?php echo(ucfirst(getNext($pabilities)->IDENTIFIER)); ?></td></tr>
            <tr><th>Ability: </th><td id="ability2"><?php
                    while($blah = getNext($pabilities)){
                        echo(ucfirst($blah->IDENTIFIER));
                    }
                    ?></td></tr>
            <tr><th>HP: </th><td id="hp"><?php echo(getNext($pstats)->BASE_STAT); ?></td></tr>
            <tr><th>Attack: </th><td id="Attack"><?php echo(getNext($pstats)->BASE_STAT); ?></td></tr>
            <tr><th>Defense: </th><td id="Defense"><?php echo(getNext($pstats)->BASE_STAT); ?></td></tr>
            <tr><th>Special Attack: </th><td id="sp_atk"><?php echo(getNext($pstats)->BASE_STAT); ?></td></tr>
            <tr><th>Special Defense: </th><td id="sp_def"><?php echo(getNext($pstats)->BASE_STAT); ?></td></tr>
            <tr><th>Base Exp: </th><td id="exp"><?php echo($value->BASE_EXPERIENCE); ?></td></tr>
            <tr><th>Height: </th><td id="height"><?php echo($value->HEIGHT); ?></td></tr>
        </table>
        <br />
        Moves: 
        <br />
        <div id="moveTables">
            <table id="pokemonMoveTable">
                <tr><th id="movesHeader"></th></tr>
                <?php
                while($pmove = getNext($pmoves)) {
                    echo("<tr><td>" . ucfirst($pmove->IDENTIFIER) . "</td></tr>");
                }
                ?>

            </table>
        </div>
        <br />
    </div>
    </div>
    </div>
</div>

<script>
    var id = <?php echo($pokemon); ?>;
    function getPokemonInfo(){
        $.ajax({
            url: 'http://pokeapi.co/api/v1/pokemon/' + id + '/',
            type: "GET",
            dataType: 'jsonp',
            success:function(html) {
                html = html['descriptions']
                getDescription(html[1]);

            }
        });
    }

    function getDescription(id) {
        $.ajax({
            url: 'http://pokeapi.co/' + id['resource_uri'],
            type: "GET",
            dataType: 'jsonp',
            success: function (html) {
                document.getElementById('descriptionText').innerHTML = html['description'];
            }
        });
    }
    function capitaliseFirstLetter(string)
    {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    getPokemonInfo();

</script>
</body>

