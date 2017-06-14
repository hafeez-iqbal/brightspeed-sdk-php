<?php

require_once('../include_brightspeed.php');

use BrightSpeed\ApiWrapper;
use BrightSpeed\Transaction;

//set API Token
$apiToken   = "YOUR_API_TOKEN";
//set API Base URL
$apiBaseUrl = "https://portal.bright-speed.com";

$api = new ApiWrapper($apiToken, $apiBaseUrl);
$transaction = new Transaction();

//required fields
$transaction->setSource("test_source");
$transaction->setFirstName("test_firstname");
$transaction->setLastName("test_lastname");
$transaction->setAddress("addresss");
$transaction->setCity("New York");
$transaction->setState("NY");
$transaction->setZipCode("12345");
$transaction->setPhoneNumber("9801234567");
$transaction->setEmail("email@example.com");
$transaction->setAbaNumber("000000000");
$transaction->setBankName("BANKNAME");
$transaction->setBankCity("New York");
$transaction->setBankState("NY");
$transaction->setAccountNumber("1111");
$transaction->setAmount("11.03");
$transaction->setTransitNum("123/ABC456");
$transaction->setCheckAge("YES");

//optional fields
$transaction->setMiddleInitial("");
$transaction->setCompanyOr2ndName("");
$transaction->setOtherPhoneNumber("");
$transaction->setEmployeeNumber("");
$transaction->setBankAddress("");
$transaction->setBankZipCode("");
$transaction->setBankPhone("");
$transaction->setBankFax("");
$transaction->setCheckNumber("");
$transaction->setDepositDate(date('Y-m-d'));
$transaction->setCustomField1("");
$transaction->setCustomField2("");
$transaction->setCustomField3("");
$transaction->setCustomField4("");
$transaction->setCustomField5("");
$transaction->setCustomField6("");
$transaction->setPostBackUrl("");

// Set additional information fields. Please login to your account and look for:
// Create a Transaction > Request Arguments > Additional Information
//
// If you see additional information fields, then you can use "setAdditionalInformation" function
// commented in the next line to set those fields.
//
//    $additionalInformation = [
//            'additional_field_01' => 'value_01',
//            'additional_field_02' => 'value_02',
//            'additional_field_03' => 'value_03'
//    ];
//    $transaction->setAdditionalInformation($additionalInformation);

//create a transaction
$responseApi = $api->createTransaction($transaction);

$response = $responseApi['response'];
$transaction = $responseApi['transaction'];

?>

<style>
    th {
        text-align: left;
        width: 240px;
    }
</style>
<code>
    <h1>Example: Create Transaction</h1>
<table>
    <tr>
        <th>Transaction ABANUMBER:</th><td><?php echo $transaction->getAbaNumber(); ?></td>
    </tr>
    <tr>
        <th>Transaction ACCOUNTNUMBER:</th><td><?php echo $transaction->getAccountNumber(); ?></td>
    </tr>
    <tr>
        <th>Transaction Amount:</th><td><?php echo $transaction->getAmount(); ?></td>
    </tr>
    <tr>
        <th>Transaction ID:</th><td><?php echo $transaction->getTransactionId(); ?></td>
    </tr>
    <tr>
        <th>Transaction Status:</th><td><?php echo $transaction->getStatus(); ?></td>
    </tr>
    <tr>
        <th>Message:</th><td><?php echo $response->getMessage(); ?></td>
    </tr>
    <tr>
        <th>Error Code:</th><td><?php echo $response->getErrorCode(); ?></td>
    </tr>
    <tr>
        <th>Error Detail:</th><td><?php echo $response->getErrorDetail(); ?></td>
    </tr>
    <tr>
        <th>Warnings:</th><td><?php echo $response->getWarnings(); ?></td>
    </tr>
</table>
</code>







