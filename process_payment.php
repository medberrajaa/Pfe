<?php
    header('Content-Type: application/json; charset=utf-8');
    require "./square-php-sdk/vendor/autoload.php";
    use Square\SquareClient;
    use Square\Environment;
    use Square\Models\CreatePaymentRequest;
    use Square\Models\Money;
    session_start();
    $client = new SquareClient([
        'accessToken' => $_POST['access_token'],
        'environment' => Environment::SANDBOX,
    ]);

    $amount_money = new Money();
    $amount_money->setAmount($_POST['amount']);
    $amount_money->setCurrency('EUR');

    $body = new CreatePaymentRequest($_POST['tokenizedCard'], uniqid());
    $body->setAmountMoney($amount_money);
    $body->setLocationId($_POST['locationId']);
    $api_response = $client->getPaymentsApi()->createPayment($body);

    if ($api_response->isSuccess()) {
        $result = $api_response->getBody();
        echo json_encode($result);
    } else {
        $errors = $api_response->getBody();
        echo json_encode($result);
    }
?>