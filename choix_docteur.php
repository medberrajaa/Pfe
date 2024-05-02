<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docteur Login Page</title>
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


    </style>
</head>
    <?php
        if(isset($_POST['user_id'])){
            header("location:index.php");
            exit();
        }
        if(isset($_GET['error'])){
            echo "<h1>".$_GET['error']."</h1>";
        }
      
       
        ?>
<body>


            
<section class="login d-flex justify-cotente-center align-items-center pt-5">
  <div class="container my-5 py-5">
    <div class="row">
      <?php
        // on affiche les docteurs qui ont la spécialité qu'on a choisi
        include("database_con.php");
        $specialite_choisi = $_GET['specialite'];
        echo '<div class="grand">' . $specialite_choisi . '</div>';
        $request = "SELECT * FROM docteur WHERE specialite='$specialite_choisi'";
        $stmt = mysqli_prepare($db, $request);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
          while ($rows = $result->fetch_assoc()) {
            echo "<form action='chat.php?id=".$rows['id']."&user_type=docteur' method='post'>";
            echo "<div class='col-md-6'>";
            echo "<div class='post-imge'>";
            echo "<img src='styles/images/avatar.jpg' alt='post'>";
            echo "</div>";
            echo "<div style='display: flex; flex-direction: column; align-items: flex-start; margin-left: 10px;'>";
            echo "<p  style='font-weight: bold;'>".$rows['nom']." ";
            echo "".$rows['prenom']."</p>";
            
            echo "<p style='color: blue;'> Montant: ".$rows['montantconsult']." EUR</p>";
           
            echo "</div>";
            echo "<button type='submit'>demandez consultation</button>";

            echo "</div>";
            echo "</form>";
          }
        }
      ?>
    </div>
  </div>
</section>



</body>
</html>
