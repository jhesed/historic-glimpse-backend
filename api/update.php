<?php
require 'db_config.php';


  $id  = $_POST["id"];
  $post = $_POST;

  $sql = "UPDATE glimpse SET title = '".$post['title']."'

    ,content = '".$post['content']."' 

    WHERE id = '".$id."'";

  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM glimpse WHERE id = '".$id."'"; 

  $result = $mysqli->query($sql);

  $data = $result->fetch_assoc();


echo json_encode($data);
?>