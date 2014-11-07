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
       
<body>
    <br /><br /><br /><br />
     <center><h1>Egg Groups</h1></center>
    
    <?php

     function getGroups(){
        $connection = connection();
    
        $statement = oci_parse($connection, 'SELECT * FROM EGG_GROUPS');
        oci_execute($statement);

        return $statement; 
    }

    function getNext($statement){
        $next = oci_fetch_object($statement);
        return $next;
    }

    $groups = getGroups();
    $current = getNext($groups);
    ?>
    
    <table class="table">
        <thead>
        <tr>
          <th>#</th>
          <th>Egg Group</th>
        </tr>
      </thead>
        <tr>
            <td>1</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Monster'>
                <button type='submit' name='groupID' value='1'>Monster</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Water 1'>
                <button type='submit' name='groupID' value='2'>Water 1</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Bug'>
                <button type='submit' name='groupID' value='3'>Bug</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Flying'>
                <button type='submit' name='groupID' value='4'>Flying</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Field'>
                <button type='submit' name='groupID' value='5'>Field</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Fairy'>
                <button type='submit' name='groupID' value='6'>Fairy</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Grass'>
                <button type='submit' name='groupID' value='7'>Grass</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Human-Like'>
                <button type='submit' name='groupID' value='8'>Human-Like</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Water 3'>
                <button type='submit' name='groupID' value='9'>Water 3</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Mineral'>
                <button type='submit' name='groupID' value='10'>Mineral</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>11</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Amorphous'>
                <button type='submit' name='groupID' value='11'>Amorphous</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>12</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Water 2'>
                <button type='submit' name='groupID' value='12'>Water 2</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>13</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Ditto'>
                <button type='submit' name='groupID' value='13'>Ditto</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>14</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='Dragon'>
                <button type='submit' name='groupID' value='14'>Dragon</button>
                </form>
            </td>
        </tr>
        <tr>
            <td>15</td>
            <td><form action='pokemon-egg-groups.php' method='post'>
                <input type='hidden' name='groupName' value ='No Eggs'>
                <button type='submit' name='groupID' value='15'>No Eggs</button>
                </form>
            </td>
        </tr>
    </table>
    
    <?php
    include('../header.php');
    ?>
 
</body>
</html>