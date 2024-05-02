<html>
  <head>
  <style>
    .button {
      background-color: lightblue;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      border-radius: 10px;
      cursor: pointer;
    }
    .name{
      display: flex;
      justify-content: center;
    }
    .payment-form{
      display: flex;
      justify-content: center;
    }
  </style>
  </head>
  <body>
  <?php
    require "./square-php-sdk/vendor/autoload.php";
    include "database_con.php";
    use Square\SquareClient;
    use Square\Environment;
    session_start();
    if(!isset($_SESSION['user_type'])){
      header("location:login.php");
      exit();
    }
    $id = $_GET['id'];
    $request ="SELECT * FROM paiement WHERE userid=? and user_type=?";
      $stmt = mysqli_prepare($db, $request);
      mysqli_stmt_bind_param($stmt, "ss",$_SESSION['user_id'],$_SESSION['user_type']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if (!$result) {
          die("Query failed: " . mysqli_error($db));
      }
      $payments = $result->fetch_assoc();
      if($result->num_rows > 0){
        header("location:chat.php?id=$id&user_type=docteur");
        exit();
      }
    $request ="SELECT * FROM docteur WHERE id=?";
    $stmt = mysqli_prepare($db, $request);
    mysqli_stmt_bind_param($stmt, "s",$_GET['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die("Query failed: " . mysqli_error($db));
    }
    $user = $result->fetch_array();
    if($user){
      $client = new SquareClient([
      'accessToken' => $user['access_token'],
      'environment' => Environment::SANDBOX,
      ]);
    }

    
    $api_response = $client->getLocationsApi()->listLocations();

    if ($api_response->isSuccess()) {
        $result = json_decode($api_response->getBody(),true);
        $locations = $result['locations'];
        foreach ($locations as $location) {
          $locationId = $location['id'];
          $locationName = $location['name'];
      }
    } else {
        $errors = $api_response->getErrors();
    }
?>

<head>
  <link rel="stylesheet" href="/reference/sdks/web/static/styles/code-preview.css" preload>
  <script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
</head>
<body>
  <div class="name"><h1><?=$user['prenom']." ".$user['nom']?></h1></div>
<div id="payment-form">
  <div id="payment-status-container"></div>
  <div id="card-container"></div>
  <button class="button" id="card-button" type="button">Pay</button>
</div>
<script src="jquery.min.js"></script>
  <script type="module">

    const payments = Square.payments('YOUR SANDBOX API CODE', '<?=$locationId?>');
    const card = await payments.card();
    await card.attach('#card-container');

    const cardButton = document.getElementById('card-button');
    cardButton.addEventListener('click', async () => {
      const statusContainer = document.getElementById('payment-status-container');

      try {
        const result = await card.tokenize();
        if (result.status === 'OK') {
          
          var tokenizedCard = result.token;
          var amount = '<?=intval($user['montantconsult'])*100?>';
          var access_token = "<?=$user['access_token']?>";
          var locationId = "<?=$locationId?>";

          // Create the data object to send
          var data = {
            tokenizedCard: tokenizedCard,
            amount: amount,
            locationId: locationId,
            access_token: access_token
          };
          console.log("click block")
          // Make an AJAX POST request
          $.ajax({
            type: 'POST',
            url: 'process_payment.php',
            data: data,
            success: function(response) {
              console.log(response)
              var status = JSON.parse(response).payment.status;
              statusContainer.innerHTML = `${status}`;
              if (status === 'COMPLETED') {
                window.location.href = `success.php?id=<?=$_GET['id']?>&status=${status}&user_type=docteur`;
              }else{
                statusContainer.innerHTML = status;
              }
            }
          });
        } else {
          let errorMessage = `Tokenization failed with status: ${result.status}`;
          if (result.errors) {
            errorMessage += ` and errors: ${JSON.stringify(
              result.errors
            )}`;
          }

          throw new Error(errorMessage);
        }
      } catch (e) {
        console.error(e);
        statusContainer.innerHTML = "Payment Failed";
      }
    });
  </script>
  </body>
</html>




