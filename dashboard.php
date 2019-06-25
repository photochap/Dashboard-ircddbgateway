<?php /*require_once('ircddblocal.php');*/
$configs = array();



if ($configfile = fopen($gatewayConfigPath,'r')) {

        while ($line = fgets($configfile)) {

                list($key,$value) = split("=",$line);

                $value = trim(str_replace('"','',$value));

                if ($key != 'ircddbPassword' && strlen($value) > 0)

                $configs[$key] = $value;

        }



}

$progname = basename($_SERVER['SCRIPT_FILENAME'],".php");

$rev="20120504";

$MYCALL=strtoupper($configs['gatewayCallsign']);

#These 2 numbers control the colour of the background for Repeaters, Links, etc

$col[0] = "#cccccc";

$col[1] = "#aaaaaa";

?>
<?php echo "<meta name=\"GENERATOR\" content=\"$progname $rev\">";

    ?>

      <table style= width:100%; border="0">
        <tbody>
          <tr >
            <th width=25%>
           <H3>Location<H3>
            </a></th>
            <th width=25%>
            <H3>Longtitude/Latitude</H3>
            </a></th>
            <th width=25%>
            <H3>ircDDBGateway Server</H3>
            </a></th>
            <th width=25%>
            <H3>APRS-Host</H3>
            </a></th>
          </tr>
          <tr >
<?php print "<td>$configs[description1]\n$configs[description2]</td>\n";

      print "<td>$configs[latitude]\n$configs[longitude]</td>\n";

      print "<td>$configs[ircddbHostname]</td>\n";

      if($configs['aprsEnabled'] == 1){ print "<td width=40>$configs[aprsHostname]</td>"; } else { print "<td width=40><img src=\"images/20red.png\"></td>";}

    ?>
          </tr>
        </tbody>
      </table>
      <table style= width:100%; border="0">
        <tbody>
          <tr >
            <th width=14%>
            <H3>DCS</H3></a></th>
            <th width=14%>
            <H3>DExtra</H3></a></th>
            <th width=14%>
            <H3>DPlus</H3>
            </a></th>
            <th width=14%>
            <H3>D-Rats</H3>
            </a></th>
            <th width=14%>
            <H3>Info</H3>
            </a></th>
            <th width=14%>
            <H3>Echo</H3>
            </a></th>
            <th width=14%>
            <H3>Log</H3>
            </a></th>
          </tr>
          <tr >
<?php if($configs['dcsEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

      if($configs['dextraEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

      if($configs['dplusEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

      if($configs['dratsEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

      if($configs['infoEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

      if($configs['echoEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

      if($configs['logEnabled'] == 1){print "<td width=40><img src=\"images/20green.png\"</td>"; } else { print "<td width=40><img src=\"images/20red.png\"</td>"; }

    ?>
          </tr>
        </tbody>
      </table>
      <H4>Repeaters:</H4>  
      <table style= width:100%; border="0">
        <tbody>
          <tr >
            <th width=14%>
            <H3>Repeater</H3>
            </a></th>
            <th width=14%>
            <H3>Module</H3>
            </a></th>
            <th width=14%>
            <H3>Frequency<br>Shift</H3>
            </a></th>
            <th width=14%>
            <H3>Antenna Height.<br>
Range</H3>
            </a></th>
            <th width=14%>
            <H3>Latitude<br>
Longitude</H3>
            </a></th>
            <th width=14%>
            <H3>Default reflector</H3>
            </a></th>
            <th width=14%>
            <H3>@Startup<br>
Reconnect</H3>
            </a></th>
          </tr>
<?php $tot = array(0=>"Never",1=>"Fixed",2=>"5 min",3=>"10 min",4=>"15 min",5=>"20 min",6=>"25 min",7=>"30 min",8=>"60 min",9=>"90 min",10=>"120 min",11=>"180 min",12=>"&nbsp;");

    $ci = 0;

    for($i = 1;$i < 5; $i++){

      $param="repeaterBand" . $i;

      if(isset($configs[$param])) {

	 $ci++;

        if($ci > 1) { $ci = 0; }

        print "<tr bgcolor=\"$col[$ci]\">";

        print "<td>$i</td>";

        $module = $configs[$param];

        print "<td>$module</td>";

        $param="frequency" . $i;

        $frequency = $configs[$param];

        $param="offset" . $i;

        $offset = $configs[$param];

        print "<td>$frequency<br>$offset Mhz</td>";

        $param="agl" . $i;

        $agl = $configs[$param];

        $param="rangeKms" . $i;

        $rangeKms = $configs[$param];

        print "<td>$agl m<br>$rangeKms Km</td>";

        $param="latitude" . $i;

        $latitude = $configs[$param];

        $param="longitude" . $i;

        $longitude = $configs[$param];

        print "<td>$latitude<br>$longitude</td>";

        $param="reflector" . $i;

        $reflector = $configs[$param];

        print "<td>$reflector</td>";

        $param="atStartup" . $i;

        if($configs[$param] == 1){print "<td>Yes<br>"; } else { print "<td>No <br>"; }

        $param="reconnect" . $i;

        $reconnect = $configs[$param];

        $t = $configs[$param]; print "$tot[$t]";

      }

    }

    ?>
        </tbody>
      </table>
      <H4>Links:</H4> 
      <table style= width:100%; border="0">
        <tbody>
          <tr >
            <th width=16%>
            <H3>Repeater</H3>
            </a></th>
            <th width=16%>
            <H3>Linked to</H3>
            </a></th>
            <th width=16%>
            <H3>Link Type</H3>
            </a></th>
            <th width=16%>
            <H3>Protocol</H3>
            </a></th>
            <th width=16%>
            <H3>Direction</H3>
            </a></th>
            <th width=16%>
            <H3>Last Change (UTC)</H3>
            </a></th>
          </tr>
<?php $ci = 0;

    $tr = 0;

    if ($linkLog = fopen($linkLogPath,'r')) {

        while ($linkLine = fgets($linkLog)) {

        $ci++;

	 if($ci > 1) { $ci = 0; }

	    print "<tr bgcolor=\"$col[$ci]\">";

           $tr++;

           $linkDate = "&nbsp;";

           $protocol = "&nbsp;";

           $linkType = "&nbsp;";

           $linkSource = "&nbsp;";

           $linkDest = "&nbsp;";

           $linkDir = "&nbsp;";

// Reflector-Link, sample:

// 2011-09-22 02:15:06: DExtra link - Type: Repeater Rptr: DB0LJ  B Refl: XRF023 A Dir: Outgoing

// 2012-04-03 08:40:07: DPlus link - Type: Dongle Rptr: DB0ERK B Refl: REF006 D Dir: Outgoing

// 2012-04-03 08:40:07: DCS link - Type: Repeater Rptr: DB0ERK C Refl: DCS001 C Dir: Outgoing

           if(preg_match_all('/^(.{19}).*(D[A-Za-z]*).*Type: ([A-Za-z]*).*Rptr: (.{8}).*Refl: (.{8}).*Dir: (.{8})/',$linkLine,$linx) > 0){

               $linkDate = $linx[1][0];

               $protocol = $linx[2][0];

               $linkType = $linx[3][0];

               $linkSource = $linx[4][0];

               $linkDest = $linx[5][0];

               $linkDir = $linx[6][0];

           }

// CCS-Link, sample:

// 2013-03-30 23:21:53: CCS link - Rptr: PE1AGO C Remote: PE1KZU   Dir: Incoming

           if(preg_match_all('/^(.{19}).*(CC[A-Za-z]*).*Rptr: (.{8}).*Remote: (.{8}).*Dir: (.{8})/',$linkLine,$linx) > 0){

               $linkDate = $linx[1][0];

               $protocol = $linx[2][0];

               $linkType = $linx[2][0];

               $linkSource = $linx[3][0];

               $linkDest = $linx[4][0];

               $linkDir = $linx[5][0];

	    }

// Dongle-Link, sample: 

// 2011-09-24 07:26:59: DPlus link - Type: Dongle User: DC1PIA   Dir: Incoming

// 2012-03-14 21:32:18: DPlus link - Type: Dongle User: DC1PIA Dir: Incoming

           if(preg_match_all('/^(.{19}).*(D[A-Za-z]*).*Type: ([A-Za-z]*).*User: (.{6,8}).*Dir: (.*)$/',$linkLine,$linx) > 0){

               $linkDate = $linx[1][0];

               $protocol = $linx[2][0];

               $linkType = $linx[3][0];

               $linkSource = "&nbsp;";

               $linkDest = $linx[4][0];

               $linkDir = $linx[5][0];

           }

 	    print "<td>$linkSource</td>";

	    print "<td>$linkDest</td>";

	    print "<td>$linkType</td>";

	    print "<td>$protocol</td>";

	    print "<td>$linkDir</td>";

	    print "<td>$linkDate</td>";

	    print "</tr>";

	}

	fclose($linkLog);

    }

    print "</tr>";

    if($tr == 0){

    print "<tr bgcolor=\"$col[1]\">";

    print "<td>&nbsp;</td>";

    print "<td>&nbsp;</td>";

    print "<td>&nbsp;</td>";

    print "<td>&nbsp;</td>";

    print "<td>&nbsp;</td>";

    print "<td>&nbsp;</td>";

    print "</tr>";

    }

?>
        </tbody>
      </table>
      <H4>Last 20 calls heard on <?php echo "$MYCALL" ?> :</H4>
       
      <table style= width:100%; border="0">
        <tbody>
          <tr >
            <th width=16%>
            <H3>Date &amp; Time (UTC)</H3>
            </a></th>
            <th width=16%>
            <H3>Call</H3>
            </a></th>
            <th width=16%>
            <H3>ID</H3>
            </a></th>
            <th width=16%>
            <H3>Yourcall</H3>
            </a></th>
            <th width=16%>
            <H3>Repeater1</H3>
            </a></th>
            <th width=16%>
            <H3>Repeater2</H3>
            </a></th>
          </tr>
<?php // Headers.log sample:

// 0000000001111111111222222222233333333334444444444555555555566666666667777777777888888888899999999990000000000111111111122

// 1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901

// 2012-06-05 12:18:41: DCS header - My: PU2ZHZ  /T     Your: CQCQCQ    Rpt1: PU2ZHZ B  Rpt2: DCS007 B  Flags: 00 00 00

// 2012-05-29 21:33:56: DPlus header - My: PD1RB   /IC92  Your: CQCQCQ    Rpt1: PE1RJV B  Rpt2: REF017 A  Flags: 00 00 00

// 2013-02-09 13:49:57: DExtra header - My: DO7MT   /      Your: CQCQCQ    Rpt1: XRF001 G  Rpt2: XRF001 C  Flags: 00 00 00

//

    exec('(grep -v "  /TIME" '.$hdrLogPath.'|sort -r -k7,7|sort -u -k7,8|sort -r|head -20 >/tmp/lastheard.log) 2>&1 &');

    $ci = 0;

    if ($LastHeardLog = fopen("/tmp/lastheard.log",'r')) {

	while ($linkLine = fgets($LastHeardLog)) {

            if(preg_match_all('/^(.{19}).*My: (.*).*Your: (.*).*Rpt1: (.*).*Rpt2: (.*).*Flags: (.*)$/',$linkLine,$linx) > 0){

		$ci++;

		if($ci > 1) { $ci = 0; }

		print "<tr bgcolor=\"$col[$ci]\">";

                $QSODate = $linx[1][0];

                $MyCall = substr($linx[2][0],0,8);

                $MyId = substr($linx[2][0],9,4);

                $YourCall = $linx[3][0];

                $Rpt1 = $linx[4][0];

                $Rpt2 = $linx[5][0];

		print "<td>$QSODate</td>";

		print "<td>$MyCall</td>";

		print "<td>$MyId</td>";

              	print "<td>$YourCall</td>";

		print "<td>$Rpt1</td>";

		print "<td>$Rpt2</td>";

		print "</tr>";

	    }

	}

	fclose($LastHeardLog);

    }

?>
        </tbody>
      </table>
      <H4>Last calls that used <?php echo "$MYCALL" ?> :</H4>
       
      <table style= width:100%; border="0">
        <tbody>
          <tr >
            <th width=16%>
            <H3>Date &amp; Time (UTC)</H3>
            </a></th>
            <th width=16%>
            <H3>Call</H3>
            </a></th>
            <th width=16%>
            <H3>ID</H3>
            </a></th>
            <th width=16%>
            <H3>Yourcall</H3>
            </a></th>
            <th width=16%>
            <H3>Repeater1</H3>
            </a></th>
            <th width=16%>
            <H3>Repeater2</H3>
            </a></th>
          </tr>


<?php // Headers.log sample:

// 0000000001111111111222222222233333333334444444444555555555566666666667777777777888888888899999999990000000000111111111122

// 1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901

// 2012-05-29 20:31:53: Repeater header - My: PE1AGO  /HANS  Your: CQCQCQ    Rpt1: PI1DEC B  Rpt2: PI1DEC G  Flags: 00 00 00

//

    exec('(grep "Repeater header" '.$hdrLogPath.'|sort -r -k7,7|sort -u -k7,8|sort -r >/tmp/worked.log) 2>&1 &');

    $ci = 0;

    if ($WorkedLog = fopen("/tmp/worked.log",'r')) {

	while ($linkLine = fgets($WorkedLog)) {

            if(preg_match_all('/^(.{19}).*My: (.*).*Your: (.*).*Rpt1: (.*).*Rpt2: (.*).*Flags: (.*)$/',$linkLine,$linx) > 0){

		$ci++;

		if($ci > 1) { $ci = 0; }

		print "<tr bgcolor=\"$col[$ci]\">";

                $QSODate = $linx[1][0];

                $MyCall = substr($linx[2][0],0,8);

                $MyId = substr($linx[2][0],9,4);

                $YourCall = $linx[3][0];

                $Rpt1 = $linx[4][0];

                $Rpt2 = $linx[5][0];

		print "<td>$QSODate</td>";

		print "<td>$MyCall</td>";

		print "<td>$MyId</td>";

              	print "<td>$YourCall</td>";

		print "<td>$Rpt1</td>";

		print "<td>$Rpt2</td>";

		print "</tr>";

	    }

	}

	fclose($WorkedLog);

    }

?>
