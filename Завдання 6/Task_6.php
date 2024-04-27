<?php

interface transport
{
    function getinfo();
}
trait Oplata
{
    public function proizd($pas,$price)
    {
        if($pas instanceof passenger){
            $pas->money = $pas->money-$price;
        }
    }
}
class Bus implements Transport {

    use Oplata;
    public int $passum = 0;
    public $name;
    public $number;
    protected int $cost;

    public function __construct($name,$number)
    {
        $this->name = $name;
        $this->number = $number;
        $this->cost = 0;
    }
    public function getInfo()
    {
        $information = "{$this->name}"." №{$this->number}"." Проїзд: {$this->cost} UAH"." Кількість пасажирів: {$this->passum}";
        return $information;
    }
}

class Marshrutka extends Bus{
    private $driver;

    function __construct($name,$number)
    {
        parent::__construct($name,$number);
        $this->driver = 'Водій';
    }
    function getInfo(): string
    {
        $info = parent::getInfo();
        return $info. "(Є {$this->driver} )";
    }
    function __destruct(){
        $info = parent::getInfo();
        echo $info. "( Є {$this->driver} )";

    }

}

class BigBus extends Bus
{
    use Oplata;
    private $driver;
    private $conductor;

    public function __construct($name, $number,)
    {
        parent::__construct($name, $number);
        $this->cost = 7;
        $this->driver = 'Водій';
        $this->conductor = 'Кондуктор';
    }

    public function getInfo(): string
    {
        $info = parent::getInfo();
        echo "У русі зараз ".$info . " ( Є {$this->driver} " . ", Є {$this->conductor} )".PHP_EOL;
        return 0;
    }
    public function doroga($passs)
    {
        $o = rand(0,10);
        $this->passum += 1 ;
        if(!$passs instanceof babka){
            $vutrata = $this->proizd($passs, $this->cost);
            if($passs instanceof programist){
                $passs->gamanec($o);
            } else {$passs->clad($o); }
        } else {$passs->attack($o);}
        return null;
    }
    public function stopbus()
    {
        $i = rand(0,5);
        if($i == 5){
            echo " Вийшли всі ";
            SimpleStop::Konechka();
        } else {
            SimpleStop::stop();
            $out = rand(0,$this->passum);
            $ost= ($this->passum - $out);
            echo " - пасажирів вийшло: {$out} ".", Лишилося: $ost";
        }
    }
}
final class SimpleStop{
    public static function stop()
    {
        echo "Зупинка";
    }

    public static function Konechka()
    {
        echo "Кінцева зупинка!";
    }
}
abstract class passenger
{
    public $money;
    public $name;
    abstract public function getpass($name,$money);
    abstract public function getinfo();

}
class programist extends passenger{

    public function getpass($name,$money)
    {
        $this->name = $name;
        $this->money = $money;
    }
    public function getinfo(): void
    {
         echo "{$this->name} {$this->money}";
    }
    public function gamanec($const): void
    {
        if($const == 4){
            echo "Під час поїздки у програміста {$this->name} зник гаманець! ".PHP_EOL;
            $this->money = 0;
        }
    }
}
class babka extends passenger{

    public function getpass($name,$money): void
    {
        $this->name = $name;
        $this->money = $money;
    }
    public function getinfo(): void
    {
        echo "{$this->name} {$this->money}";
    }
    public function attack($const): void
    {
        $c = rand(0,50);
        if($const == 3){
            echo "Під час поїздки бабка {$this->name} успішно продала свій щавель за ".$c." грн!".PHP_EOL;
            $this->money = $this->money + $c;
        }
    }
}
class Student extends passenger{

    public function getpass($name,$money): void
    {
        $this->name = $name;
        $this->money = $money;
    }
    public function getinfo(): void
    {
        echo "{$this->name} {$this->money}";
    }
    public function clad($const)
    {
        if($const == 5){
            $t = rand(1,30);
            echo "Під час поїздки студент {$this->name} знайшов ".$t." грн!".PHP_EOL;
            $this->money = $this->money + $t;
        }

    }
}


$pass1 = new programist();
$pass2 = new babka();
$pass3 = new Student();
$pass4 = new babka();
$pass5 = new Student();

$pass2->getpass('Masha','47');
$pass1->getpass('Marin','358');
$pass3->getpass('Tolik','28');
$pass4->getpass('Luba','56');
$pass5->getpass('Stas','20');

$auto = new BigBus('autobus','116');

$auto->doroga($pass1);
$auto->doroga($pass2);
$auto->doroga($pass3);
$auto->doroga($pass4);
$auto->doroga($pass5);

$auto->getInfo();
$auto->stopbus();

//При кожному новому запуску код генерує випадкові події


