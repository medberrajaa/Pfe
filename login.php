<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
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

form p.choose-email{
  text-align:center;
}
form .inputs {
  display: flex;
  flex-direction: column;
}
form .inputs input[type='email'], input[type='password']{
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
form input {
  padding: 15px 25px;
  border-radius: 5px;
  border:none;
  font-size: 15px;
  color: black;
  background-color: lightblue;
  outline:none;
  cursor:pointer;
}
a:visited{
  text-decoration: none;
}a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
        if(!empty($_POST['user_id'])){
            header("location:acceuil.php");
            exit();
        }
        if(isset($_GET['error'])){
            echo "<h1>".$_GET['error']."</h1>";
        }
    ?>
    <form method="post" action="authentification.php">
    <h1>Se connecter</h1>
    <div class="inputs">
        <label for="Email"> </label>
        <input type="email" name="email" id="email" placeholder="Email">
        <br>
        <label for="password"></label>
        <input type="password" name="password" id="password" placeholder="mots de passe">
    
    </div>
        <div align="center">
        <input type="submit" value="Se Connecter" name="submit" id="submit">
    </div>
        <p> You don't have an account?<a href="register_user.php"> click here to sign in !</a></p>
    </form>
</body>
</html>