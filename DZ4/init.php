<?php
/**
 * Created by PhpStorm.
 * User: Gusya
 * Date: 02.09.2018
 * Time: 2:06
 */
interface Carshering
{
    public function getprice();
}

abstract class Tariff implements Carshering
{
    public function __construct ($age, $tariff, $s, $hour, $minute, $gps =false, $driver =false)
    {
        try {
            if ($age >=18 && $age <= 65 ) {
                $this-> age = $age;

            } else {
                throw new Exception ("Вам не доступны услуги каршеринга из-зa возраста");
            }
            $this->tariff = $tariff;
            if(!$tariff) {
                throw new Exception ("Выберите тариф");
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

        $this->s = $s ? $s : 0;
        $this->hour = $hour ? $hour : 0;
        $this->minute = $minute ? $minute : 0;
        $this->gps = $gps;
        $this->driver =$driver;
        $this->getprice();
        $this->showData();
    }
    protected function isYoung () {
        if($this->age >=18 && $this->age <=21) return true;
        return false;
    }
    public function getprice ()
    {

    }
    private function showData()
    {
        echo "Возраст - " . $this->age . ' тариф-' . $this->tariff . ' км-' . $this->s
            . ' часов-' . $this->hour . ' минут-' . $this->minute . ' gps? -' . $this->gps .
            ' доп.водитель ? -' . $this->driver . '<br>';

    }
}

trait GPS {
    public function getGPS($cost , $hour = 0, $minute =0){
        $cost+= $hour*15;
        if($minute) {
            $cost+= 15;
        }
        return $cost;
    }
}

trait Driver {
    public $addCost = 100;
}

class Base extends Tariff
{
    use GPS;
    public function getprice()
    {
        $this->cost = $this->s * 10 + $this->minute *3 +$this->hour*60*3;

        if($this->gps) {
            $this->cost = $this->getGPS($this->cost,$this->hour, $this->minute);
        }
        try {
            if($this->driver) {
                throw new Exception ("Данная опция недоступна для тарифа");
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        if($this->isYoung()) {
            $this->cost= $this->cost*1.1;
        }
        return $this->cost;
    }
    public function show()
    {
        $show = "$this->s * 10 + $this->minute *3 +$this->hour*60*3";
        if($this->gps) {
            $show .= "$this->hour*15";
            if($this->minute) {
                $show .= "+15";
            }
        }
        if($this->isYoung()) {
            $show = "(" . $show . ")*1.1";
        }
        return $show;
    }
}

class Hour extends Tariff
{
    use GPS;
    use Driver;
    public function getprice()
    {
        $this->cost = $this->hour*200;
        if($this->minute) {
            $this->cost+= 200;
        }
        if($this->gps) {
            $this->cost = $this->getGPS($this->cost,$this->hour, $this->minute);
        }
        if($this->driver) {
            $this->cost+= $this->addCost;
        }
        return $this->cost;
    }
    public function show()
    {
        $show = "$this->hour*200";
        if($this->minute) {
            $show = $show . " +200 ";
        }
        if($this->gps) {
            $show = "(" . $show . ")*1.1";
        }
        if($this->driver) {
            $show = $show . "+100";
        }
        return $show;
    }

}

class Day extends Tariff
{
    use GPS;
    use Driver;
    public function getprice()
    {
        $this->cost = $this->s*1;
        $timeInMinuts = $this->minute + $this->hour*60;
        $days = floor($timeInMinuts/(60*24));
        $this->cost+=$days*1000;
        if (($timeInMinuts-$days*24*60)>30) {
            $this->cost+=1000;
        }
        if($this->gps) {
            $this->cost = $this->getGPS($this->cost,$this->hour, $this->minute);
        }
        if($this->driver) {
            $this->cost+= $this->addCost;
        }
        return $this->cost;
    }

}

class Student extends Tariff
{
    use GPS;
    public function getprice()
    {
        try {
            if($this->driver) {
                throw new Exception ("Данная опция недоступна для тарифа");
            }
            if($this->age >25) {
                throw new Exception ("Возраст не может превышать 25 лет");
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        $this->cost = $this->s*4;
        $timeInMinuts = $this->minute + $this->hour*60;
        $this->cost+=$timeInMinuts*1;
        if($this->gps) {
            $this->cost = $this->getGPS($this->cost,$this->hour, $this->minute);
        }
        return $this->cost;
    }
}
