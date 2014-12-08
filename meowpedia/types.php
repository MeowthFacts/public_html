#!/usr/local/bin/php



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
    <h1>Types</h1>

    <table class="types">
        
        <tr>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Normal">
                    <button type="submit" class="types" id="normal" name="typeID" value="1">Normal</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Fighting">
                    <button type="submit" class="types" id="fighting" name="typeID" value="2">Fighting</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Flying">
                    <button type="submit" class="types" id="flying" name="typeID" value="3">Flying</button>
                </form>
            </td>
        </tr>
        <tr>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Poison">
                    <button type="submit" class="types" id="poison" name="typeID" value="4">Poison</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Ground">
                    <button type="submit" class="types" id="ground" name="typeID" value="5">Ground</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Rock">
                    <button type="submit" class="types" id="rock" name="typeID" value="6">Rock</button>
                </form>
            </td>
        </tr>
        <tr>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Bug">
                    <button type="submit" class="types" id="bug" name="typeID" value="7">Bug</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Ghost">
                    <button type="submit" class="types" id="ghost" name="typeID" value="8">Ghost</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Steel">
                    <button type="submit" class="types" id="steel" name="typeID" value="9">Steel</button>
                </form>
            </td>
        </tr>
        <tr>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Fire">
                    <button type="submit" class="types" id="fire" name="typeID" value="10">Fire</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Water">
                    <button type="submit" class="types" id="water" name="typeID" value="11">Water</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Grass">
                    <button type="submit" class="types" id="grass" name="typeID" value="12">Grass</button>
                </form>
            </td>
        </tr><tr>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Electric">
                    <button type="submit" class="types" id="electric" name="typeID" value="13">Electric</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Psychic">
                    <button type="submit" class="types" id="psychic" name="typeID" value="14">Psychic</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Ice">
                    <button type="submit" class="types" id="ice" name="typeID" value="15">Ice</button>
                </form>
            </td>
        </tr><tr>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Dragon">
                    <button type="submit" class="types" id="dragon" name="typeID" value="16">Dragon</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Dark">
                    <button type="submit" class="types" id="dark" name="typeID" value="17">Dark</button>
                </form>
            </td>
            <td><form action="pokemon-types.php" method="get">
                    <input type="hidden" name="typeName" value ="Fairy">
                    <button type="submit" class="types" id="fairy" name="typeID" value="18">Fairy</button>
                </form>
            </td>
        </tr>
        
        
    </table>
    
    
    <?php
    include('../header.php');
    ?>
 
</body>
</html>