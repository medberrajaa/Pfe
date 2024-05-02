<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register user</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
body{
  display: flex;
  justify-content:center;
  flex-direction: column;
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


form .inputs {
  display: flex;
  flex-direction: column;
}
form .inputs input[type='Email'], input[type='text'],input[type='age'], input[type='password'],input[type='name'], input[type='last name'], input[type='gender'], input[type='age'], input[type='confirm password']{
  padding: 15px;
  border:none;
  border-radius: 5px;
  background-color:#f2f2f2;
  outline:none;
  margin-bottom: 15px;
}
form p.inscription{
  font-size: 14px;
  margin-bottom: 20px;
  color: #878787;
}
form p.inscription span{
  color: lightblue;
}
form button{
  padding: 15px 25px;
  border-radius: 5px;
  border:none;
  font-size: 15px;
  color: #fff;
  background-color: lightblue;
  outline:none;
  cursor:pointer;
}
    </style>
</head>
<?php
    if(isset($_GET['error'])){
        echo $_GET['error']."<br>";
    }
?>
<body>
<form action='insert_user.php' method="post">
     
        <h1>S'inscrire</h1>
      
        
        <div class="inputs">
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Mot de passe">
          <input type="password" name="confirm-password" placeholder="Confirmez mot de passe" />
          <input type="name" name="prenom" placeholder="Nom" />
          <input type="last name" name="nom" placeholder="Prenom" />
          <input type="age" name="age" id="age" placeholder="Age" />
          <input type="radio" id="male" name="gender" value="male">
          <label for="male">Homme</label>
          <input type="radio" id="female" name="gender" value="female">
          <label for="female">Femme</label><br><br>
        </div>
        
        
        <div style="justify-content:center">
          <button type="submit">Envoyer</button>
          <button type="reset">Annuler</button>
        </div>
      </form>
</body>
</html>