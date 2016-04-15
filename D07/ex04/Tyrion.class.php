<?php

    class Tyrion extends Lannister {
        public function sleepWith($people) {
            if ($people instanceof Lannister) {
                print "Not even if I'm drunk !" . PHP_EOL;
            }
            if ($people instanceof Sansa) {
                print "Let's do this." . PHP_EOL;
            }
        }

    }

 ?>
