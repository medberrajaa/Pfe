<?php
    session_start();
    include("validate_input.php");
    include("database_con.php");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if (!empty($_POST['email'])) {
            if(!empty($_POST['password'])){
                $username = validate_input($_POST['email']);
                $password = md5(validate_input($_POST['password']));
                $request ="SELECT id,email,nom,user_type FROM docteur WHERE email=? AND motdepasse=?
                           UNION
                           SELECT id,email,nom,user_type FROM utilisateur WHERE email=? AND motdepasse=?";
                $stmt = mysqli_prepare($db, $request);
                mysqli_stmt_bind_param($stmt, "ssss", $username, $password,$username, $password);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$result) {
                    die("Query failed: " . mysqli_error($db));
                }
                $user = $result->fetch_array();
                if($user){
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nom'];
                    $_SESSION['user_lname'] = $user['prenom'];

                    $_SESSION['user_email'] = $user['email'];
                    $_SESSION['user_type'] = $user['user_type'];
                    $_SESSION['status'] = "online";
                    $update="UPDATE ".$user['user_type']." SET statue='online' WHERE id=".$user['id'];
                    $update_stmt = mysqli_prepare($db, $update);
                    mysqli_stmt_execute($update_stmt);
                    header('Location:index.php');
                    exit(); 
                }else{
                    header('Location:login.php?error=Invalid login credentials!');
                    exit(); 
                }
            }else{
                header('Location:login.php?error=Please enter password');
                exit();
            }
        }else{ 
            header('Location:login.php?error=Please enter the email');
            exit();
        }
    }
?>