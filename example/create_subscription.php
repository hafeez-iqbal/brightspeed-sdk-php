<?php

require_once('../include_brightspeed.php');

use BrightSpeed\ApiWrapper;
use BrightSpeed\Subscription;

//set API Token
$apiToken   = "YOUR_API_TOKEN";
//set API Base URL
$apiBaseUrl = "https://portal.bright-speed.com";

$api = new ApiWrapper($apiToken, $apiBaseUrl);
$subscription = new Subscription();

//required fields
$subscription->setSource("test_source");
$subscription->setFirstName("test_firstname");
$subscription->setLastName("test_lastname");
$subscription->setAddress("addresss");
$subscription->setCity("New York");
$subscription->setState("NY");
$subscription->setZipCode("12345");
$subscription->setPhoneNumber("9801234567");
$subscription->setEmail("email@example.com");
$subscription->setAbaNumber("000000000");
$subscription->setBankName("BANKNAME");
$subscription->setBankCity("New York");
$subscription->setBankState("NY");
$subscription->setAccountNumber("1111");
$subscription->setAmount("11.03");
$subscription->setInitPayment("20.99");
$subscription->setBillingDateStart(date('Y-m-d'));
$subscription->setBillingDateEnd("");
$subscription->setTransitNum("123/ABC456");
$subscription->setCheckAge("YES");

//optional fields
$subscription->setMiddleInitial("");
$subscription->setCompanyOr2ndName("");
$subscription->setOtherPhoneNumber("");
$subscription->setEmployeeNumber("");
$subscription->setBankAddress("");
$subscription->setBankZipCode("");
$subscription->setBankPhone("");
$subscription->setBankFax("");
$subscription->setCustomField1("");
$subscription->setCustomField2("");
$subscription->setCustomField3("");
$subscription->setCustomField4("");
$subscription->setCustomField5("");
$subscription->setCustomField6("");
$subscription->setPostBackUrl("");

// Set additional information fields. Please login to your account and look for:
// Create a Subscription > Request Arguments > Additional Information
//
// If you see additional information fields, then you can use "setAdditionalInformation" function
// commented in the next line to set those fields.
//
//    $additionalInformation = [
//            'additional_field_01' => 'value_01',
//            'additional_field_02' => 'value_02',
//            'additional_field_03' => 'value_03'
//    ];
//    $subscription->setAdditionalInformation($additionalInformation);

//create a subscription
$responseApi = $api->createSubscription($subscription);

$response = $responseApi['response'];
$subscription = $responseApi['subscription'];

?>

<style>
    th {
        text-align: left;
        width: 240px;
    }
</style>
<code>
    <h1>Example: Create Subscription</h1>
<table>
    <tr>
        <th>Subscription ABANUMBER:</th><td><?php echo $subscription->getAbaNumber(); ?></td>
    </tr>
    <tr>
        <th>Subscription ACCOUNTNUMBER:</th><td><?php echo $subscription->getAccountNumber(); ?></td>
    </tr>
    <tr>
        <th>Subscription Initial Payment:</th><td><?php echo $subscription->getInitPayment(); ?></td>
    </tr>
    <tr>
        <th>Subscription Regular Amount:</th><td><?php echo $subscription->getAmount(); ?></td>
    </tr>
    <tr>
        <th>Subscription ID:</th><td><?php echo $subscription->getSubscriptionId(); ?></td>
    </tr>
    <tr>
        <th>Subscription Status:</th><td><?php echo $subscription->getStatus(); ?></td>
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







