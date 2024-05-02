<?php
  session_start();
  include("database_con.php");

  $to_id = $_POST['to_id'];
  $to_type = $_POST['to_type'];
  $from_id = $_SESSION['user_id'];
  $from_type = $_SESSION['user_type'];


  $query = "SELECT * FROM `chat` WHERE (recepteur = ? AND type_recepteur = ? AND emetteur = ? AND type_emetteur = ?) OR (emetteur = ? AND type_emetteur = ? AND recepteur = ? AND type_recepteur = ?) ORDER BY temps ASC";
  $stmt = mysqli_prepare($db, $query);
  mysqli_stmt_bind_param($stmt, "ssssssss", $from_id, $from_type, $to_id, $to_type,$from_id , $from_type, $to_id, $to_type);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);


  $messages = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $file_name = $row['file_name'];
    $file_size = $row['file_size'];
    $file_type = $row['file_type'];
    $data = base64_encode($row['data']);
    $download_link = "<a style='text-decoration:none'  href='download.php?file_name=$file_name&file_size=$file_size&file_type=$file_type'><img class='zoomd' src='styles/images/download.png' alt='download_image'></a>";
    $messages[] = array(
      "message" => $row['message'],
      "sender" => $row['emetteur'],
      "sender_type" => $row['type_emetteur'],
      "reciever" => $row['recepteur'],
      "reciever_type" => $row['type_recepteur'],
      "time" => $row['temps'],
      "file_name" => $row['file_name'],
      "file_size" => $row['file_size'],
      "file_type" => $row['file_type'],
      "download_link" => $download_link
    );
  }
  header("Content-Type:application/json");
  echo json_encode($messages);
?>