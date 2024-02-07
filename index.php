<h2>Please type in German post code or codes separated with comma!</h2>

<form action="index.php" method="POST">
    <input type="text" name="POSTCODE" />
    <input type="submit">
</form>

<?php
    include("GermanPostcodeValidator.php");
    $validator = new GermanPostcodeValidator();
    $postCode = $_POST["POSTCODE"];

    $validator->setPostalCode($postCode);

    // 1. Test function for single postal code
    echo $validator->validateSinglePostalCode($postCode);
?>
<pre>
<?php
    // 2. Test function for postal code array
    var_dump($validator->validatePostalCodeArray($postCode));
?>
</pre>