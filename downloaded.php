<head><title>Alldebrid Torrent Script</title><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<center><h1> Downloaded Torrents </h1></center>
<table aloign="center" class="table table-hover">
  <tr>
    <th><b>Name</b></th>
    <th><b>Size</b></th>
    <th><b>Links</b></th>
  </tr>

 <?php
$cookie = "xxxxxxxxxxxxxx"; // alldebrid uid cookie

function get_string_between($string, $start, $end)
  {
  $string = " " . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return "";
  $ini+= strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
  }

$url1 = 'http://www.alldebrid.com/api/torrent.php?json=true';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Cookie: uid=" . $cookie
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
$json = json_decode($result, true);

foreach($json as $key => $value)
  {
  if ($value[4] == "finished")
    {
?>


       
            <tr>
              <td>
                <?php
    echo $value['3']; ?>
              </td>
              <td><?php
    echo $value['5']; ?></td>
              <td><?php
    $dom = new DOMDocument();
    @$dom->loadHTML($value['10']);
    foreach($dom->getElementsByTagName('a') as $link)
      {
      $ddlink = $link->getAttribute('value');
      $bblink = substr($link->getAttribute('value') , 0, -3);
      $cclink = str_replace(",;,", "|", $bblink);
      echo '<form action="uptobox.php" method="post" name="uplink">
                               <input type="hidden" name="link" value="' . $value['10'] . '">                                                                              
                               <center><button type="submit" class="btn btn-xs btn-success"/ ><span class="glyphicon glyphicon-download"></span>  Download </button></center>
                                                                                                                               
                               </form>';
      }

?></td>
              </tr>
          
      
              
              
              
      <?php
    }
  } ?> </table>
