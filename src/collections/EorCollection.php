<?php

namespace Iprbooks\Eor\Sdk\collections;

use Exception;
use Iprbooks\Eor\Sdk\Client;
use Iprbooks\Eor\Sdk\Core\Collection;
use Iprbooks\Eor\Sdk\Models\Eor;

class EorCollection extends Collection
{

    private $apiMethod = '/resources/eors';


    /**
     * Конструктор EorCollection
     * @param Client $client
     * @throws Exception
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
        return $this;
    }


    /**
     * Возвращает метод api
     * @return string
     */
    protected function getApiMethod()
    {
        return $this->apiMethod;
    }

    /**
     * Проверка значений фильтра
     * @param $field
     * @return boolean
     */
    protected function checkFilterFields($field)
    {
        return false;
    }

    /**
     *
     */
    public function get()
    {
        parent::load();
    }

    /**
     * Возвращает элемент выборки
     * @param $index
     * @return Eor
     * @throws Exception
     */
    public function getItem($index)
    {
        parent::getItem($index);
        $response = $this->createModelWrapper($this->data[$index]);
        return new Eor($this->getClient(), $response);
    }
}