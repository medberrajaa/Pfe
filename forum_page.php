<!DOCTYPE html>
<html>
<link href="./styles/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./styles/css/style.css" rel="stylesheet">
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            background-color: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .question {
            margin-bottom: 20px;
            padding: 40px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius:5px;
        }

        .question h3 {
            margin: 0;
            padding-bottom: 5px;
        }

        .question a {
            color: lightblue    ;
            text-decoration: none;
        }

        .question a:hover {
            text-decoration: underline;
        }

        .add-question-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #337ab7;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-question-link:hover {
            background-color: #286090;
        }
        .inputs {
  display: flex;
  flex-direction: column;}
    </style>
</head>
<body>

    <a href="index.php">Retour vers la page home</a>
<section class="forum d-flex justify-cotente-center align-items-center pt-5  ">
        
 
<div class="inputs">
    <?php
        session_start();
        include "database_con.php";
        include "validate_input.php";
        $query = "SELECT * FROM `question`";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($result){
            while($rows = $result->fetch_assoc()){
                $count = "SELECT count(*) FROM `discussion` where question_id ='".$rows['id']."'";
                $stmt2 = mysqli_prepare($db, $count);
                mysqli_stmt_execute($stmt2);
                $result2 = mysqli_stmt_get_result($stmt2);
                if($result2){
                    echo '<div class="question">';
                    echo '<h3 style="font-size: 24px; font-family: Arial;"><a href="question_page.php?id='.$rows['id'].'">'.$rows['question'].'</a></h3>';
                    echo '<p style="font-size: 14px; font-family: Times New Roman;">Number of answers: '.mysqli_fetch_array($result2)[0].'</p>';
                    
                    echo '</div>';
                }
            }
        }
    ?>

<a href="ajout_question.php" class="add-question-link">Add a question</a>
</div>
    </section>
</body>
</html>
