<?php

namespace Tocan\Notification;


/**
 * Class Device
 * @package Tocan\Notification
 */
class Device
{
    /**
     * Уникальный идентификатор устройства в Процессинге
     *
     * @var int
     */
    private $id;

    /**
     * Название устройства, указанное пользователем
     *
     * @var string
     */
    private $name;

    /**
     * Модель устройства
     *
     * @var string
     */
    private $model;


    /**
     * @param $xml \SimpleXMLElement
     */
    public function __construct($xml)
    {
        $this->id    = $xml['Id'];
        $this->name  = $xml['Name'];
        $this->model = $xml['Model'];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }
}