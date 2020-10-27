<?php

namespace Iprbooks\Eor\Sdk\collections;

use Exception;
use Iprbooks\Eor\Sdk\Client;
use Iprbooks\Eor\Sdk\Core\Collection;
use Iprbooks\Eor\Sdk\Models\Book;

class BooksCollection extends Collection
{

    private $apiMethod = '/resources/eors/{id}/books';


    /**
     * Конструктор BooksCollection
     * @param Client $client
     * @return BooksCollection
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
     * @param $id - eor id
     */
    public function get($id)
    {
        parent::load($id);
    }

    /**
     * Возвращает элемент выборки
     * @param $index
     * @return Book
     * @throws Exception
     */
    public function getItem($index)
    {
        parent::getItem($index);
        $response = $this->createModelWrapper($this->data[$index]);
        return new Book($this->getClient(), $response);
    }

}