<?php
    include("validate_input.php");
    include("database_con.php");
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email'])
        || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['age']) 
        || !isset($_POST['confirm-password'])){
            header("location:register_user.php?error=Please insert in all fields");
            exit();
        }
        // Get the values from the form
        $name = validate_input($_POST['name']);
        $prenom = validate_input($_POST['prenom']);
        $email = validate_input($_POST['email']);
        $password = validate_input($_POST['password']);
        $gender = validate_input($_POST['gender']);
        $age = validate_input($_POST['age']);
        $age = intval($age);
        $confirm_password = validate_input($_POST['confirm-password']);


        $file_name = $name."_".$prenom."_".mysqli_real_escape_string($db, $_FILES["file"]["name"]);
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_type = mysqli_real_escape_string($db, $_FILES["file"]["type"]);
        $file_size = $_FILES["file"]["size"];
        
        $allowed = array("image/jpg","image/png","image/jpeg");
        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg files are allowed.';
            $error = 'yes';
            echo json_encode(array('bool' => false, 'message' => $error_message));
            exit();
        }
        
        if ($file_size > 2*1024*1024) {
            echo json_encode(array('bool' => false, 'message' => 'File size must not exceed 2Mo'));
            exit();
        }
        
        if (isset($file_name)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], "./upload_doc_img/$file_name")) {
                $bool = true;
            } else {
                $bool = false;
            }
        }
        
        if($password != $confirm_password){
            header("location:register_user.php?error=Please confirm the password!");
            exit();
        }

        $query = "SELECT * FROM utilisateur where email=? 
        UNION
        SELECT * FROM docteur where email=?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ss",$email,$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
            header("location:register_user.php?error=email already exists");
            exit();
        }
        // Create the SQL INSERT statement
        $sql = "INSERT INTO docteur (prenom,nom, email, motdepasse, gendre, age) 
                VALUES ('$prenom', '$name', '$email', '".md5($password)."', '$gender', '$age')";
    
        // Execute the SQL statement and check if it was successful
        if (mysqli_query($db, $sql)) {
            header("Location:acceuil.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
?>