<?php

namespace Iprbooks\Eor\Sdk\Core;

use Exception;
use Iprbooks\Eor\Sdk\Client;

class Response
{

    /*
     * Инстанс клиента
     */
    private $client;

    /*
     * Ответ
     */
    protected $response;

    /*
     * Данные ответа
     */
    protected $data;


    /**
     * Конструктор Response
     * @param Client $client
     * @param $response
     * @throws Exception
     */
    public function __construct(Client $client, $response = null)
    {
        if (!$client) {
            throw new Exception('client is not init');
        }

        $this->client = $client;
        if ($response) {
            $this->response = $response;
            $this->data = $response['data'];
        }
        return $this;
    }


    /**
     * Получить клиент
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Получить значение по ключу
     * @param $name
     * @return string
     */
    protected function getValue($name)
    {
        if (is_array($this->data) && array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            return '';
        }
    }


    /**
     * Возвращает статус запроса
     * @return mixed
     */
    public function getSuccess()
    {
        if ($this->response && $this->response['success']) {
            return $this->response['success'];
        } else {
            return false;
        }
    }

    /**
     * Возвращает текстовое сообщение ошибки
     * @return mixed
     */
    public function getMessage()
    {
        if ($this->response && $this->response['message']) {
            return $this->response['message'];
        } else {
            return "";
        }
    }

    /**
     * Возвращает общее кол-во элементов ответа
     * @return mixed
     */
    public function getTotalCount()
    {
        if ($this->response && $this->response['total']) {
            return $this->response['total'];
        } else {
            return 0;
        }
    }

    /**
     * Возвращает статус ответа
     * @return mixed
     */
    public function getStatus()
    {
        if ($this->response && $this->response['status']) {
            return $this->response['status'];
        } else {
            return 400;
        }
    }

}