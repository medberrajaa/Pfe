<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        .form-container input[type="submit"] {
            background-color: lightblue;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: lightblue;
        }
</head>
<body>
<?php
    
    session_start();
    include("database_con.php");
    include "validate_input.php";
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
            header("Location:ajout_question.php?error=Empty credentials");
            exit();
        }else{
            $email = mysqli_real_escape_string($db, validate_input($_POST['email']));
            $lname = mysqli_real_escape_string($db, validate_input($_POST['lname']));
            $fname = mysqli_real_escape_string($db, validate_input($_POST['fname']));
        }
    }
    if (empty($_POST['description']) || empty($_POST['titre'])) {
        header("Location:ajout_question.php?error=description ou titre vide!");
        exit();
    }else{
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $titre = mysqli_real_escape_string($db, $_POST['titre']);
        
    
        $query = "INSERT INTO question (question, description,user_id, user_type,email,nom,prenom) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ssissss", $titre, $description, $from_id, $from_type,$email,$fname,$lname);
        if(mysqli_stmt_execute($stmt)){
            header("Location:forum_page.php");
            exit();
        }
        else{
            echo "Error";
        }
    }
    
    ?>
</body>
</html>