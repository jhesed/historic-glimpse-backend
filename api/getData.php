<?php

require 'db_config.php';

$num_rec_per_page = 5;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };

$start_from = ($page-1) * $num_rec_per_page;

$sqlTotal = "SELECT * FROM glimpse";
$sql = "SELECT * FROM glimpse Order By id desc LIMIT $start_from, $num_rec_per_page"; 

  $result = $mysqli->query($sql);
  $json = null;
  while($row = $result->fetch_assoc()){
     $json[] = $row;
  }

  $data['data'] = $json;


$result =  mysqli_query($mysqli,$sqlTotal);

$data['total'] = mysqli_num_rows($result);

echo json_encode(utf8ize($data));

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

?>