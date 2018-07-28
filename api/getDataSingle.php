<?php

require "db_config.php";

if (isset($_GET["title"])) { 
	$title  = $_GET["title"]; 
}
else {
	$data["data"] = null;
	echo(json_encode(utf8ize($data)));
	return;
}

$sql = "SELECT * FROM glimpse WHERE title = '$title' order by type"; 

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