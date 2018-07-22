<?php
abstract class BaseProductClass {
    protected $name;
    protected $weight;
    protected $price;
    protected $discount = 0.1;
    protected $delivery = 250;

    public function __construct ($name, $weight, $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->setPrice();
        $this->setDeliveryCost();
    }

    public function setPrice()
    {
        if ($this->discount != 0)
        {
            $this->price = $this->price - ($this->price * $this->discount);
        }
    }


    public function setDeliveryCost()
    {
        if ($this->discount != 0)
        {
            $this->delivery=300;
        } else {
            $this->delivery=250;
        }
    }
}


class AudioTech extends BaseProductClass {
    private $type;

    public function __construct ($name, $weight, $price, $type)
    {
        parent::__construct($name, $weight, $price);
        $this->type = $type;
    }
}

class DrumSets extends BaseProductClass {
    protected $discount = 0;

    public function __construct ($name, $weight, $price)
    {
        parent::__construct($name, $weight, $price);
        $this->setDiscountBasedOnWeight();
    }

    public function setDiscountBasedOnWeight()
    {
        if ($this->weight > 10)
        {
            $this->discount=0.1;
            parent::setPrice();
            parent::setDeliveryCost();
        }
    }
}

class ElectroGuitars extends BaseProductClass {
    public function __construct ($name, $weight, $price)
    {
        parent::__construct($name, $weight, $price);
    }
}

$headphones = New AudioTech('KOSS Plugs', 2, 850, 'Headphones');
print_r($headphones);
echo '</br>';
$amplifier = New AudioTech('Defender Mercury 55', 15,5000,'Amplifier');
print_r($amplifier);
echo '</br>';
$guitar = New ElectroGuitars('BC Rich Custom',15,6500);
print_r($guitar);
echo '</br>';
$drumset = New DrumSets('Pearl Drum Set', 60,1500);
print_r($drumset);
echo '</br>';
$drumsetspares = New DrumSets('Pearl Drum Set Spare Parts',0.1,15);
print_r($drumsetspares);
echo '</br>';