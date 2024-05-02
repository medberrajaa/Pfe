<?php 
    session_start();
    include "database_con.php";
    include "validate_input.php";
?>
<html>
    <head>
        <!-- on doit avoir le jquery pour travailler avec ajax -->
        <script src="./jquery.min.js"></script>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        a {
            color: lighblue;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .question {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .question h3 {
            color: lightblue;
            margin-bottom: 10px;
        }

        .question p {
            margin-bottom: 10px;
        }

        .discussion {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .discussion p {
            margin-bottom: 5px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .form-container textarea,
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        .chat-form-container input[type="submit"] {
        background-color: lighblue;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        }
       

    .form-container input[type="submit"]:hover {
    }
    form .inputs input[type='firstname'], input[type='email']{
  padding: 15px;
  border:none;
  border-radius: 5px;
  background-color:#f2f2f2;
  outline:none;
  margin-bottom: 15px;
}

    </style>
    </head>
<body>
    <a href="forum_page.php">Retour au forum</a>
<?php 

    if(isset($_GET['error'])){
        echo  '<p class="error">'.$_GET['error'].'</p>';
    }
    $quesion_id = validate_input($_GET['id']);
    $query = "SELECT * FROM `question` where id ='$quesion_id'";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($result){
        while($rows = $result->fetch_assoc()){
            echo '<div class="question">';
            echo '<h3>'.$rows['question'].'</a></h3>';
            echo '<p>'.$rows['description'].'</p>';
            echo '</div>';
        }
    }
    $request_discussion ="SELECT * FROM discussion where question_id in(select id from question where id = $quesion_id) order by temps";
    $stmt_discussion = mysqli_prepare($db, $request_discussion);
    mysqli_stmt_execute($stmt_discussion);
    $result_discussion = mysqli_stmt_get_result($stmt_discussion);
    $responce = array();
    if($result_discussion){
        while($rows = $result_discussion->fetch_array()){
           
            echo '<div class="discussion">';
            echo '<p style="font-size: smaller;">À ' . $rows['temps'] . '</p>'; 
            echo '<p style="font-family: Arial, sans-serif; font-size: 20px;">' . $rows['message'] .'</p>';

            
            
            echo '</div>';
            ;

            
    }}
?>
    <!-- form d'envoie de message -->
    </div>
    <form method="post" id="chat-form" action="insert_discussion_message.php">
        <textarea type="text" name="message" id="message" placeholder="message..." style="padding: 15px; border: none; border-radius: 5px; background-color: white; outline: none; margin-bottom: 15px;"></textarea>
        <?php
            if(!isset($_SESSION['user_id'])){
            ?>
                <input type="text" name="fname" id="fname" placeholder="firstname" style="padding: 15px; border: none; border-radius: 5px; background-color: white; outline: none; margin-bottom: 15px;">
                <input type="text" name="lname" id="lname" placeholder="lastname" style="padding: 15px; border: none; border-radius: 5px; background-color: white; outline: none; margin-bottom: 15px;">
                <input type="text" name="email" id="email" placeholder="email" style="padding: 15px; border: none; border-radius: 5px; background-color: white; outline: none; margin-bottom: 15px;">
            <?php
            }else{
            ?>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'];?>">
                <input type="hidden" name="user_type" id="user_type" value="<?php echo $_SESSION['user_type'];?>">
            <?php
            }
            ?>
            <input type="hidden" name="question_id" id="question_id" value="<?php echo $quesion_id;?>">
            <div align="center">
        <input type="submit" value="submit" name="submit" style="padding: 15px 25px; border-radius: 5px; border: none; font-size: 15px; color: #fff; background-color: lightblue; outline: none; cursor: pointer;">
        </div>
    </form>
</body>
</html>