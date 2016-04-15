<?php

    class Targaryen
    {
        public function resistsFire() {
    		return False;
    	}

        public function getBurned() {
            if (static::resistsFire() === False)
                return "burns alive";
            else
                return "emerges naked but unharmed";
        }
    }
 ?>
