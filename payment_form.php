<?php include 'security.php' ?>
<html>
<head>
    <title>Secure Acceptance - Payment Form Example</title>
    <link rel="stylesheet" type="text/css" href="payment.css"/>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
</head>
<body>
<form id="payment_form" action="https://testsecureacceptance.cybersource.com/pay" method="post">
    <input type="hidden" name="access_key" value="7ab6e48404b33cc5811ccbf6657202cd">
    <input type="hidden" name="profile_id" value="833BB70A-BC54-4503-A008-90DED344993D">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,bill_to_address_line1,bill_to_address_city,bill_to_address_country,bill_to_email,bill_to_forename,bill_to_surname,req_tax_amount">
    <input type="hidden" name="unsigned_field_names">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="es">
    <input type="hidden" name="transaction_type" value="sale,create_payment_token">
    <input type="hidden" name="currency" value="USD">
    <input type="hidden" name="bill_to_address_country" value="PA">
    <input type="hidden" name="reference_number" value="<?php echo uniqid() ?>">
    <input type="hidden" name="amount" value="5.50">
    <input type="hidden" name="bill_to_address_line1" value="Calle Segunda">
    <input type="hidden" name="bill_to_address_city" value="Panama">
    <input type="hidden" name="bill_to_email" value="diegoc@gmail.com">
    <input type="hidden" name="bill_to_forename" value="Diego">
    <input type="hidden" name="bill_to_surname" value="Cordero">
    <input type="hidden" name="req_tax_amount" value="0.50">

    <?php
        foreach($_REQUEST as $name => $value) {
            $params[$name] = $value;
            echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
        }
        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
    ?>
<input type="submit" id="submit_button" name="submit" value="Submit"/>
<script type="text/javascript" src="payment_form.js"></script>
</form>

<script type="text/javascript">
    window.onload = function() {
        document.getElementById('payment_form').submit();
    }
</script>
</body>
</html>
