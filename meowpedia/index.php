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




  <body>
      
<br /><br /><br /><br />
      
<div class="buttonBox"> 
<center>
    <button type="button" class="btn btn-custom" onclick="window.location.href='abilities.php'">ABILITIES</button>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='moves.php'">MOVES</button> 
	  <button type="button" class="btn btn-custom" onclick="window.location.href='egg-groups.php'">EGG GROUPS</button>
	  <button type="button" class="btn btn-custom" onclick="window.location.href='types.php'">TYPES</button>
</center>
</div>

      
<?php
include('../header.php');
?>


  </body>

</html>
