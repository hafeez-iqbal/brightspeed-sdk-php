<?php

namespace BrightSpeed;

use BrightSpeed\ApiRequest;
use BrightSpeed\ApiResponse;
use BrightSpeed\Transaction;
use BrightSpeed\Subscription;

class ApiWrapper
{
    public function __construct($apiToken, $apiBaseUrl)
    {
        BrightSpeed::setApiToken($apiToken);
        BrightSpeed::setApiBaseUrl($apiBaseUrl);
    }

    public function createTransaction(Transaction $transaction){
        $apiRequest = new ApiRequest();
        $params = $transaction->getCreateParameters();
        $url = '/api/v1/payments/transaction';
        $response = $apiRequest->request('post', $url, $params);
        if ($response->code == 200 && $response->json && $response->json->success){
            $transaction->setTransactionId($response->json->data->TRANSACTIONID);
            $transaction->setStatus($response->json->data->STATUS);
        }
        return ['response' => $response, 'transaction' => $transaction];
    }

    public function refundTransaction(Transaction $transaction){
        $apiRequest = new ApiRequest();
        $transactionId = $transaction->getTransactionId();
        $params = $transaction->getRefundParameters();
        $url = '/api/v1/payments/transaction/'.$transactionId.'/refund';
        $response = $apiRequest->request('post', $url, $params);
        if ($response->code == 200 && $response->json && $response->json->success){
            $transaction->setRefundId($response->json->data->refund_id);
            $transaction->setAmount($response->json->data->amount);
            $transaction->setCreatedAt($response->json->data->created_at);
        }
        return ['response' => $response, 'transaction' => $transaction];
    }

    public function voidTransaction(Transaction $transaction){
        $apiRequest = new ApiRequest();
        $transactionId = $transaction->getTransactionId();
        $params = $transaction->getVoidParameters();
        $url = '/api/v1/payments/transaction/'.$transactionId.'/void';
        $response = $apiRequest->request('post', $url, $params);
        if ($response->code == 200 && $response->json && $response->json->success){
            $transaction->setTransactionId($response->json->data->transactionid);
        }
        return ['response' => $response, 'transaction' => $transaction];
    }

    public function createSubscription(Subscription $subscription){
        $apiRequest = new ApiRequest();
        $params = $subscription->getCreateParameters();
        $url = '/api/v1/payments/subscription';
        $response = $apiRequest->request('post', $url, $params);
        if ($response->code == 200 && $response->json && $response->json->success){
            $subscription->setSubscriptionId($response->json->data->SUBSCRIPTIONID);
            $subscription->setStatus($response->json->data->STATUS);
        }
        return ['response' => $response, 'subscription' => $subscription];
    }


}