<?php

namespace Tocan\Notification;


/**
 * Class Payment
 * @package Tocan\Notification
 */
class Payment
{
    /**
     * Уникальный идентификатор транзакции в Процессинге 2can
     *
     * @var int
     */
    private $id;

    /**
     * Сумма. Положительное десятичное число с фиксированной точкой, кол-во цифр после точки точно равно двум.
     *
     * @var float
     */
    private $amount;

    /**
     * Дата создания транзакции(UTC) в Процессинге
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * Номер операции в платежной системе
     *
     * @var string
     */
    private $rrn;

    /**
     * Тип карты
     * - Visa
     * - MasterCard
     * - Maestro
     * - AmericanExpress
     *
     * @var string
     */
    private $cardType;

    /**
     * Идентификатор терминала в банке
     *
     * @var string
     */
    private $tid;

    /**
     * Клише mPOS
     *
     * @var string
     */
    private $mid;

    /**
     * Первые 6 и последние 4 цифры номера карты в формате NNNNNN** **** **** NNNN
     *
     * @var string
     */
    private $card;

    /**
     * Описание, указанное при оплате
     *
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $authCode;

    /**
     * Состояние платежа
     * - Completed - проведен
     * - Voided - отменен
     *
     * @var string
     */
    private $status;

    /**
     * @var Device
     */
    private $device;

    /**
     * @param $xml \SimpleXMLElement
     */
    public function __construct($xml)
    {
        $this->id          = $xml['Id'];
        $this->amount      = $xml['Amount'];
        $this->rrn         = $xml['RRN'];
        $this->cardType    = $xml['CardType'];
        $this->tid         = $xml['TID'];
        $this->mid         = $xml['MID'];
        $this->card        = $xml['Card'];
        $this->description = $xml['Description'];
        $this->authCode    = $xml['AuthCode'];
        $this->status      = $xml['Status'];

        $this->createdAt = \DateTime::createFromFormat('Y-m-d?H:i:s+', $xml['CreatedAt'], new \DateTimeZone('Europe/Moscow'));

        $this->device = new Device($xml->Device);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getRrn()
    {
        return $this->rrn;
    }

    /**
     * @return string
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * @return string
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @return string
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return Device
     */
    public function getDevice()
    {
        return $this->device;
    }
}