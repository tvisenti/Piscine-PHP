<?php

    abstract class House {
        abstract public function getHouseName();
        abstract public function getHouseSeat();
        abstract public function getHouseMotto();

        public function introduce() {
            print ('House ' . static::getHouseName() . ' of ' . static::getHouseSeat() . ' : "' . static::getHouseMotto() . '"' . PHP_EOL);
        }
    }

 ?>
