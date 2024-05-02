<?php
    include("database_con.php");
    session_start();
    
    $update="UPDATE ".$_SESSION['user_type']." SET statue='offline' WHERE id=".$_SESSION['user_id'];
    $update_stmt = mysqli_prepare($db, $update);
    mysqli_stmt_execute($update_stmt);
    session_unset();
    session_destroy();
    header('Location:index.php');
    exit();
    
?>