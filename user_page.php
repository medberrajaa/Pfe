<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aaa</title>
</head>
<body>
<?php
    session_start();
    include("database_con.php");
    if(!isset($_SESSION['user_type'])){
        header("location:acceuil.php");
        exit();
    }
    if($_SESSION['user_type'] == "utilisateur"){
        $sql="SELECT * FROM utilisateur WHERE id=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i",$_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            die("Query failed: " . mysqli_error($db));
        }
        $user = $result->fetch_array();
        echo $user['id']."  ".$user['nom']." ".$_SESSION['user_type'];
    }
    if($_SESSION['user_type'] == "docteur"){
        $sql="SELECT * FROM docteur WHERE id=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i",$_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            die("Query failed: " . mysqli_error($db));
        }
        $user = $result->fetch_array();
        echo $user['id']."  ".$user['nom']." ".$_SESSION['user_type'];
    }
?>
</body>
</html>