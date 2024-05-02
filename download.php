<?php
  include("database_con.php");
  $file_name = $_GET['file_name'];
  $query = "SELECT data, file_name, file_type, file_size FROM chat WHERE file_name = ?";
  $stmt = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($stmt,"s",$file_name);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)){ 
      $name = $row['file_name'];
      $size =  $row['file_size'];
      $type = $row['file_type'];
      $image = base64_decode($row['data']);
  }
  header('Content-type:'.$type);
  header('Content-Disposition:attachment;filename="'.$name.'"');
  echo $image;
  exit();
?>