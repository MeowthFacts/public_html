#!/usr/local/bin/php

<?php
include('../phpfuncts/connection.php');
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
       
<body class="meowped">
    <br /><br /><br /><br />
    <h1>Egg Groups</h1>


    <table class="eggGroup">
        <tr>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Monster'>
                <button class="meowpediaButton" type='submit' name='groupID' value='1'>Monster</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Water 1'>
                <button class="meowpediaButton" type='submit' name='groupID' value='2'>Water 1</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Bug'>
                <button class="meowpediaButton" type='submit' name='groupID' value='3'>Bug</button>
                </form>
            </td>
        </tr>

        <tr>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Flying'>
                <button class="meowpediaButton" type='submit' name='groupID' value='4'>Flying</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Field'>
                <button class="meowpediaButton" type='submit' name='groupID' value='5'>Field</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Fairy'>
                <button class="meowpediaButton" type='submit' name='groupID' value='6'>Fairy</button>
                </form>
            </td>
        </tr>

        <tr>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Grass'>
                <button class="meowpediaButton" type='submit' name='groupID' value='7'>Grass</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Human-Like'>
                <button class="meowpediaButton" type='submit' name='groupID' value='8'>Human-Like</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Water 3'>
                <button class="meowpediaButton" type='submit' name='groupID' value='9'>Water 3</button>
                </form>
            </td>
        </tr>

        <tr>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Mineral'>
                <button class="meowpediaButton" type='submit' name='groupID' value='10'>Mineral</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Amorphous'>
                <button class="meowpediaButton" type='submit' name='groupID' value='11'>Amorphous</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Water 2'>
                <button class="meowpediaButton" type='submit' name='groupID' value='12'>Water 2</button>
                </form>
            </td>
        </tr>

        <tr>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Ditto'>
                <button class="meowpediaButton" type='submit' name='groupID' value='13'>Ditto</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='Dragon'>
                <button class="meowpediaButton" type='submit' name='groupID' value='14'>Dragon</button>
                </form>
            </td>
            <td><form action='pokemon-egg-groups.php' method='get'>
                <input type='hidden' name='groupName' value ='No Eggs'>
                <button class="meowpediaButton" type='submit' name='groupID' value='15'>No Eggs</button>
                </form>
            </td>
        </tr>
    </table>
    
    <?php
    include('../header.php');
    ?>
 
</body>
</html>