
<?php
    session_start();
    include("validate_input.php");
    include("database_con.php");
    include("facture.php");
    include('./PHPMailer/src/PHPMailer.php');
    include('./PHPMailer/src/SMTP.php');
    include('./PHPMailer/src/Exception.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    $request ="SELECT * FROM docteur WHERE id=?";
    $stmt = mysqli_prepare($db, $request);
    mysqli_stmt_bind_param($stmt, "s",$_GET['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die("Query failed: " . mysqli_error($db));
    }
    $id_facture = uniqid();
    $user = $result->fetch_array();
    if($user){
        $sql = "INSERT INTO paiement (userid,user_type, montant, docid, statue,id_facture) 
                VALUES ('".$_SESSION['user_id']."', '".$_SESSION['user_type']."', '".$user['montantconsult']."', '".$_GET['id']."', '".$_GET['status']."','".$id_facture."')";
                $mail = new PHPMailer(true);

                try {
                    // SMTP configuration
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'YOUR EMAIL';
                    $mail->Password = 'YOUR CODE';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;
                    $mail->isHTML(true);
                    // Sender and recipient details 
                    $mail->setFrom('YOUR EMAIL', 'YOUR CODE');
                    $mail->addAddress($_SESSION['user_email'], $_SESSION['user_name'].' '.$_SESSION['user_lname']);
                    $mail->addReplyTo($_SESSION['user_email'], $_SESSION['user_name'].' '.$_SESSION['user_lname']);
                    
                
                    // Email subject and body
                    $mail->Subject = "Facture";
                    $mail->Body = genererFacture($user['montantconsult'],$user['nom'].' '.$user['prenom'],$user['specialite'],$id_facture);
                    
                
                    // Send email
                    $mail->send();
                } catch (Exception $e) {
                    echo 'Email failed to send. Error message: ' . $mail->ErrorInfo;
                }

        if (mysqli_query($db, $sql)){    
            header("location:chat.php?id=".$_GET['id']."&user_type=docteur");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
?>
    
