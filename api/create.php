<?php
require 'db_config.php';

  $post = $_POST;
  // $glimpse_date = DateTime::createFromFormat('F-j', $post['glimpse_date'])->format('F-j');
  $sql = "INSERT INTO glimpse (glimpse_date, title, heading, content, prayer_focus, featured_verse, featured_quote, type) 

	VALUES ('".$post['title']."','".$post['glimpse_date']."','".$post['heading']."','".$post['content']."','".$post['prayer_focus']."','".$post['featured_verse']."','".$post['featured_quote']."','".$post['type']."')";

  error_log($sql);
  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM glimpse Order by id desc LIMIT 1"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();


echo json_encode($data);
?>