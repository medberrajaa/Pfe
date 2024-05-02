<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
  color: #fff;
  background-color: lightblue;
  outline:none;
  cursor:pointer;
}
    </style>
</head>
<body>
  
    <form method="post" action="verification.php">
        <h1>Verification d'email</h1>
        <p class="inscription">Un code est envoyé dans votre email</p>
        <input type="text" name="code" required>
        <input type="hidden" name="email" value="<?= base64_decode($_GET['email'])?>">
        <input type="submit" value="submit"></input>
    </form>
</body>
</html>