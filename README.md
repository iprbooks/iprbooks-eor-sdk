# SDK платформы «Сетевые ЭОР вузов»

API платформы «Сетевые ЭОР вузов» — специально разработанный сервис для интеграции информационных систем организаций с разделом «Сетевые ЭОР вузов» электронно-библиотечной системы [ЭБС IPR BOOKS](http://www.iprbookshop.ru/). Документация по API находится [здесь](https://eorapi.iprbooks.ru/documentation/base).


# Содержание:

1. [Установка](#1)
2. [Инициализация клиента API](#2)
3. [Доступ к данным](#3)
    * [Получение каталога ЭОР](#31)
    * [Получение каталога издательств ЭОР](#32)
    * [Получение переченя изданий в рамках указанного ЭОР](#33)

<a name="1"><h1>Установка</h1></a>
Простой и наиболее предпочтительный способ установки SDK - composer.
```sh
 "iprbooks/iprbooks-eor-sdk" : "dev-master"
```

Другой способ - скачать архив с исходным кодм [master.zip](https://github.com/iprbooks/iprbooks-eor-sdk/archive/master.zip)
или воспользоваться **git clone** и вручную добавить в проект.
```sh
git clone git@github.com:iprbooks/iprbooks-eor-sdk.git
```

<a name="2"><h1>Инициализация клиента Api</h1></a>
Для инициализации клиента необходимы следующие параметры

| Параметр  | Описание |
| --------  | -------- |
| $clientId | Идентификатор клиента (получается вместе с ключевой фразой для получения JWT-токена). |
| $token    | Ключ защиты данных для JWT-авторизации запросов, получается в личном кабинете |

#### Пример
```php
$clientId = 187;
$token = 'qdEEZBzAr!KV%Dq(WfNm]mNdLzn(m8{8';

$client = new Client($clientId, $token);
```


<a name="3"><h1>Доступ к данным</h1></a>
Доступ к метаданным позволяет посредством API получать информацию о книгах, доступных подписчику
в рамках приобретенной подписки.


<a name="31"><h3>Получение каталога ЭОР</h3></a>
Получение списка ЭОР вузов: основной информации и информации о количестве публикаций.
Атрибуты элемента коллекции доступны с помощью публичных методов определенных и описанных в
[Eor.php](https://github.com/iprbooks/iprbooks-eor-sdk/blob/master/src/models/Eor.php)
#### Пример:
```php
// инициализация клиента
$client = new Client($clientId, $token);

// создание объекта коллекции
$eorCollection = new EorCollection($client);

// выполнение запроса
$eorCollection->get();

// обращение к элементу коллекции по индексу
$title = $eorCollection->getItem(0)->getName();


// перебор элементов коллекции с помощью foreach
foreach ($eorCollection as $eor) {
    $title = $eor->getName();
}
``` 

<a name="32"><h3>Получение каталога издательств ЭОР</h3></a>
Каталог вузов-правообладателей контента в рамках указанного ЭОР.
Атрибуты элемента коллекции доступны с помощью публичных методов определенных и описанных в
[University.php](https://github.com/iprbooks/iprbooks-eor-sdk/blob/master/src/models/University.php)
##### Пример:
```php
// инициализация клиента
$client = new Client($clientId, $token);

// создание объекта коллекции
$universitiesCollection = new UniversitiesCollection($client);

// выполнение запроса
$universitiesCollection->get($eorId);

// обращение к элементу коллекции по индексу
$pubHouse = $universitiesCollection->getItem(0)->getPubHouse();

// перебор элементов коллекции с помощью foreach
foreach ($universitiesCollection as $university) {
    $pubHouse = $university->getPubHouse();
}
```


<a name="33"><h3>Получение переченя изданий в рамках указанного ЭОР</h3></a>
Возвращает список доступных книг каталога ЭБС с учетом подписки организации и ссылку бесшовного перехода на книгу.
Атрибуты элемента коллекции (книги) доступны с помощью публичных методов определенных и описанных в
[Book.php](https://github.com/iprbooks/iprbooks-eor-sdk/blob/master/src/models/Book.php)
#### Пример:
```php
// инициализация клиента
$client = new Client($clientId, $token);

// создание и конфигурация  объекта коллекции
$booksCollection = new BooksCollection($client);
$booksCollection->setLimit(5)->setOffset(0);

// выполнение запроса
$booksCollection->get($eorId);

// обращение к элементу коллекции по индексу
$title = $booksCollection->getItem(0)->getTitle();

// получение ссылки бесшовного перехода
$link = $booksCollection->getItem(0)->getReadingLink();

// перебор элементов коллекции с помощью foreach
foreach ($booksCollection as $book) {
    $title = $book->getTitle();
}

```