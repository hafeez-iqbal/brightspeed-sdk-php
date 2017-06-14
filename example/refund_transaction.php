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
$transaction->setTransactionId("ABC_123456");
$transaction->setAmount("1.00");

//refund a transaction
$responseApi = $api->refundTransaction($transaction);

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
    <h1>Example: Refund Transaction</h1>
<table>
    <tr>
        <th>Refund Id:</th><td><?php echo $transaction->getRefundId(); ?></td>
    </tr>
    <tr>
        <th>Refund DateTime:</th><td><?php echo $transaction->getCreatedAt(); ?></td>
    </tr>
    <tr>
        <th>Refund Amount:</th><td><?php echo $transaction->getAmount(); ?></td>
    </tr>
    <tr>
        <th>Transaction ID:</th><td><?php echo $transaction->getTransactionId(); ?></td>
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







