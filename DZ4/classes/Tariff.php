<?php

namespace DZ4\classes;

abstract class Tariff implements \DZ4\interfaces\Carshering
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
    protected function isYoung()
    {
        if ($this->age >= 18 && $this->age <= 21)
            return true;
        return false;
    }
    public function getprice()
    {
    }
    private function showData()
    {
        echo "Возраст - " . $this->age ."\n" . "<br> тариф-" . $this->tariff . "\n км-" . $this->s
            . "\n часов-" . $this->hour . "\n минут-" . $this->minute . "\n gps -" . $this->gps .
            "\n доп.водитель  -" . $this->driver . '<br>';
    }
}