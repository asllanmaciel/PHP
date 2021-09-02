<?php

/*** RETORNO ASAAS
 {
    "event": "PAYMENT_RECEIVED",
    "payment": {
        "object": "payment",
        "id": "pay_080225913252",
        "dateCreated": "2017-03-10",
        "customer": "cus_G7Dvo4iphUNk",
        "subscription": "sub_VXJBYgP2u0eO", //somente quando pertencer a uma assinatura
        "installment": "ins_000000001031", //somente quando pertencer a um parcelamento
        "paymentLink": "123517639363", //identificador do link de pagamento
        "dueDate": "2017-03-15",
        "value": 100.00,
        "netValue": 94.51,
        "billingType": "CREDIT_CARD",
        "status": "RECEIVED",
        "description": "Pedido 056984",
        "externalReference": "056984",
        "confirmedDate": "2017-03-15",
        "originalValue": null,
        "interestValue": null,
        "originalDueDate": "2017-06-10",
        "paymentDate": null,
        "clientPaymentDate": null,
        "invoiceUrl": "https://www.asaas.com/i/080225913252",
        "bankSlipUrl": null,
        "invoiceNumber": "00005101",
        "deleted": false,
        "creditCard": {
            "creditCardNumber": "8829",
            "creditCardBrand": "MASTERCARD",
            "creditCardToken": "a75a1d98-c52d-4a6b-a413-71e00b193c99"
        }
    }
}
***/

$json = file_get_contents('php://input');
$event = json_decode($json, true);

switch($event['event']){
    case 'PAYMENT_RECEIVED':

       /* //Campos importantes
       $event['payment']['object'];
       $event['payment']['id'];
       $event['payment']['dateCreated'];
       $event['payment']['customer'];
       $event['payment']['billingType'];
       $event['payment']['confirmedDate'];
       echo 'pagamento recebido!';
       */

    if ($event['payment']['object'] == 'payment' && $event['payment']['status'] == 'RECEIVED') {    	
        
       //Função que vai dar baixa automática na fatura
        $retornoFatura = $faturaClass->M3_baixaAutomatica($event['payment'], 'asaas');

        //Arquivo de controle dos dados recebidos
        $current = file_get_contents('retorno-asaas.txt');
        $current .=  PHP_EOL.'///////////////////'.date('d/m/Y H:i:s').'///////////////';
        $current .=  var_export($_POST, true);
        file_put_contents('retorno-asaas.txt', $current);
    }


    break;
}
