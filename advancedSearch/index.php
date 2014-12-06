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
	<br />
	<br />
	<br />
	<form>
	<input type="radio" name="sex" value="male" checked>Male
	<br>
	<input type="radio" name="sex" value="female">Female
	</form>

	<br />

	type checkfields:
<form>
	<input type="checkbox" name="type" value="Fire" checked>Fire
	<br>
	<input type="checkbox" name="type" value="Water">Water
	</form>

	<br />
	sort by: (stat name)
	<br />
	how to sort: (max, min, avg)

  </body>
</html>

<?php
include('../header.php');
?>