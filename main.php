<?php
// Полиморфизм - возможность каждого объекта при одинаковых вводных методах иметь различную реализацию.
// У родителя может быть задан метод вывода определенных значений, но у каждого реализуемого объекта конечный результат или функционал может быть совершенно разным.
//
// Наследование - возможность расширения классов на основе исходных.
// Свойства и методы сохраняются, могут быть переопределены, а также могут быть расширены за счет определения новых свойств и методов.
//
// Абстрактный класс представляет собой класс, у которого есть хотя бы один нереализованный метод.
// Интерфейс же может включать в себя исключительно нереализованные методы с пустым телом.
// Абстрактный класс мы используем тогда, когда есть определенное количество повторяющихся свойств и методов у ряда схожих объектов.
// Интерфейс необходим тогда, когда надо сообщить объекту, какие методы обязательно должны быть реализованы. При этом объекты могут значительно отличаться.

header("Content-Type: text/html; charset=utf-8");

class BaseClass
{
    public $russianName;
}

interface CarCountry
{
    public function getCountry();
}

interface TvType
{
    public function getTvType();
}

interface BallPenBall
{
    public function getBallSize();
}

interface DuckVoice
{
    public function getDuckVoice();
}

interface ProductPriceDiscount
{
    public function getDiscount();
}

class Car extends BaseClass implements CarCountry
{
    public $russianName = 'Автомоблиь';
    private $make;
    private $model;
    private $dateOfManufacture;
    private $country;
    public function __construct ($make, $model, $dateOfManufacture, $country)
    {
        $this->make = $make;
        $this->model = $model;
        $this->dateOfManufacture = $dateOfManufacture;
        $this->country = $country;
    }
    public function __toString()
    {
        return $this->russianName .' '. $this->make . ' ' . $this->model . ' выпущен в ' . $this->dateOfManufacture.' году.'.' Страна производитель: '.$this->country.'</br>';
    }

    public function getCountry()
    {
        return $this->country;
    }
}

class Tv extends BaseClass implements TvType
{
    public $russianName = 'Телевизор';
    private $make;
    private $model;
    private $country;
    private $size;
    private $resolution;
    public function __construct ($make, $model, $country, $size, $resolution)
    {
        $this->make = $make;
        $this->model = $model;
        $this->country = $country;
        $this->size = $size;
        $this->resolution = $resolution;
    }
    public function __toString()
    {
        return 'Телевизор '. $this->make . ' ' . $this->model . ' с диагональю ' . $this->size . ' и форматом ' . $this->resolution.'.'.' Страна производитель: '.$this->country.'('.$this->getTvType().')'.'</br>';
    }

    public function getTvType()
    {
        if ($this->resolution == '1080p')
        {
            return 'FullHD';
        } else {
            return 'UltraHD';
        }
    }
}

class BallPen extends BaseClass implements BallPenBall
{
    public $russianName = 'Шариковая ручка';
    private $color;
    private $material;
    private $ball;
    public function __construct ($color, $material, $ball)
    {
        $this->color = $color;
        $this->material = $material;
        $this->ball = $ball;
    }

    public function __toString()
    {
        return ' Ручка шариковая, цвет: ' . $this->color . ', материал корпуса: ' . $this->material . ', диаметр шарика: ' . $this->ball.'.'.'</br>';
    }

    public function getBallSize()
    {
        return $this->color;
    }
}

class Duck extends BaseClass implements DuckVoice {
    public $russianName = 'Утка';
    private $name;
    private $territory;
    private $weight;
    public function __construct ($name, $territory, $weight)
    {
        $this->name = $name;
        $this->territory = $territory;
        $this->weight = $weight;
    }
    public function __toString()
    {
        return 'Утка ' . $this->name . ' избрала своим ореолом обитания ' . $this->territory.'.'. ' Средний вес взрослой особи - '.$this->weight.'.'.' А говорит утка '.$this->getDuckVoice().'</br>';
    }

    public function getDuckVoice()
    {
        return 'Кря!';
    }
}
class Product extends BaseClass implements ProductPriceDiscount {
    public $russianName = 'Товар';
    private $type;
    private $origin;
    private $price;
    public function __construct ($type, $origin, $price)
    {
        $this->type = $type;
        $this->origin = $origin;
        $this->price = $price;
    }
    public function __toString()
    {
        return $this->type . ', страна-производитель: ' . $this->origin . ' , стоимость одной шт.: ' . $this->getDiscount() . ' руб.'.'</br>';
    }

    public function getDiscount()
    {
        return $this->price - ($this->price*0.15);
    }
}
$toyota2000 = new Car('Toyota', '2000GT', 1967, 'Япония');
echo $toyota2000;
$amcrebel = new Car('AMC', 'Rebel', 1967, 'США');
echo $amcrebel;
$samsung = new Tv ('Samsung', 'UE40M5000AU', 'Корея', '22"', '1080p');
echo $samsung;
$sony = new Tv ('Sony', 'X690E Series', 'Япония', '60"', '4k');
echo $sony;
$bluepen = new BallPen('синий', 'пластик', 0.3);
echo $bluepen;
$redpen = new BallPen('красный', 'металл', 0.7);
echo $redpen;
$mandarinka = new Duck ('мандаринская', 'Дальний Восток России', '0,6-0,9 кг');
echo $mandarinka;
$karoling = new Duck ('каролингская', 'леса США', 'до одного кг');
echo $karoling;
$tea = new Product('Чай, упак.', 'Япония', 1500);
echo $tea;
$soda = new Product('Содовая', 'Корея', 50);
echo $soda;

