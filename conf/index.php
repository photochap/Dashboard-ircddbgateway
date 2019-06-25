<?php
//
// Configuration program for G4KLX OpenDV
//
// (C) Hans-J. Barthen DL5DI
//
// 20130413 dl5di:  initial version
// 20131019 dl5di:  bugfix, repeater configfile does not exist
//
//

require_once('ircddblocal.php');

$configs = array();

if ($configfile = fopen($gatewayConfigPath,'r')) {
        while ($line = fgets($configfile)) {
                list($key,$value) = split("=",$line);
                $value = trim(str_replace('"','',$value));
            	$configs[$key] = $value;
		if(!isset($_POST['$key'])) $_POST[$key] = $value;
        }
}

$progname = basename($_SERVER['SCRIPT_FILENAME'],".php");
$rev="20131019";
$MYCALL=strtoupper($callsign);
$col[0] = "#f0f0f0";
$col[1] = "#f0f0a0";

$langarr=array("English (UK)","Deutsch","Dansk","Italiano","Francais","Espanol","Svnska","Polski","English (US)","Nederlands (NL)","Nederland (BE)");
$maxlang = 11;
if(!isset($_POST['language'])) $_POST['language'] = $configs['language'];
$langidx = $_POST['language'];

$helptext = array();
$helpfilename = "opendv-" . $langidx . ".hlp";
if ($helpfile = fopen($helpfilename,'r')) {
	while ($line = fgets($helpfile)) {
		list($key,$value) = split("=",$line);
		$value = trim(str_replace('"','',$value));
		$helptext[$key] = "<font size=-2>" . $value. "</font>";
	}
}
?>

<html xmlns="http://www.w3.org/1999/xhtml"xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <meta name="robots" content="index">
    <meta name="robots" content="follow">
    <meta name="language" content="English">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <?php
	echo "<meta name=\"GENERATOR\" content=\"$progname $rev\">";
    ?>
    <meta name="Author" content="Hans-J. Barthen (DL5DI)">
    <meta name="Description" content="G4KLX OpenDV configuration tool">
    <meta name="KeyWords" content="Hamradio,ircDDBGateway,OpenDV,D-Star,G4KLX,DL5DI">
    <title>OpenDV Configuration<?php echo "$MYCALL" ?></title>
    <LINK REL="stylesheet" type="text/css" href="css/ircddb.css">
    </head>
<body>

    <br><font size=+1><b>Configuration of OpenDV Gateway <?php print $MYCALL ?></b><br></font><br>
	
    <table BORDER=1 BGCOLOR=white>
    <font size=-1>
    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>Software version=</td>
		<td align=left width=333>&nbsp;</td>
		<td align=left width=333> <?php print php_uname() ?> </td>
	</tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>gatewayCallsign=<b><?php echo $_POST['gatewayCallsign'] ?></b></td>
		<td align=left width=333>gatewayAddress=<b><?php echo $_POST['gatewayAddress']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>icomAddress=<b><?php echo $_POST['icomAddress']; ?></b></td>
		<td align=left width=333>icomPort=<b><?php echo $_POST['icomPort']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>hbAddress=<b><?php echo $_POST['hbAddress']; ?></b></td>
		<td align=left width=333>hbPort=<b><?php echo $_POST['hbPort']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>latitude=<b><?php echo $_POST['latitude']; ?></b></td>
		<td align=left width=333>longitude=<b><?php echo $_POST['longitude']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>description1=<b><?php echo $_POST['description1']; ?></b></td>
		<td align=left width=333>description2=<b><?php echo $_POST['description2']; ?></b></td>
		<td align=left width=333>url=<b><?php echo $_POST['url']; ?></b></td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>ircddbEnabled=<b><?php echo $_POST['ircddbEnabled']; ?></b></td>
		<td align=left width=333>ircddbHostname=
												<?php if ($_POST['ircddbHostname']==1) echo "group1-irc.ircddb.net"; ?>
												<?php if ($_POST['ircddbHostname']==2) echo "group2-irc.ircddb.net"; ?>
												<p><?php echo $_POST['ircddbHostname']; ?>
	</td>	
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>ircddbUsername=<b><?php echo $_POST['ircddbUsername']; ?></b></td>
		<td align=left width=333>ircddbPassword=<b><?php echo $_POST['ircddbPassword']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>aprsEnabled=<b><?php echo $_POST['aprsEnabled']; ?></b></td>
		<td align=left width=333>aprsHostname=<b><?php echo $_POST['aprsHostname']; ?></b></td>
		<td align=left width=333>aprsPort=<b><?php echo $_POST['aprsPort']; ?></b></td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>dextraEnabled=<b><?php echo $_POST['dextraEnabled']; ?></b></td>
		<td align=left width=333>dextraMaxDongles=<b><?php echo $_POST['dextraMaxDongles']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>dplusEnabled=<b><?php echo $_POST['dplusEnabled']; ?></b></td>
		<td align=left width=333>dplusMaxDongles=<b><?php echo $_POST['dplusMaxDongles']; ?></b></td>
		<td align=left width=333>dplusLogin=<b><?php echo $_POST['dplusLogin']; ?></b></td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>ccsEnabled=<b><?php echo $_POST['ccsEnabled']; ?></b></td>
		<td align=left width=333>ccsHost=<b><?php echo $_POST['ccsHost'] ?></b></td>	
		<td align=left width=333>dcsEnabled=<b><?php echo $_POST['dcsEnabled']; ?></b></td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>remoteEnabled=<b><?php echo $_POST['remoteEnabled']; ?></b></td>
		<td align=left width=333>remotePort=<b><?php echo $_POST['remotePort']; ?></b></td>
		<td align=left width=333>remotePassword=<b><?php echo $_POST['remotePassword']; ?></b></td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>language=<?php for($i=0;$i<=$maxlang-1;$i++) if ($i==$_POST['language']+1) echo "$langarr[$i]<br>";?></td>	
			<td align=left width=333>&nbsp;</td>
			<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>echoEnabled=<b><?php echo $_POST['echoEnabled']; ?></b></td>
		<td align=left width=333>infoEnabled=<b><?php echo $_POST['infoEnabled']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>logEnabled=<b><?php echo $_POST['logEnabled']; ?></b></td>
		<td align=left width=333>nolog=<b><?php echo $_POST['nolog']; ?></b></td>
		<td align=left width=333>logPath=<b><?php echo $_POST['description1']; ?></b></td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>dratsEnabled=<b><?php echo $_POST['dratsEnabled']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[0]" ?> >
		<td align=left width=333>dtmfEnabled=<b><?php echo $_POST['dtmfEnabled']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
		<td align=left width=333>&nbsp;</td>
    </tr>

    <tr <?php echo "bgcolor=$col[1]" ?> >
		<td align=left width=333>autostartEnabled=<b><?php echo $_POST['autostartEnabled']; ?></b></td>
		<td align=left width=333>&nbsp;</td>
		<td align=left width=333>&nbsp;</td>
    </tr>
    </table>

<?php
    $rptrparms=array("repeaterCall","repeaterBand","repeaterType","repeaterAddress","repeaterPort","reflector","atStartup","reconnect","frequency","offset","rangeKms","latitude","longitude","agl","description1_","description2_","url");
    $rptrparmtype=array("text","text","text","text","text","text","text","checkbox","text","text","text","text","text","text","text","text","text");
    $rptrparmlen=array("8","2","1","15","5","8","0","1","8","7","4","9","9","3","20","20","40");
// element 1-17
    $maxi = 17;

    $bandarr=array("A","B","C","D","E","AD","BD","CD","DD");
    $maxband=9;


?>    
    <table BORDER=1 BGCOLOR=white>
    <tr bgcolor=black>
		<th width=250><font color=white><center><b>Repeater 1</b></center></font>
<b>Repeater 1</b></th>
		<th width=250><font color=white><center><b>Repeater 2</b></center></font>
<b>Repeater 2</b></th>
		<th width=250><font color=white><center><b>Repeater 3</b></center></font>
<b>Repeater 3</b></th>
		<th width=250><font color=white><center><b>Repeater 4</b></center></font>
<b>Repeater 4</b></th>
    </tr>

<?php
    print"<tr bgcolor=$col[1]><td align=left width=250>SW-version=</td><td align=left width=250>SW-version=</td><td align=left width=250>SW-version=</td><td align=left width=250>SW-version=</td>";
    $k=0;
    for($i=0;$i<$maxi;$i++){
		print"<tr bgcolor=$col[$k]>";
		$k++;
		if ($k > 1) $k=0;
		for($j=1;$j<5;$j++){
			$act = "repeaterBand" . $j;
			$var = $rptrparms[$i] . $j;
			$type = $rptrparmtype[$i] . $j;
			if(strlen($configs[$act]) > 0){
				$fontcolor = "black";
			} else {
				$fontcolor = "lightgrey";
			}
			if(isset($configs[$var])){
				print "<td align=left width=250> <font color=$fontcolor>$var=<b>$configs[$var]</b></td>";
			} else {
				print "<td align=left width=250> <font color=$fontcolor>$var=&nbsp;</td>";
			}
		}
		print"</tr>";
    }
?>
    </table>
    <P>

    <table BORDER=1 BGCOLOR=white>
    <tr bgcolor=black>
		<th width=250><font color=white><center><b>StarNetServer 1</b></center></font>
<b>StarNetServer 1</b></th>
		<th width=250><font color=white><center><b>StarNetServer 2</b></center></font>
<b>StarNetServer 2</b></th>
		<th width=250><font color=white><center><b>StarNetServer 3</b></center></font>
<b>StarNetServer 3</b></th>
		<th width=250><font color=white><center><b>StarNetServer 4</b></center></font>
<b>StarNetServer 4</b></th>
		<th width=250><font color=white><center><b>StarNetServer 5</b></center></font>
<b>StarNetServer 5</b></th>
    </tr>

<?php

	$stnparms=array("starNetBand","starNetCallsign","starNetLogoff","starNetInfo","starNetPermanent","starNetUserTimeout","starNetGroupTimeout","starNetCallsignSwitch","starNetTXMsgSwitch","starNetReflector");
// element 1-10 
    $maxi=10;
    for($i=0;$i<$maxi;$i++){
		print"<tr bgcolor=$col[$k]>";
		$k++;
		if ($k > 1) $k=0;
		for($j=1;$j<6;$j++){
			$var = $stnparms[$i] . $j;
			if(isset($configs[$var])){
				print "<td align=left width=250>$var=$configs[$var]</td>";
			} else {
				print "<td align=left width=250>$var=&nbsp;</td>";
			}
		}
		print"</tr>";
	}
    print"</table>";

    for ($i=1;$i<5;$i++){
		$rptrConfigPath = "$sysConfigPath/repeater_$i";
		if (file_exists($rptrConfigPath)) {
			if ($rconfigfile = fopen($rptrConfigPath,'r')) {
				while ($line = fgets($rconfigfile)) {
					list($key,$value) = split("=",$line);
					$value = trim(str_replace('"','',$value));
					$rptrparms[$key] = $value;
				}
			}
		}
    }
?>

    <P>
    <font size=+1><b>Configuration of OpenDV Repeaters connected to Gateway <?php print $MYCALL ?></b><br></font><br>
    <table BORDER=0><tr><td valign=top>
    <font size=-1>
<?php
    $k = 0;
    for($i=1;$i<5;$i++){
	
		$param = "repeaterBand" . $i;
		if(strlen($configs[$param]) == 0){
			continue;
		}
		$sysConfigFilename = $sysConfigPath . "/" . "repeater_" . $i;
		if ($sysConfigFile = fopen($sysConfigFilename,'r')) {
			echo"<table BORDER=1>";
			while ($line = fgets($sysConfigFile)){
				# DAEMON_PATH=/usr/local/bin/dvrptrrepeaterd
				list($key,$value) = split("=",$line);
				if($key == DAEMON_PATH){
					$temp = explode("/",$value);
					end($temp);
					$rptrdaemon = rtrim(current($temp),"d\r\n");;
					$rptrConfigFilename = $configPath . "/" . $rptrdaemon . "_" . $i;
					if ($rptrConfigFile = fopen($rptrConfigFilename,'r')) {
						echo "<tr bgcolor=black> <th width=250><a class=\"tooltip\" href=\"#\"><font color=white><center><b>Repeater $i</b></center></font>
<b>Repeater $i</b></th></tr>";
						$k=0;
						while ($line = fgets($rptrConfigFile)){
							list($key,$value) = split("=",$line);
							$rptrconfigs[$key] = $value;
							if(strlen($key) < 3){
								$k++;
								continue;
							}
							if (isset($rptrconfigs[$key])){
								$color=$col[$k];
								if($key == "gatewayAddress"){
									if((trim($rptrconfigs[$key]) == $configs["hbAddress"]) || (trim($rptrconfigs[$key]) == $configs["icomAddress"])){
										$color="green";
									} else {
										$color="red";
									}
								} elseif($key == "gatewayPort"){
									if((trim($rptrconfigs[$key]) == $configs["hbPort"]) || (trim($rptrconfigs[$key]) == $configs["icomPort"])){
										$color="green";
									} else {
										$color="red";
									}
								} elseif($key == "localAddress"){
									$parm = "repeaterAddress" . $i;
									if(trim($rptrconfigs[$key]) == $configs[$parm]){
										$color="green";
									} else {
										$color="red";
									}
								} elseif($key == "localPort"){
									$parm = "repeaterPort" . $i;
									if(trim($rptrconfigs[$key]) == $configs[$parm]){
										$color="green";
									} else {
										$color="red";
									}
								}
								echo "<tr bgcolor=$color><td align=left width=250>$key=$rptrconfigs[$key]</td></tr>";				
							} else {
								echo "<tr bgcolor=$col[$k]><td align=left width=250>$key=&nbsp;</td></tr>";
							}
							$k++;
							if ($k > 1) $k=0;
						}
					}
				}
			}
			echo"</table></td><td valign=top>";
		}
    }
?>
    </td></tr></table>

    </table>
    <br><?php echo "$progname $rev"; ?>

<br>
&copy;2013 Hans-J. Barthen DL5DI
</body>
