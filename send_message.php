<?php
    session_start();
    header("Content-Type:application/json");
    include("database_con.php");
    include "validate_input.php";

    $to_id = intval($_POST['to_id']);
    $to_type = $_POST['to_type'];
    $from_id = $_SESSION['user_id'];
    $from_type = $_SESSION['user_type'];
    $message = validate_input($_POST['message']);
    if (empty($message) && empty($_FILES["file"]["name"])) {
        echo json_encode(array('bool' => false, 
                               'message' => 'Message cannot be empty.'));
        exit();
    }
    if(!empty($_FILES["file"]["name"])){
        $file_name = uniqid()."".mysqli_real_escape_string($db, $_FILES["file"]["name"]);
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_type = mysqli_real_escape_string($db, $_FILES["file"]["type"]);
        $file_size = $_FILES["file"]["size"];

        $file_type = $_FILES['file']['type']; //returns the mimetype

        $allowed = array("image/jpg","image/png","image/jpeg", "image/gif",
         "application/pdf","application/doc","application/docx","application/xls",
         "application/xlsx","application/ppt","application/pptx","application/zip",
         "application/rar","application/7z");
         
        if(!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif, and pdf files are allowed.';
            $error = 'yes';
            echo json_encode(array('bool' => false, 
                               'message' => $error_message));
            exit();
        }


        if($file_size>2*1024*1024){
            echo json_encode(array('bool' => false, 
            'message' => 'File size must no exceed 2Mo'));
            exit();
        }
        $data = base64_encode(file_get_contents($file_tmp));
        $query = "INSERT INTO chat 
        (emetteur, type_emetteur, recepteur, type_recepteur, message, file_size, file_name, file_type, data) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "sssssisss", $from_id, $from_type, $to_id, $to_type, $message, $file_size, $file_name, $file_type, $data);
    } else {
        $file_name = NULL;
        $file_tmp = NULL;
        $file_type = NULL;
        $file_size = NULL;
        $data = NULL;
        $query = "INSERT INTO chat (emetteur, type_emetteur, recepteur, type_recepteur, message, file_size, file_name, file_type, data) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "sssssssss", $from_id, $from_type, $to_id, $to_type, $message, $file_size, $file_name, $file_type, $data);
    }
    if(mysqli_stmt_execute($stmt)){
        if(isset($file_name)){
            if(move_uploaded_file($_FILES['file']['tmp_name'], "./uploads/$file_name")){
                $bool = true;
            } else {
                $bool = false;
            }
        } else {
            $bool = true;
        }
    }
    
    echo json_encode(array(
        'bool'=>$bool,
        'to_id'=>$to_id,
        'to_type'=>$to_type,
        'message'=>$message,
        'file_name'=>$file_name
    ));
?>