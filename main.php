
<?php


$ch = curl_init();
$uname = $_POST["uname"];
$platform = $_POST["platform"];

curl_setopt($ch, CURLOPT_URL, "https://api.fortnitetracker.com/v1/profile/" . $platform . "/" . $uname);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'TRN-Api-Key: f5f1d826-52d5-4bae-812e-69aa232ad5d2'
));
$response = curl_exec($ch);
curl_close($ch);
$fp = fopen("stats.json", "w");
fwrite($fp, $response);
fclose($fp);


$data = json_decode(file_get_contents("stats.json"));
$solo = $data->stats->p2;//solos data
$duos = $data->stats->p10;//duos data
$squads = $data->stats->p9;//squads data
$solo_wins = $solo->top1->valueInt;
$solo_winsten = $solo->top10->valueInt;
$solo_winstwentyfive = $solo->top25->valueInt;

$duos_wins = $duos->top1->valueInt;
$duos_winsfive = $duos->top5->valueInt;
$duos_winstwelve = $duos->top12->valueInt;
$squads_wins = $squads->top1->valueInt;
$squads_winsthree = $squads->top3->valueInt;
$squads_winssix = $squads->top6->valueInt;
$solo_matches = $solo->matches->valueInt;
$duos_matches = $duos->matches->valueInt;
$squads_matches = $squads->matches->valueInt;
$solo_kd = $solo->kd->valueDec;
$duos_kd = $duos->kd->valueDec;
$squads_kd = $squads->kd->valueDec;
$solo_games = $solo->matches->valueInt;
$duos_games = $duos->matches->valueInt;
$squads_games = $squads->matches->valueInt;
$solo_kills = $solo->kills->valueInt;
$duos_kills = $duos->kills->valueInt;
$squads_kills = $squads->kills->valueInt;

?>

<html>
<body>
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<table style="width:100%">
  <tr class="head">
    <th class="selected">SOLO</th>
    <th>DUO</th> 
    <th>SQUAD</th>
  </tr>
  <tr class="display">
 
    <td><?php echo $solo_wins?><br><p>WINS</p></td>
    <td><?php echo $solo_winsten?><br><p>PLACES IN TOP 10</p></td>
    <td><?php echo $solo_winstwentyfive?><br><p>PLACES IN TOP 25</p></td>
    
  </tr>
  </table>
    <div class="main">
        <div>
            Kills <p><?php echo $solo_kills?></p>
        </div>
        <div>
            Matches Played <p ><?php echo $solo_matches?></p >
        </div>
        <div> K/D Ratio<p><?php echo $solo_kd?></p>
        </div>
    </div>

<br><br><br><br>

<table style="width:100%">
  <tr class="head">
    <th>SOLO</th>
    <th class="selected">DUO</th> 
    <th>SQUAD</th>
  </tr>
  <tr class="display">
 
    <td><?php echo $duos_wins?><br><p>WINS</p></td>
    <td><?php echo $duos_winsfive?><br><p>PLACES IN TOP 5</p></td>
    <td><?php echo $duos_winstwelve?><br><p>PLACES IN TOP 12</p></td>
    
  </tr>
  </table>
    <div class="main">
        <div>
            Kills <p><?php echo $duos_kills?></p>
        </div>
        <div>
            Matches Played <p ><?php echo $duos_matches?></p >
        </div>
        <div> K/D Ratio<p><?php echo $duos_kd?></p>
        </div>
    </div>


    <br><br><br><br>

<table style="width:100%">
  <tr class="head">
    <th>SOLO</th>
    <th>DUO</th> 
    <th class="selected">SQUAD</th>
  </tr>
  <tr class="display">
 
    <td><?php echo $squads_wins?><br><p>WINS</p></td>
    <td><?php echo $squads_winsthree?><br><p>PLACES IN TOP 3</p></td>
    <td><?php echo $squads_winssix?><br><p>PLACES IN TOP 6</p></td>
    
  </tr>
  </table>
    <div class="main">
        <div>
            Kills <p><?php echo $squads_kills?></p>
        </div>
        <div>
            Matches Played <p ><?php echo $squads_matches?></p >
        </div>
        <div> K/D Ratio<p><?php echo $squads_kd?></p>
        </div>
    </div>


</body>
</html>


   