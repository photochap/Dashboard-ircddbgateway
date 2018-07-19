<!DOCTYPE html>
<html lang="fr">
<header>
<?php require_once('ircddblocal.php'); ?>

<link rel="icon" href="./favicon.ico" type="image/vnd.microsoft.icon">

      <meta name="robots" content="index">
      <meta name="robots" content="follow">
      <meta name="language" content="French">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="Author" content="Hans-J. Barthen (DL5DI.)Changed/adapted for non ircddb registered Gateways by Hans Hommes )PE1AGO)">
      <meta name="Description" content="ircDDBGateway Dashboard">
      <meta name="KeyWords" content="Hamradio,ircDDBGateway,D-Star,ircDDB,DL5DI">
      
      <title><?php echo "$callsign" ?> Gateway</title>
      
      <link rel="stylesheet" type="text/css" href="ircddb.css">
      <link rel="stylesheet" type="text/css" href="cch.css">
      <meta http-equiv="refresh" content="60">


</header>
<body>
<div class='titre'>
<img src='./images/logo_02.png'><p>D-Star Gateway - F4HWB</p>
</div>
<div class='log'>
<?php
	require_once('dashboard.php');
?>
</div>
</body>
</html>
