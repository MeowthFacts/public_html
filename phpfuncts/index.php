#!/usr/local/bin/php
<?php
include("../header.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auto Complete Input box</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">    
    <link href="../css/styles.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />


</head>

<body>
<br /><br /><br />
    <label>Tag:</label>
    <input name="tag" type="text" id="tag" size="20"/>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
<script>
echo('Hello');
$(document).ready(function(){
 $("#tag").autocomplete("autocomplete.php", {
		selectFirst: true
	});
});
</script>
</body>
</html>