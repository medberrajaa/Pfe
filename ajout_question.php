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
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        #chat-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        #chat-form input[type="text"],
        #chat-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        #chat-form input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #chat-form input[type="submit"]:hover {
            background-color: #004c99;
        }
    </style>
    </head>
<body>
  
    <a href="forum_page.php">Retour au forum</a>
<?php 

    if(isset($_GET['error'])){
        echo  '<p class="error">'.$_GET['error'].'</p>';
    }
?>
    <!-- form d'envoie de message -->
    </div>
    <form method="post" id="chat-form" action="insert_question.php">
        <input type="text" name="titre" id="titre" placeholder="Titre de votre question">
        <textarea type="text" name="description" id="description" placeholder="Votres description du problem ...."></textarea>
        <?php
            if(!isset($_SESSION['user_id'])){
            ?>
                <input type="text" name="fname" id="fname" placeholder="firstname">
                <input type="text" name="lname" id="lname" placeholder="lastname">
                <input type="text" name="email" id="email" placeholder="email">
            <?php
            }else{
            ?>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'];?>">
                <input type="hidden" name="user_type" id="user_type" value="<?php echo $_SESSION['user_type'];?>">
            <?php
            }
            ?>
            
        <input type="submit" value="submit" name="submit">
    </form>
        
</body>
</html>