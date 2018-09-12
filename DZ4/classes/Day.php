<?php
namespace DZ4\classes;

class Day extends Tariff
{
    use \DZ4\traits\GPS;
    use \DZ4\traits\Driver;
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