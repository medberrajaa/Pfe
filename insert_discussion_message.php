<?php
    session_start();
    include("database_con.php");
    include "validate_input.php";
    $question_id = validate_input($_POST['question_id']);
    if(!empty($_SESSION['user_id'])){
        $from_id = $_SESSION['user_id'];
        $from_type = $_SESSION['user_type'];
        $email = null;
        $lname = null;
        $fname = null;
    }else{
        $from_id = null;
        $from_type = null;
        if(empty($_POST['email']) || empty($_POST['lname']) || empty($_POST['fname'])){
            header("Location:question_page.php?id=$question_id&error=Empty credentials");
            exit();
        }else{
            $email = $_POST['email'];
            $lname = $_POST['lname'];
            $fname = $_POST['fname'];
        }
    }
    if (empty($_POST['message'])) {
        header("Location:question_page.php?id=$question_id&error=message empty");
        exit();
    }else{
        $message = validate_input($_POST['message']);
        $query = "INSERT INTO discussion (question_id, user_id, user_type, message,email,nom,prenom) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "iisssss", $question_id, $from_id, $from_type, $message,$email,$fname,$lname);
        if(mysqli_stmt_execute($stmt)){
            header("Location:question_page.php?id=$question_id");
            exit();
        }
        else{
            echo "Error";
        }
    }

?>