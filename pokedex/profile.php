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
$arrayPokemon = getPokemonProfile($pokemon);
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
<br /><br />
<br /><br />

<div class="parentPokedexProfileDiv">
    <div class="pokedexProfileDiv">
        <?
        //IF VIEWING PROFILE OF POKEMON
        ?>
        <div class="pokemonProfileInfoPicture">
            <?php
            echo ("<img src='http://img.pokemondb.net/artwork/".$value->IDENTIFIER.".jpg'>");
            ?>

            <br />

            <?php
            echo(ucwords($value->IDENTIFIER) ."</a>". " ID:" . sprintf("%03s", $value->SPECIES_ID));
            ?>
            <br /><br /><br />
            <div class="pokemonTypeSelector">
                <form action="../meowpedia/pokemon-types.php" method="get" id="pokemonTypeLink">
                    <input type="hidden" name="typeName" value ="<? echo($type1->NAME);?>">
                    <button type="submit" class="types" id="<? echo($type1->NAME);?>" name="typeID" value="<? echo($type1->ID);?>"><? echo($type1->NAME);?></button>
                </form>

                <br />
                <?php
                if($type2) {
                ?>
                <form action="../meowpedia/pokemon-types.php" method="get" id="pokemonTypeLink">
                    <input type="hidden" name="typeName" value ="<? echo($type2->NAME);?>">
                    <button type="submit" class="types" id="<? echo($type2->NAME);?>" name="typeID" value="<? echo($type2->ID);?>"><? echo($type2->NAME);?></button>
                </form>
            </div>
        <?php
        }
        ?>
        </div>
    <div class="pokemonDescription">
        <p id="descriptionText"></p>
    </div>
    </div>
    <div class="pokemonProfileInfoDiv" id="pokemonProfileInfoDiv">
        <table id="pokemonInfo">
            <tr><th class="pokedexcolumnheader"></th><th class="pokedexcolumnheader"></th><th class="pokedexcolumnheader"></th></tr>
            <tr><th>Ability: </th><td id="ability1"></td></tr>
            <tr><th>Ability: </th><td id="ability2"></td></tr>
            <tr><th>Attack: </th><td id="Attack"></td></tr>
            <tr><th>Defense: </th><td id="Defense"></td></tr>
            <tr><th>Special Attack: </th><td id="sp_atk"></td></tr>
            <tr><th>Special Defense: </th><td id="sp_def"></td></tr>
            <tr><th>Base Exp: </th><td id="exp"></td></tr>
            <tr><th>Height: </th><td id="height"></td></tr>
            <tr><th>HP: </th><td id="hp"></td></tr>
        </table>
        <br><br>
        <table id="pokemonMoveTable">
            <tr><th id="movesHeader"></th></tr>
        </table>
        <br>
    </div>
</div>
<?php include('../header.php'); ?>
<script>
    var id = <?php echo($pokemon); ?>;
    function getPokemonInfo(){
        $.ajax({
            url: 'http://pokeapi.co/api/v1/pokemon/' + id + '/',
            type: "GET",
            dataType: 'jsonp',
            success:function(html) {
                populationInformtion(html);
                populateMoves(html['moves']);
                html = html['descriptions']
                getDescription(html[1]);

            }
        });
    }

    function populationInformtion(html){
        var ability1 = document.getElementById('ability1');
        var ability2 = document.getElementById('ability2');
        var attack = document.getElementById('Attack');
        var defense = document.getElementById('Defense');
        var exp = document.getElementById('exp');
        var height = document.getElementById('height');
        var hp = document.getElementById('hp');
        var sp_atk = document.getElementById('sp_atk');
        var sp_def = document.getElementById('sp_def');

        var abilities = html['abilities'];
        if(abilities[1] != undefined){
            ability1.innerHTML = capitaliseFirstLetter(abilities[0]['name']) + " ";
            ability2.innerHTML = capitaliseFirstLetter(abilities[1]['name']);
        }
        attack.innerHTML = html['attack'];
        defense.innerHTML = html['defense'];
        exp.innerHTML = html['exp'];
        height.innerHTML = html['height'];
        hp.innerHTML = html['hp'];
        sp_atk.innerHTML = html['sp_atk'];
        sp_def.innerHTML = html['sp_def'];
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
    function populateMoves(moves){
        var i = 0;
        var box = document.getElementById('pokemonMoveTable');
        for(i; i < moves.length; ++i) {
            var move = moves[i];
            box.innerHTML = box.innerHTML + "<tr><td>" + move['name'] + "</td></tr>";
        }
    }
    function capitaliseFirstLetter(string)
    {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    getPokemonInfo();

</script>
</body>