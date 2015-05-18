<?php

namespace Tocan\Notification;

class Request
{
    /**
     * @var bool
     */
    private $isValid = false;

    /**
     * @var bool
     */
    private $isPayment = false;

    /**
     * @var bool
     */
    private $isRefund = false;

    /**
     * @var \SimpleXMLElement
     */
    private $xml;

    /**
     * @var Payment
     */
    private $payment;

    /**
     * @var Refund
     */
    private $refund;

    public function __construct($xmlSource = '')
    {
        if (!$xmlSource) {
            $xmlSource = trim(@file_get_contents('php://input'));
        }

        if (!$xmlSource) {
            return;
        }

        $this->xml = new \SimpleXMLElement($xmlSource);

        if ($this->xml->getName() == 'Payment') {
            $this->isPayment = true;
            $this->isValid = true;
            $this->payment = new Payment($this->xml);
        } elseif ($this->xml->getName() == 'Refund') {
            $this->isRefund = true;
            $this->isValid = true;
            $this->refund = new Refund($this->xml);
        }
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @return Refund
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * @return boolean
     */
    public function isPayment()
    {
        return $this->isPayment;
    }

    /**
     * @return boolean
     */
    public function isRefund()
    {
        return $this->isRefund;
    }

}