<?php

namespace Iprbooks\Eor\Sdk\Models;

use Exception;
use Iprbooks\Eor\Sdk\Client;
use Iprbooks\Eor\Sdk\Core\Model;

class Eor extends Model
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
     * Возрващает id книги
     * @return mixed
     */
    public function getId()
    {
        return $this->getValue('id');
    }

    /**
     * Возвращает название эор
     * @return mixed
     */
    public function getName()
    {
        return $this->getValue('name');
    }

    /**
     * Эксклюзивность
     * @return mixed
     */
    public function isExclusive()
    {
        return $this->getValue('is_exclusive');
    }

    /**
     * Возвращает кол-во книг эор
     * @return mixed
     */
    public function getBooksCount()
    {
        return $this->getValue('books_count');
    }

}