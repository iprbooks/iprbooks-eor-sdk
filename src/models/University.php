<?php

namespace Iprbooks\Eor\Sdk\Models;

use Exception;
use Iprbooks\Eor\Sdk\Client;
use Iprbooks\Eor\Sdk\Core\Model;

class University extends Model
{

    private $apiMethod = null;


    /**
     * Конструктор Eor
     * @param Client $client
     * @param null $response
     * @throws Exception
     */
    public function __construct(Client $client, $response = null)
    {
        parent::__construct($client, $response);
        return $this;
    }

    /**
     * Возвращает метод апи для вызова
     */
    protected function getApiMethod()
    {
        return $this->apiMethod;
    }

    /**
     * Возрващает
     * @return mixed
     */
    public function getPubHouse()
    {
        return $this->getValue('pubhouse');
    }

    /**
     * Возвращает
     * @return mixed
     */
    public function getCount()
    {
        return $this->getValue('count');
    }

}