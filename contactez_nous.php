<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Contact</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap");

body {
  margin: 0px;
  padding: 0px;
  background-color:  #f5f5f5;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: "Roboto", sans-serif;
  font-weight: bold;
}

form {
  padding: 30px;
  background-color: white;
  border-radius: 10px;
}
form h1 {
  font-size: 20px;
}
form .separation {
  width: 100%;
  height: 1px;
  background-color: lightblue;
}
form .corps-formulaire {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 30px;
}
form .corps-formulaire .groupe {
  position: relative; /* Pour mettre positionner l’élément dans le flux normal de la page */
  margin-top: 20px;
  display: flex;
  flex-direction: column;
}
form .corps-formulaire .gauche .groupe input {
  margin-top: 5px;
  padding: 10px 5px 10px 30px;
  border: 1px solid white;
  outline-color: lightblue;
  border-radius: 5px;
}
form .corps-formulaire .gauche .groupe i {
  position: absolute; /* positionné par rapport à son parent le plus proche positionné */
  left: 0;
  top: 25px;
  padding: 9px 8px;
  color: lightblue;
}
form .corps-formulaire .droite {
  margin-left: 40px;
}
form .corps-formulaire .droite .groupe {
  height: 100%;
}
form .corps-formulaire .droite .groupe textarea {
  margin-top: 5px;
  padding: 10px;
  background-color:white;
  border: 2px solid lightblue;
  outline: none;
  border-radius: 5px;
  resize: none;
  height: 72%;
}
form .pied-formulaire button {
  margin-top: 10px;
  background-color: lightblue;
  color: white;
  font-size: 15px;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  outline: none;
  cursor: pointer;
  transition: transform 0.5s;
}
form .pied-formulaire button:hover {
  transform: scale(1.05);
}

@media screen and (max-width: 920px) {
  form .corps-formulaire .droite {
    margin-left: 0px;
  }
}

    </style>
  </head>
  <body>
    <form action="send_contact.php" method="post" enctype="multipart/form-data">
      <h1>Contactez-nous</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label>Votre Prénom</label>
            <input type="text" name="name" id="name" autocomplete="off" />
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>Votre adresse e-mail</label>
            <input type="text" name="email" id="email" autocomplete="off" />
            <i class="fas fa-envelope"></i>
           </div>
             <div class="groupe">
            <label>fichier</label>
            <input type="file" name="attachment"  id="attachment" />
            <i class="fas fa-mobile"></i>
          </div>
        </div>
      <div class="droite">
          <div class="groupe">
            <label>Message</label>
            <textarea placeholder="Saisissez ici..." name="message"></textarea>
          </div>
        </div>
      </div>

      <div class="pied-formulaire" align="center">
        <button>Envoyer le message</button>
      </div>
    </form>
  </body>
</html>
