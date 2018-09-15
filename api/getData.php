<?php
header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

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

// $sql = "SELECT glimpse_date, heading, type FROM glimpse WHERE glimpse_date like '%$date_range%' ORDER BY glimpse_date ASC LIMIT $start_from, $num_rec_per_page"; 

$sql = "SELECT glimpse_date, heading, type FROM glimpse WHERE glimpse_date like '%$date_range%' ORDER BY glimpse_date ASC"; 

$result = $mysqli->query($sql);
$json = null;

$last_glimpse_date = null;

$reult_array = [];  // holder for result

while($row = $result->fetch_assoc())
{ 

    $json["glimpse_date"] = $row["glimpse_date"];

    if ($row["type"] == 0) {
        $json["heading_world"] = $row["heading"];
    }
    else if ($row["type"] == 1) {
        $json["heading_phil"] = $row["heading"];
    }

    // Update last glimpse date
    if ($last_glimpse_date == $row["glimpse_date"]) {    
        $result_array[] = $json;
        $json = null;
    }

    $last_glimpse_date = $row["glimpse_date"];
}

// Append last index
if ($json != null) {
  $result_array[] = $json;
}

$data["data"] = $result_array;

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
