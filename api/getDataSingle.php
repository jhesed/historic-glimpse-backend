<?php
header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

require "db_config.php";

if (isset($_GET["title"])) { 
	$title  = $_GET["title"]; 
}
else {
	$data["data"] = null;
	echo(json_encode(utf8ize($data)));
	return;
}

// Attempt to load exact date
$sql = "SELECT * FROM glimpse WHERE title = '$title' order by type"; 

$result = $mysqli->query($sql);
$json = null;
while($row = $result->fetch_assoc()){
 	$json[] = $row;
}

// If empty, load latest instead
if (is_null($json)) {
    $sql = "SELECT * FROM glimpse order by title desc, type"; 

    $result = $mysqli->query($sql);
    $json = null;
    while($row = $result->fetch_assoc()){
        $json[] = $row;
    }
}

$data["data"] = $json;

echo json_encode(utf8ize($data));
// echo json_encode($data);

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
exit();

?>
