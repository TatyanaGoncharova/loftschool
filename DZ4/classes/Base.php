<?php
namespace DZ4\classes;

class Base extends Tariff
{
    use \DZ4\traits\GPS;
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
