<?php

require "db_config.php";

$num_rec_per_page = 31;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
if (isset($_GET["date_range"])) { 
    $date_range  = $_GET["date_range"]; 
} 
else { 
    $data["data"] = null;
    echo(json_encode(utf8ize($data)));
    return; 
};

$start_from = ($page-1) * $num_rec_per_page;

$sql = "SELECT title, heading FROM glimpse WHERE glimpse_date like '%$date_range%' ORDER BY title desc LIMIT $start_from, $num_rec_per_page"; 

$result = $mysqli->query($sql);
$json = null;
while($row = $result->fetch_assoc()){
    $json[] = $row;
}

$data["data"] = $json;

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