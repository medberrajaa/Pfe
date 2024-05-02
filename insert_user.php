<?php
    include("validate_input.php");
    include("database_con.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once('./PHPMailer/src/PHPMailer.php');
    require_once('./PHPMailer/src/SMTP.php');
    require_once('./PHPMailer/src/Exception.php');
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email'])
        || !isset($_POST['password']) || !isset($_POST['gender']) || !isset($_POST['age']) 
        || !isset($_POST['confirm-password'])){
            header("location:register_user.php?error=Please insert in all fields");
            exit();
        }
        // Get the values from the form
        $name = validate_input($_POST['nom']);
        $prenom = validate_input($_POST['prenom']);
        $email = validate_input($_POST['email']);
        $password = md5(validate_input($_POST['password']));
        $gender = validate_input($_POST['gender']);
        $age = validate_input($_POST['age']);
        $age = intval(validate_input($age));
        $confirm_password = md5(validate_input($_POST['confirm-password']));
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        
        if($password != $confirm_password){
            header("location:register_user.php?error=Please enter the correct password!");
            exit();
        }
        $query = "SELECT email FROM utilisateur where email=? 
                  UNION
                  SELECT email FROM docteur where email=?";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ss",$email,$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
            header("location:register_user.php?error=email already exists");
            exit();
        }
        // Create the SQL INSERT statement
        $sql = "INSERT INTO utilisateur (prenom,nom, email, motdepasse, gender, age,verification_code) 
                VALUES ('$prenom', '$name', '$email', '".$password."', '$gender', '$age','$verification_code')";


        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'medberrajaa30@gmail.com';
            $mail->Password = 'ypxplngssocbxdad';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            // Sender and recipient details 
            $mail->setFrom('medberrajaa30@gmail.com', 'Psycho MA');
            $mail->addAddress($email, "test");
            
            // Email subject and body
            $mail->Subject = 'Verification Code';
            $mail->Body = 'your verification code is '.$verification_code;
        
            // Send email
            $mail->send();
            echo 'Email sent successfully.';
        } catch (Exception $e) {
            echo 'Email failed to send. Error message: ' . $mail->ErrorInfo;
        }
        // Execute the SQL statement and check if it was successful
        if (mysqli_query($db, $sql)){    
            header("Location:verification_form.php?email=".base64_encode($email)."");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
?>