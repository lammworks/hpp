<html>
<head>
    <title>Secure Acceptance - Payment Form Example</title>
    <link rel="stylesheet" type="text/css" href="payment.css"/>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
</head>
<body>
<form id="payment_form" action="payment_confirmation.php" method="post">
    <input type="hidden" name="access_key" value="7ab6e48404b33cc5811ccbf6657202cd">
    <input type="hidden" name="profile_id" value="833BB70A-BC54-4503-A008-90DED344993D">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
    <input type="hidden" name="unsigned_field_names">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <fieldset>
        <legend>Payment Details</legend>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" name="transaction_type" size="25"><br/>
            <span>reference_number:</span><input type="text" name="reference_number" size="25"><br/>
            <span>amount:</span><input type="text" name="amount" size="25"><br/>
            <span>currency:</span><input type="text" name="currency" size="25"><br/>
        </div>
    </fieldset>
    <input type="submit" id="submit" name="submit" value="Submit"/>
    <script type="text/javascript" src="payment_form.js"></script>
</form>
</body>
</html>
