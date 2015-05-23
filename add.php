 <?php

$cookie = "xxxxxxxxxxxxxx"; // alldebrid uid cookie
   
if (isset($_POST[magnet]))
  {
  $tntmain = $_POST["magnet"];
  $tnt = urldecode($tntmain);
  $decoded = urldecode($_POST[magnet]);
  $headers = "Content-Type: application/x-www-form-urlencoded; charset=utf-8";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_REFERER, 'http://www.alldebrid.com/torrent/');
  curl_setopt($ch, CURLOPT_URL, 'http://upload.alldebrid.com/uploadtorrent.php');
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Cookie: uid=" . $cookie
  ));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'uid=221be45c1378653e55b18fd9&domain=http%3A%2F%2Fwww.alldebrid.com%2Ftorrent%2F&magnet=' . urlencode($_POST[magnet]) . '&quick=1&value=Convert%20this%20torrent');
  $returndata = curl_exec($ch);
  curl_close($ch);
  $string = $_POST[magnet];
  preg_match("/&dn=(.*?)&/", $string, $display);
  $report = urldecode($display[1]) . ' - Torrent Added Successfully.';
  echo $report;
  }

?>
 
 
                
<br /> 
          <center> <form action="" method="post">
            <input type="text" placeholder="Paste your torrent magnet link." name="magnet" required>  <input type="submit">
   
 <br />
            </form></center>
