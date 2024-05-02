<?php 
function genererFacture($amount,$doc_name,$specialite,$idFacture) {
    ob_start(); // Start output buffering

    // Generate the HTML content
    ?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    .invoice-details {
      margin-top: 20px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    
    th {
      background-color: #f2f2f2;
    }
    
    .total {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Facture - Consultation en ligne (Paiement effectué)</h1>
  
  <div class="invoice-details">
    <p><strong><?=$specialite?>:</strong> Dr. <?=$doc_name?></p>
    <p><strong>Numéro de facture:</strong> <?=$idFacture?></p>
  </div>
  
  <table>
    <thead>
      <tr>
        <th>Description</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Consultation en ligne</td>
        <td><?=$amount?>.00€</td>
      </tr>
    </tbody>
  </table>
  
  <div class="invoice-details">
    <p><strong>Date du paiement:</strong> <?=date("Y-m-d h:i:sa")?></p>
    <p><strong>Mode de paiement:</strong> Carte de crédit</p>
    <p><strong>Total payé:</strong> <?=$amount?>.00€</p>
  </div>
  
  <p>Merci pour votre paiement. Nous vous confirmons que votre paiement a bien été reçu. Vous trouverez ci-dessous les détails de votre facture.</p>
</body>
</html>
<?php
    $html = ob_get_clean(); // Get the buffered content and clear the buffer
    return $html;
    }
?>