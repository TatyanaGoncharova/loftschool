<?php
namespace DZ4\classes;

class Hour extends Tariff
{
    use \DZ4\traits\GPS;
    use \DZ4\traits\Driver;
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