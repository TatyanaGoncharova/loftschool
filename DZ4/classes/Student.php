<?php

namespace DZ4\classes;

class Student extends Tariff
{
    use \DZ4\traits\GPS;
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