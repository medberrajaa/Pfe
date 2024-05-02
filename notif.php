<html>
    <head>
        <title>Notification</title>
        <link href="./styles/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./styles/css/style.css" rel="stylesheet">
    <link href="./styles/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./styles/css/style.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body{
        display: flex;
        justify-content:center;
        flex-direction: columns;
        align-items: center;
        background-color: #f5f5f5;
        font-family: 'Roboto', sans-serif;
        
        }
        form {
        margin-top: 20px;
        background-color: #fff;
        padding: 40px 60px;
        border-radius: 10px;
        min-width: 300px;
        }
        form h1{
        color: lightblue;
        text-align:center;
        }
        .post-imge {
            width: 150px; /* ajustez la largeur selon vos besoins */
            height: 150px; /* ajustez la hauteur selon vos besoins */
            border-radius: 50%; /* pour créer une forme circulaire */
            overflow: hidden; /* masquer les parties de l'image qui dépassent de la forme circulaire */
        }
    
        .post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* pour remplir l'espace disponible sans déformer l'image */
        }
        .button{
          background-color: lightblue;
        }
        .grand {
            font-size: 24px; /* Taille de police en pixels */
            font-weight: bold; /* Gras */
            /* Autres styles CSS si nécessaire */
        }
        a:visited{
            text-decoration: none;
        }
        a{
            text-decoration: none;
        }
    </style>
    </head>
    <body>
        <?php
            include("database_con.php");
            session_start();
            // affiche tout les utlisateurs qui ont deja envoyé un message au docteur
            if(isset($_SESSION['user_id'])){
                if($_SESSION['user_type'] == "docteur"){
                    $query = "SELECT DISTINCT utilisateur.* FROM utilisateur 
                                JOIN chat ON utilisateur.id = chat.emetteur AND chat.type_emetteur = 'utilisateur' 
                                JOIN docteur ON chat.recepteur = docteur.id AND chat.type_recepteur = 'docteur' 
                                WHERE docteur.id = ".$_SESSION['user_id'].";";
                    $users = mysqli_prepare($db, $query);
                    if(mysqli_stmt_execute($users)){
                        $infos = mysqli_stmt_get_result($users);
                        if($infos){
                            while($lignes = $infos->fetch_assoc()){
                                echo "<form action='chat.php?id=".$lignes['id']."&user_type=".$lignes['user_type']."' method='post'>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='post-imge'>";
                                echo "<img src='styles/images/avatar.jpg' alt='post'>";
                                echo "</div>";
                                echo "<br>";
                                echo "<div style='display: flex; flex-direction: column; align-items: flex-start; margin-left: 10px;'>";
                                echo "<p style='font-weight: bold;'>".$lignes['nom']." ";
                                echo "".$lignes['prenom']."</p><a href='chat.php?id=".$lignes['id']."&user_type=".$lignes['user_type']."'>Continuez votre consultation</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</form>";
                            } 
                        }
                    } 
                }
                // affiche tout les docteurs qui on deja parlé avec l'utilisateur
                if($_SESSION['user_type'] == "utilisateur"){
                    $query = "SELECT DISTINCT docteur.* FROM utilisateur 
                                JOIN chat ON utilisateur.id = chat.emetteur AND chat.type_emetteur = 'utilisateur' 
                                JOIN docteur ON chat.recepteur = docteur.id AND chat.type_recepteur = 'docteur' 
                                WHERE utilisateur.id = ".$_SESSION['user_id'].";";
                    $users = mysqli_prepare($db, $query);
                    if(mysqli_stmt_execute($users)){
                        $infos = mysqli_stmt_get_result($users);
                        if($infos){
                            while($lignes = $infos->fetch_assoc()){
                                echo "<form action='chat.php?id=".$lignes['id']."&user_type=".$lignes['user_type']."' method='post'>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='post-imge'>";
                                echo "<img src='styles/images/avatar.jpg' alt='post'>";
                                echo "</div>";
                                echo "<br>";
                                echo "<div style='display: flex; flex-direction: column; align-items: flex-start; margin-left: 10px;'>";
                                echo "<p style='font-weight: bold;'>".$lignes['nom']." ";
                                echo "".$lignes['prenom']."</p><a href='chat.php?id=".$lignes['id']."&user_type=".$lignes['user_type']."'>Continuez votre consultation</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</form>";
                            }  
                        }
                    }
                }
            }else{
                header("Location:login.php");
            }
        ?>
    </body>
</html>
