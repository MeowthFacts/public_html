#!/usr/local/bin/php
<!DOCTYPE html>
<?php
    include('../header.php');
    include('../phpfuncts/advancedSearch.php');
    $results = advSearch($_GET['type1'], $_GET['type2'], $_GET['order']);
?>
<html>
    <head>
        <title>MeowthFacts: Pokemon & Trainer Database</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/styles.css" rel="stylesheet" media="screen">
    </head>

<body>
    <br />
    <br />
    <br />
    <br />



    <form method="GET">
        Type 1:
        <br />
        <select name="type1">
            <option type="radio" value="" checked></option>
            <option type="radio" value="1" >Normal</option>
            <option type="radio" value="2" >Fighting</option>
            <option type="radio" value="3" >Flying</option>
            <option type="radio" value="4" >Poison</option>
            <option type="radio" value="5" >Ground</option>
            <option type="radio" value="6" >Rock</option>
            <option type="radio" value="7" >Bug</option>
            <option type="radio" value="8" >Ghost</option>
            <option type="radio" value="9" >Steel</option>
            <option type="radio" value="10" >Fire</option>
            <option type="radio" value="11" >Water</option>
            <option type="radio" value="12" >Grass</option>
            <option type="radio" value="13" >Electric</option>
            <option type="radio" value="14" >Psychic</option>
            <option type="radio" value="15" >Ice</option>
            <option type="radio" value="16" >Dragon</option>
            <option type="radio" value="17" >Dark</option>
            <option type="radio" value="18" >Fairy</option>
            <option type="radio" value="10002" >Shadow</option>
        </select>
        <br />
        <br />
        Type 2:
        <br />
        <select name="type2">
            <option type="radio" value="" checked></option>
            <option type="radio" value="1" >Normal</option>
            <option type="radio" value="2" >Fighting</option>
            <option type="radio" value="3" >Flying</option>
            <option type="radio" value="4" >Poison</option>
            <option type="radio" value="5" >Ground</option>
            <option type="radio" value="6" >Rock</option>
            <option type="radio" value="7" >Bug</option>
            <option type="radio" value="8" >Ghost</option>
            <option type="radio" value="9" >Steel</option>
            <option type="radio" value="10" >Fire</option>
            <option type="radio" value="11" >Water</option>
            <option type="radio" value="12" >Grass</option>
            <option type="radio" value="13" >Electric</option>
            <option type="radio" value="14" >Psychic</option>
            <option type="radio" value="15" >Ice</option>
            <option type="radio" value="16" >Dragon</option>
            <option type="radio" value="17" >Dark</option>
            <option type="radio" value="18" >Fairy</option>
            <option type="radio" value="10002" >Shadow</option>
        </select>
        <br />
        <br />
        View By:
        <br />
        <select name="order">
            <!--how to sort: (max, min, avg)-->
            <option type="radio" value="0">Ascending</option>
            <option type="radio" value="1">Descending</option>
        </select>

        <select>
        <input type="checkbox" name="vehicle" value="Car">
        <input type="checkbox" name="vehicle" value="Car">I have a car
        </select>


        <button type="submit">Submit</button>
    </form>

    <table class="table pokemonTable">
        <thead>
        <tr>
            <th>#</th>
            <th></th>
            <th>Pokemon</th>
            <th>Height</th>
            <th>Weight</th>
        </tr>
        </thead>
        <?php
        if(isset($_GET['order'])){
            echo("HI");
            while ($value = getNext($results)) {
                if($value->ID < 10000){
                    ?><tr>
                    <td><?echo (sprintf("%03s", $value->SPECIES_ID));
                    ?><td><?echo ("<img src='../dbimgs/".((intval($value->SPECIES_ID) > 721) ?  0:($value->SPECIES_ID)).".png'>");
                    ?><td><?echo ("<a href='../pokedex/profile.php?pokemon=".$value->SPECIES_ID."'>".ucwords($value->IDENTIFIER ."</a>"));
                        ?></td><td><?php echo($value->HEIGHT); ?></td><td><?php echo($value->WEIGHT); ?></td></tr><?
                }
            }
        }
        ?>

</body>
</html>
