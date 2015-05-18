<?php

include __DIR__.'/../vendor/autoload.php';

$xml = '<Payment Id="18" Amount="1200.00" CreatedAt="2013-09-30T13:36:35.6+04:00" RRN="111111111110" CardType="Visa" TID="" MID="" Card="424242** **** **** 4242" Description="" AuthCode="8e2a73" Status="Completed"><Device Id="66" Name="" Model="Galaxy Gio" /></Payment>';
//$xml = '<Refund Id="23" Amount="500.00" CreatedAt="2013-10-01T13:57:14+04:00" RRN="" CardType="Visa" TID="" MID="" Card="424242** **** **** 4242" Payment="22" Reason="Расторжение договора"><Device Id="84" Name="" Model="Galaxy Gio" /></Refund>';

$request = new Tocan\Notification\Request($xml);

if ($request->isValid()) {
    if ($request->isRefund()) {
        print $request->getRefund()->getAmount() . "\n";
    }
    if ($request->isPayment()) {
        print $request->getPayment()->getAmount() . "\n";
    }
}

