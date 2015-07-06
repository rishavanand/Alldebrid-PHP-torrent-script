<head><title>Alldebrid Torrent Script</title><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
  
<style>
 
 .label, .badge {
  display: inline-block;
  padding: 2px 4px;
  font-size: 11.844px;
  font-weight: bold;
  line-height: 14px;
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
  white-space: nowrap;
  vertical-align: baseline;
  background-color: #606060  ;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    margin-left: 0px
}

.label {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    margin-left: 0px
} 
 
 
.progress {
  height: 10px;
  margin-bottom: 0px;
   margin-top: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    margin-left: 0px
}

.progress {
  height: 10px;
  margin-bottom: 0px;
  overflow: hidden;
  background-color: #f7f7f7;
  background-image: -moz-linear-gradient(top,#f5f5f5,#f9f9f9);
  background-image: -webkit-gradient(linear,0 0,0 100%,from(#f5f5f5),to(#f9f9f9));
  background-image: -webkit-linear-gradient(top,#f5f5f5,#f9f9f9);
  background-image: -o-linear-gradient(top,#f5f5f5,#f9f9f9);
  background-image: linear-gradient(to bottom,#f5f5f5,#f9f9f9);
  background-repeat: repeat-x;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5',endColorstr='#fff9f9f9',GradientType=0);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right: 0px;
    margin-left: 0px
}  

  </style>

<center><h1> Downloading Torrents </h1></center>
<table aloign="center" class="table table-hover">
  <tr>
    <th><b>Name</b></th>
    <th><b>Details</b></th>
  </tr>

  
  <?php
    
$cookie = "xxxxxxxxxxxxxxxxx"; // alldebrid uid cookie

    
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
  if ($value[4] !== "finished")
    {
?>

       
            <tr>
                 
                 <td style="text-align:left"><?php
    echo $value['3']; ?></td>
              
                 <td>
                    <!--PROGRESS BAR START -->           
            <?php
    if ($value['4'] == "finished")
      {
      $percent = "100";
      }
      else
      {
      $percent_raw = get_string_between($value[4], "(", "%");
      $percent = substr($percent_raw, -2);
      } ?>
                   
                   <div class="progress progress-sm active">
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?php
    echo $percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php
    echo $percent; ?>%">
<span class="sr-only"><?php
    echo $percent; ?>% Complete</span>
</div>
</div> 
                   
                
          
<!--PROGRESS BAR END --> 
                     <span class="label size tip-top" data-original-title="Size">
         
                <?php
    echo $value['4']; ?></span>
              
                   <span class="label size tip-top" data-original-title="Size">
                   <?php
    echo $value['6']; ?></span>
              <span class="label size tip-top" data-original-title="Size">
         
                <?php
    echo $value['7']; ?></span>
                       <span class="label size tip-top" data-original-title="Size">
         
                <?php
    echo $value['8']; ?></span>
                   
                 
              
              </td>
       
              </tr>
              
              
              
      <?php
    }
  } ?> </table>
