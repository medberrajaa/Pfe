<?php
        
        include('database_con.php');
        include('validate_input.php');
        
            $code = intval(validate_input($_POST['code']));
            echo $_POST['email'];
            $query="SELECT verification_code from utilisateur WHERE email=?";
            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (!$result) {
                die("Query failed: " . mysqli_error($db));
            }
            $user = $result->fetch_array();
            if($user['verification_code'] == $code){
                $update="UPDATE utilisateur SET verified_at=CURRENT_TIMESTAMP WHERE email='".$_POST['email']."'";
                $update_stmt = mysqli_prepare($db, $update);
                if(mysqli_stmt_execute($update_stmt)){
                    header("location:login.php");
                    exit();
                }
            }else{
                header("location:verification_form.php?email=".$_POST['email']."&error=wrong code");
            }
            
        

    ?>