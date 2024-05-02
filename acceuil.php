<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aaa</title>
</head>
<body>
    <a href="forum_page.php">Forum</a>
<?php
    include("database_con.php");
    session_start();
    
    if (isset($_SESSION['user_type'])) {
        // si l'utilisateur est connecté on affiche le bonton de logout
        echo '<form method="post" action="logout.php?logout=true">';
        echo '<br>';
        echo '<input type="submit" value="Logout" name="submit">';
        echo '</form>';
    } else {
        // si l'utilisateur n'est pas connecté on affiche s'il veut se connecté au tant que docteur ou patient
        echo '<a href="login.php">Login !!</a>';
    }

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
                        echo "<a href='chat.php?id=".$lignes['id']."&user_type=utilisateur'>".$lignes['nom']."</a><br>";
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
                        echo "<a href='chat.php?id=".$lignes['id']."&user_type=docteur'>".$lignes['nom']."</a><br>";
                    }  
                }
            } 
        }
    }

    
?>
<a href="user_page.php">user page</a>

<?php
    // affiche les spécialité des docteurs present dans la base de donnée
    $request ="SELECT * FROM docteur GROUP BY specialite";
    $stmt = mysqli_prepare($db, $request);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($result){
        while($rows = $result->fetch_assoc()){
            echo '<br><a href="choix_docteur?specialite='.$rows['specialite'].'">'.$rows['specialite'].'</a>';
        }  
    }
?>
</body>
</html>