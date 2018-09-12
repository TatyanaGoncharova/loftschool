<?php

namespace DZ4\traits;

trait GPS {
    public function getGPS($cost , $hour = 0, $minute =0){
        $cost+= $hour*15;
        if($minute) {
            $cost+= 15;
        }
        return $cost;
    }
}